
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
        if ("geral_form_maecte_mob" == sTestField)
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
        sc_hide_form_maecte_mob_form();
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

  // ---------- Validate codcte01
  function do_ajax_form_maecte_mob_validate_codcte01()
  {
    var nomeCampo_codcte01 = "codcte01";
    var var_codcte01 = scAjaxGetFieldHidden(nomeCampo_codcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_codcte01(var_codcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_codcte01_cb);
  } // do_ajax_form_maecte_mob_validate_codcte01

  function do_ajax_form_maecte_mob_validate_codcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_codcte01_cb

  // ---------- Validate tipo_cliente
  function do_ajax_form_maecte_mob_validate_tipo_cliente()
  {
    var nomeCampo_tipo_cliente = "tipo_cliente";
    var var_tipo_cliente = scAjaxGetFieldText(nomeCampo_tipo_cliente);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_tipo_cliente(var_tipo_cliente, var_script_case_init, do_ajax_form_maecte_mob_validate_tipo_cliente_cb);
  } // do_ajax_form_maecte_mob_validate_tipo_cliente

  function do_ajax_form_maecte_mob_validate_tipo_cliente_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipo_cliente";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_tipo_cliente_cb

  // ---------- Validate id_nacionalidad
  function do_ajax_form_maecte_mob_validate_id_nacionalidad()
  {
    var nomeCampo_id_nacionalidad = "id_nacionalidad";
    var var_id_nacionalidad = scAjaxGetFieldText(nomeCampo_id_nacionalidad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_nacionalidad(var_id_nacionalidad, var_script_case_init, do_ajax_form_maecte_mob_validate_id_nacionalidad_cb);
  } // do_ajax_form_maecte_mob_validate_id_nacionalidad

  function do_ajax_form_maecte_mob_validate_id_nacionalidad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_nacionalidad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_nacionalidad_cb

  // ---------- Validate nomcte01
  function do_ajax_form_maecte_mob_validate_nomcte01()
  {
    var nomeCampo_nomcte01 = "nomcte01";
    var var_nomcte01 = scAjaxGetFieldText(nomeCampo_nomcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nomcte01(var_nomcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_nomcte01_cb);
  } // do_ajax_form_maecte_mob_validate_nomcte01

  function do_ajax_form_maecte_mob_validate_nomcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nomcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nomcte01_cb

  // ---------- Validate primer_nombre
  function do_ajax_form_maecte_mob_validate_primer_nombre()
  {
    var nomeCampo_primer_nombre = "primer_nombre";
    var var_primer_nombre = scAjaxGetFieldText(nomeCampo_primer_nombre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_primer_nombre(var_primer_nombre, var_script_case_init, do_ajax_form_maecte_mob_validate_primer_nombre_cb);
  } // do_ajax_form_maecte_mob_validate_primer_nombre

  function do_ajax_form_maecte_mob_validate_primer_nombre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "primer_nombre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_primer_nombre_cb

  // ---------- Validate segundo_nombre
  function do_ajax_form_maecte_mob_validate_segundo_nombre()
  {
    var nomeCampo_segundo_nombre = "segundo_nombre";
    var var_segundo_nombre = scAjaxGetFieldText(nomeCampo_segundo_nombre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_segundo_nombre(var_segundo_nombre, var_script_case_init, do_ajax_form_maecte_mob_validate_segundo_nombre_cb);
  } // do_ajax_form_maecte_mob_validate_segundo_nombre

  function do_ajax_form_maecte_mob_validate_segundo_nombre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "segundo_nombre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_segundo_nombre_cb

  // ---------- Validate primer_apellido
  function do_ajax_form_maecte_mob_validate_primer_apellido()
  {
    var nomeCampo_primer_apellido = "primer_apellido";
    var var_primer_apellido = scAjaxGetFieldText(nomeCampo_primer_apellido);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_primer_apellido(var_primer_apellido, var_script_case_init, do_ajax_form_maecte_mob_validate_primer_apellido_cb);
  } // do_ajax_form_maecte_mob_validate_primer_apellido

  function do_ajax_form_maecte_mob_validate_primer_apellido_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "primer_apellido";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_primer_apellido_cb

  // ---------- Validate segundo_apellido
  function do_ajax_form_maecte_mob_validate_segundo_apellido()
  {
    var nomeCampo_segundo_apellido = "segundo_apellido";
    var var_segundo_apellido = scAjaxGetFieldText(nomeCampo_segundo_apellido);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_segundo_apellido(var_segundo_apellido, var_script_case_init, do_ajax_form_maecte_mob_validate_segundo_apellido_cb);
  } // do_ajax_form_maecte_mob_validate_segundo_apellido

  function do_ajax_form_maecte_mob_validate_segundo_apellido_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "segundo_apellido";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_segundo_apellido_cb

  // ---------- Validate cv1cte01
  function do_ajax_form_maecte_mob_validate_cv1cte01()
  {
    var nomeCampo_cv1cte01 = "cv1cte01";
    var var_cv1cte01 = scAjaxGetFieldText(nomeCampo_cv1cte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cv1cte01(var_cv1cte01, var_script_case_init, do_ajax_form_maecte_mob_validate_cv1cte01_cb);
  } // do_ajax_form_maecte_mob_validate_cv1cte01

  function do_ajax_form_maecte_mob_validate_cv1cte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cv1cte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cv1cte01_cb

  // ---------- Validate cv2cte01
  function do_ajax_form_maecte_mob_validate_cv2cte01()
  {
    var nomeCampo_cv2cte01 = "cv2cte01";
    var var_cv2cte01 = scAjaxGetFieldText(nomeCampo_cv2cte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cv2cte01(var_cv2cte01, var_script_case_init, do_ajax_form_maecte_mob_validate_cv2cte01_cb);
  } // do_ajax_form_maecte_mob_validate_cv2cte01

  function do_ajax_form_maecte_mob_validate_cv2cte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cv2cte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cv2cte01_cb

  // ---------- Validate tipcte01
  function do_ajax_form_maecte_mob_validate_tipcte01()
  {
    var nomeCampo_tipcte01 = "tipcte01";
    var var_tipcte01 = scAjaxGetFieldText(nomeCampo_tipcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_tipcte01(var_tipcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_tipcte01_cb);
  } // do_ajax_form_maecte_mob_validate_tipcte01

  function do_ajax_form_maecte_mob_validate_tipcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_tipcte01_cb

  // ---------- Validate ofienccte01
  function do_ajax_form_maecte_mob_validate_ofienccte01()
  {
    var nomeCampo_ofienccte01 = "ofienccte01";
    var var_ofienccte01 = scAjaxGetFieldText(nomeCampo_ofienccte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ofienccte01(var_ofienccte01, var_script_case_init, do_ajax_form_maecte_mob_validate_ofienccte01_cb);
  } // do_ajax_form_maecte_mob_validate_ofienccte01

  function do_ajax_form_maecte_mob_validate_ofienccte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ofienccte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ofienccte01_cb

  // ---------- Validate vendcte01
  function do_ajax_form_maecte_mob_validate_vendcte01()
  {
    var nomeCampo_vendcte01 = "vendcte01";
    var var_vendcte01 = scAjaxGetFieldText(nomeCampo_vendcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_vendcte01(var_vendcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_vendcte01_cb);
  } // do_ajax_form_maecte_mob_validate_vendcte01

  function do_ajax_form_maecte_mob_validate_vendcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "vendcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_vendcte01_cb

  // ---------- Validate cobrcte01
  function do_ajax_form_maecte_mob_validate_cobrcte01()
  {
    var nomeCampo_cobrcte01 = "cobrcte01";
    var var_cobrcte01 = scAjaxGetFieldText(nomeCampo_cobrcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cobrcte01(var_cobrcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_cobrcte01_cb);
  } // do_ajax_form_maecte_mob_validate_cobrcte01

  function do_ajax_form_maecte_mob_validate_cobrcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cobrcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cobrcte01_cb

  // ---------- Validate loccte01
  function do_ajax_form_maecte_mob_validate_loccte01()
  {
    var nomeCampo_loccte01 = "loccte01";
    var var_loccte01 = scAjaxGetFieldText(nomeCampo_loccte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_loccte01(var_loccte01, var_script_case_init, do_ajax_form_maecte_mob_validate_loccte01_cb);
  } // do_ajax_form_maecte_mob_validate_loccte01

  function do_ajax_form_maecte_mob_validate_loccte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "loccte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_loccte01_cb

  // ---------- Validate dircte01
  function do_ajax_form_maecte_mob_validate_dircte01()
  {
    var nomeCampo_dircte01 = "dircte01";
    var var_dircte01 = scAjaxGetFieldText(nomeCampo_dircte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_dircte01(var_dircte01, var_script_case_init, do_ajax_form_maecte_mob_validate_dircte01_cb);
  } // do_ajax_form_maecte_mob_validate_dircte01

  function do_ajax_form_maecte_mob_validate_dircte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dircte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_dircte01_cb

  // ---------- Validate sector
  function do_ajax_form_maecte_mob_validate_sector()
  {
    var nomeCampo_sector = "sector";
    var var_sector = scAjaxGetFieldText(nomeCampo_sector);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sector(var_sector, var_script_case_init, do_ajax_form_maecte_mob_validate_sector_cb);
  } // do_ajax_form_maecte_mob_validate_sector

  function do_ajax_form_maecte_mob_validate_sector_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sector";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sector_cb

  // ---------- Validate calle_principal
  function do_ajax_form_maecte_mob_validate_calle_principal()
  {
    var nomeCampo_calle_principal = "calle_principal";
    var var_calle_principal = scAjaxGetFieldText(nomeCampo_calle_principal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_principal(var_calle_principal, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_principal_cb);
  } // do_ajax_form_maecte_mob_validate_calle_principal

  function do_ajax_form_maecte_mob_validate_calle_principal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_principal";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_principal_cb

  // ---------- Validate no
  function do_ajax_form_maecte_mob_validate_no()
  {
    var nomeCampo_no = "no";
    var var_no = scAjaxGetFieldText(nomeCampo_no);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_no(var_no, var_script_case_init, do_ajax_form_maecte_mob_validate_no_cb);
  } // do_ajax_form_maecte_mob_validate_no

  function do_ajax_form_maecte_mob_validate_no_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "no";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_no_cb

  // ---------- Validate calle_secundaria
  function do_ajax_form_maecte_mob_validate_calle_secundaria()
  {
    var nomeCampo_calle_secundaria = "calle_secundaria";
    var var_calle_secundaria = scAjaxGetFieldText(nomeCampo_calle_secundaria);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_secundaria(var_calle_secundaria, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_secundaria_cb);
  } // do_ajax_form_maecte_mob_validate_calle_secundaria

  function do_ajax_form_maecte_mob_validate_calle_secundaria_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_secundaria";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_secundaria_cb

  // ---------- Validate id_pais
  function do_ajax_form_maecte_mob_validate_id_pais()
  {
    var nomeCampo_id_pais = "id_pais";
    var var_id_pais = scAjaxGetFieldText(nomeCampo_id_pais);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_pais(var_id_pais, var_script_case_init, do_ajax_form_maecte_mob_validate_id_pais_cb);
  } // do_ajax_form_maecte_mob_validate_id_pais

  function do_ajax_form_maecte_mob_validate_id_pais_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_pais";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_pais_cb

  // ---------- Validate id_provincia
  function do_ajax_form_maecte_mob_validate_id_provincia()
  {
    var nomeCampo_id_provincia = "id_provincia";
    var var_id_provincia = scAjaxGetFieldText(nomeCampo_id_provincia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_provincia(var_id_provincia, var_script_case_init, do_ajax_form_maecte_mob_validate_id_provincia_cb);
  } // do_ajax_form_maecte_mob_validate_id_provincia

  function do_ajax_form_maecte_mob_validate_id_provincia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_provincia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_provincia_cb

  // ---------- Validate id_ciudad
  function do_ajax_form_maecte_mob_validate_id_ciudad()
  {
    var nomeCampo_id_ciudad = "id_ciudad";
    var var_id_ciudad = scAjaxGetFieldText(nomeCampo_id_ciudad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_ciudad(var_id_ciudad, var_script_case_init, do_ajax_form_maecte_mob_validate_id_ciudad_cb);
  } // do_ajax_form_maecte_mob_validate_id_ciudad

  function do_ajax_form_maecte_mob_validate_id_ciudad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_ciudad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_ciudad_cb

  // ---------- Validate id_canton
  function do_ajax_form_maecte_mob_validate_id_canton()
  {
    var nomeCampo_id_canton = "id_canton";
    var var_id_canton = scAjaxGetFieldText(nomeCampo_id_canton);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_canton(var_id_canton, var_script_case_init, do_ajax_form_maecte_mob_validate_id_canton_cb);
  } // do_ajax_form_maecte_mob_validate_id_canton

  function do_ajax_form_maecte_mob_validate_id_canton_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_canton";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_canton_cb

  // ---------- Validate telcte01
  function do_ajax_form_maecte_mob_validate_telcte01()
  {
    var nomeCampo_telcte01 = "telcte01";
    var var_telcte01 = scAjaxGetFieldText(nomeCampo_telcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telcte01(var_telcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_telcte01_cb);
  } // do_ajax_form_maecte_mob_validate_telcte01

  function do_ajax_form_maecte_mob_validate_telcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telcte01_cb

  // ---------- Validate cascte01
  function do_ajax_form_maecte_mob_validate_cascte01()
  {
    var nomeCampo_cascte01 = "cascte01";
    var var_cascte01 = scAjaxGetFieldText(nomeCampo_cascte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cascte01(var_cascte01, var_script_case_init, do_ajax_form_maecte_mob_validate_cascte01_cb);
  } // do_ajax_form_maecte_mob_validate_cascte01

  function do_ajax_form_maecte_mob_validate_cascte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cascte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cascte01_cb

  // ---------- Validate ci_conyuge
  function do_ajax_form_maecte_mob_validate_ci_conyuge()
  {
    var nomeCampo_ci_conyuge = "ci_conyuge";
    var var_ci_conyuge = scAjaxGetFieldText(nomeCampo_ci_conyuge);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ci_conyuge(var_ci_conyuge, var_script_case_init, do_ajax_form_maecte_mob_validate_ci_conyuge_cb);
  } // do_ajax_form_maecte_mob_validate_ci_conyuge

  function do_ajax_form_maecte_mob_validate_ci_conyuge_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ci_conyuge";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ci_conyuge_cb

  // ---------- Validate conyuge_tipo_identidad
  function do_ajax_form_maecte_mob_validate_conyuge_tipo_identidad()
  {
    var nomeCampo_conyuge_tipo_identidad = "conyuge_tipo_identidad";
    var var_conyuge_tipo_identidad = scAjaxGetFieldText(nomeCampo_conyuge_tipo_identidad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_conyuge_tipo_identidad(var_conyuge_tipo_identidad, var_script_case_init, do_ajax_form_maecte_mob_validate_conyuge_tipo_identidad_cb);
  } // do_ajax_form_maecte_mob_validate_conyuge_tipo_identidad

  function do_ajax_form_maecte_mob_validate_conyuge_tipo_identidad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "conyuge_tipo_identidad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_conyuge_tipo_identidad_cb

  // ---------- Validate conyuge_primer_nombre
  function do_ajax_form_maecte_mob_validate_conyuge_primer_nombre()
  {
    var nomeCampo_conyuge_primer_nombre = "conyuge_primer_nombre";
    var var_conyuge_primer_nombre = scAjaxGetFieldText(nomeCampo_conyuge_primer_nombre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_conyuge_primer_nombre(var_conyuge_primer_nombre, var_script_case_init, do_ajax_form_maecte_mob_validate_conyuge_primer_nombre_cb);
  } // do_ajax_form_maecte_mob_validate_conyuge_primer_nombre

  function do_ajax_form_maecte_mob_validate_conyuge_primer_nombre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "conyuge_primer_nombre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_conyuge_primer_nombre_cb

  // ---------- Validate conyuge_segundo_nombre
  function do_ajax_form_maecte_mob_validate_conyuge_segundo_nombre()
  {
    var nomeCampo_conyuge_segundo_nombre = "conyuge_segundo_nombre";
    var var_conyuge_segundo_nombre = scAjaxGetFieldText(nomeCampo_conyuge_segundo_nombre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_conyuge_segundo_nombre(var_conyuge_segundo_nombre, var_script_case_init, do_ajax_form_maecte_mob_validate_conyuge_segundo_nombre_cb);
  } // do_ajax_form_maecte_mob_validate_conyuge_segundo_nombre

  function do_ajax_form_maecte_mob_validate_conyuge_segundo_nombre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "conyuge_segundo_nombre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_conyuge_segundo_nombre_cb

  // ---------- Validate conyuge_primer_apellido
  function do_ajax_form_maecte_mob_validate_conyuge_primer_apellido()
  {
    var nomeCampo_conyuge_primer_apellido = "conyuge_primer_apellido";
    var var_conyuge_primer_apellido = scAjaxGetFieldText(nomeCampo_conyuge_primer_apellido);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_conyuge_primer_apellido(var_conyuge_primer_apellido, var_script_case_init, do_ajax_form_maecte_mob_validate_conyuge_primer_apellido_cb);
  } // do_ajax_form_maecte_mob_validate_conyuge_primer_apellido

  function do_ajax_form_maecte_mob_validate_conyuge_primer_apellido_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "conyuge_primer_apellido";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_conyuge_primer_apellido_cb

  // ---------- Validate conyuge_segundo_apellido
  function do_ajax_form_maecte_mob_validate_conyuge_segundo_apellido()
  {
    var nomeCampo_conyuge_segundo_apellido = "conyuge_segundo_apellido";
    var var_conyuge_segundo_apellido = scAjaxGetFieldText(nomeCampo_conyuge_segundo_apellido);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_conyuge_segundo_apellido(var_conyuge_segundo_apellido, var_script_case_init, do_ajax_form_maecte_mob_validate_conyuge_segundo_apellido_cb);
  } // do_ajax_form_maecte_mob_validate_conyuge_segundo_apellido

  function do_ajax_form_maecte_mob_validate_conyuge_segundo_apellido_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "conyuge_segundo_apellido";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_conyuge_segundo_apellido_cb

  // ---------- Validate conyuge_profesion
  function do_ajax_form_maecte_mob_validate_conyuge_profesion()
  {
    var nomeCampo_conyuge_profesion = "conyuge_profesion";
    var var_conyuge_profesion = scAjaxGetFieldText(nomeCampo_conyuge_profesion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_conyuge_profesion(var_conyuge_profesion, var_script_case_init, do_ajax_form_maecte_mob_validate_conyuge_profesion_cb);
  } // do_ajax_form_maecte_mob_validate_conyuge_profesion

  function do_ajax_form_maecte_mob_validate_conyuge_profesion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "conyuge_profesion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_conyuge_profesion_cb

  // ---------- Validate id_tipo_documento
  function do_ajax_form_maecte_mob_validate_id_tipo_documento()
  {
    var nomeCampo_id_tipo_documento = "id_tipo_documento";
    var var_id_tipo_documento = scAjaxGetFieldText(nomeCampo_id_tipo_documento);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_tipo_documento(var_id_tipo_documento, var_script_case_init, do_ajax_form_maecte_mob_validate_id_tipo_documento_cb);
  } // do_ajax_form_maecte_mob_validate_id_tipo_documento

  function do_ajax_form_maecte_mob_validate_id_tipo_documento_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_tipo_documento";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_tipo_documento_cb

  // ---------- Validate repleg01
  function do_ajax_form_maecte_mob_validate_repleg01()
  {
    var nomeCampo_repleg01 = "repleg01";
    var var_repleg01 = scAjaxGetFieldText(nomeCampo_repleg01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_repleg01(var_repleg01, var_script_case_init, do_ajax_form_maecte_mob_validate_repleg01_cb);
  } // do_ajax_form_maecte_mob_validate_repleg01

  function do_ajax_form_maecte_mob_validate_repleg01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "repleg01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_repleg01_cb

  // ---------- Validate fecing01
  function do_ajax_form_maecte_mob_validate_fecing01()
  {
    var nomeCampo_fecing01 = "fecing01";
    var var_fecing01 = scAjaxGetFieldText(nomeCampo_fecing01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_fecing01(var_fecing01, var_script_case_init, do_ajax_form_maecte_mob_validate_fecing01_cb);
  } // do_ajax_form_maecte_mob_validate_fecing01

  function do_ajax_form_maecte_mob_validate_fecing01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecing01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecing01_cb

  // ---------- Validate condpag01
  function do_ajax_form_maecte_mob_validate_condpag01()
  {
    var nomeCampo_condpag01 = "condpag01";
    var var_condpag01 = scAjaxGetFieldText(nomeCampo_condpag01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_condpag01(var_condpag01, var_script_case_init, do_ajax_form_maecte_mob_validate_condpag01_cb);
  } // do_ajax_form_maecte_mob_validate_condpag01

  function do_ajax_form_maecte_mob_validate_condpag01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "condpag01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_condpag01_cb

  // ---------- Validate desctocte01
  function do_ajax_form_maecte_mob_validate_desctocte01()
  {
    var nomeCampo_desctocte01 = "desctocte01";
    var var_desctocte01 = scAjaxGetFieldText(nomeCampo_desctocte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_desctocte01(var_desctocte01, var_script_case_init, do_ajax_form_maecte_mob_validate_desctocte01_cb);
  } // do_ajax_form_maecte_mob_validate_desctocte01

  function do_ajax_form_maecte_mob_validate_desctocte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "desctocte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_desctocte01_cb

  // ---------- Validate limcred01
  function do_ajax_form_maecte_mob_validate_limcred01()
  {
    var nomeCampo_limcred01 = "limcred01";
    var var_limcred01 = scAjaxGetFieldText(nomeCampo_limcred01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_limcred01(var_limcred01, var_script_case_init, do_ajax_form_maecte_mob_validate_limcred01_cb);
  } // do_ajax_form_maecte_mob_validate_limcred01

  function do_ajax_form_maecte_mob_validate_limcred01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "limcred01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_limcred01_cb

  // ---------- Validate desppar01
  function do_ajax_form_maecte_mob_validate_desppar01()
  {
    var nomeCampo_desppar01 = "desppar01";
    var var_desppar01 = scAjaxGetFieldText(nomeCampo_desppar01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_desppar01(var_desppar01, var_script_case_init, do_ajax_form_maecte_mob_validate_desppar01_cb);
  } // do_ajax_form_maecte_mob_validate_desppar01

  function do_ajax_form_maecte_mob_validate_desppar01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "desppar01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_desppar01_cb

  // ---------- Validate cheqpro01
  function do_ajax_form_maecte_mob_validate_cheqpro01()
  {
    var nomeCampo_cheqpro01 = "cheqpro01";
    var var_cheqpro01 = scAjaxGetFieldText(nomeCampo_cheqpro01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cheqpro01(var_cheqpro01, var_script_case_init, do_ajax_form_maecte_mob_validate_cheqpro01_cb);
  } // do_ajax_form_maecte_mob_validate_cheqpro01

  function do_ajax_form_maecte_mob_validate_cheqpro01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cheqpro01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cheqpro01_cb

  // ---------- Validate sdoeje01
  function do_ajax_form_maecte_mob_validate_sdoeje01()
  {
    var nomeCampo_sdoeje01 = "sdoeje01";
    var var_sdoeje01 = scAjaxGetFieldText(nomeCampo_sdoeje01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sdoeje01(var_sdoeje01, var_script_case_init, do_ajax_form_maecte_mob_validate_sdoeje01_cb);
  } // do_ajax_form_maecte_mob_validate_sdoeje01

  function do_ajax_form_maecte_mob_validate_sdoeje01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sdoeje01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sdoeje01_cb

  // ---------- Validate sdoant01
  function do_ajax_form_maecte_mob_validate_sdoant01()
  {
    var nomeCampo_sdoant01 = "sdoant01";
    var var_sdoant01 = scAjaxGetFieldText(nomeCampo_sdoant01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sdoant01(var_sdoant01, var_script_case_init, do_ajax_form_maecte_mob_validate_sdoant01_cb);
  } // do_ajax_form_maecte_mob_validate_sdoant01

  function do_ajax_form_maecte_mob_validate_sdoant01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sdoant01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sdoant01_cb

  // ---------- Validate sdoact01
  function do_ajax_form_maecte_mob_validate_sdoact01()
  {
    var nomeCampo_sdoact01 = "sdoact01";
    var var_sdoact01 = scAjaxGetFieldText(nomeCampo_sdoact01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sdoact01(var_sdoact01, var_script_case_init, do_ajax_form_maecte_mob_validate_sdoact01_cb);
  } // do_ajax_form_maecte_mob_validate_sdoact01

  function do_ajax_form_maecte_mob_validate_sdoact01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sdoact01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sdoact01_cb

  // ---------- Validate acudbm01
  function do_ajax_form_maecte_mob_validate_acudbm01()
  {
    var nomeCampo_acudbm01 = "acudbm01";
    var var_acudbm01 = scAjaxGetFieldText(nomeCampo_acudbm01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_acudbm01(var_acudbm01, var_script_case_init, do_ajax_form_maecte_mob_validate_acudbm01_cb);
  } // do_ajax_form_maecte_mob_validate_acudbm01

  function do_ajax_form_maecte_mob_validate_acudbm01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "acudbm01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_acudbm01_cb

  // ---------- Validate acucrm01
  function do_ajax_form_maecte_mob_validate_acucrm01()
  {
    var nomeCampo_acucrm01 = "acucrm01";
    var var_acucrm01 = scAjaxGetFieldText(nomeCampo_acucrm01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_acucrm01(var_acucrm01, var_script_case_init, do_ajax_form_maecte_mob_validate_acucrm01_cb);
  } // do_ajax_form_maecte_mob_validate_acucrm01

  function do_ajax_form_maecte_mob_validate_acucrm01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "acucrm01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_acucrm01_cb

  // ---------- Validate acudbe01
  function do_ajax_form_maecte_mob_validate_acudbe01()
  {
    var nomeCampo_acudbe01 = "acudbe01";
    var var_acudbe01 = scAjaxGetFieldText(nomeCampo_acudbe01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_acudbe01(var_acudbe01, var_script_case_init, do_ajax_form_maecte_mob_validate_acudbe01_cb);
  } // do_ajax_form_maecte_mob_validate_acudbe01

  function do_ajax_form_maecte_mob_validate_acudbe01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "acudbe01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_acudbe01_cb

  // ---------- Validate acucre01
  function do_ajax_form_maecte_mob_validate_acucre01()
  {
    var nomeCampo_acucre01 = "acucre01";
    var var_acucre01 = scAjaxGetFieldText(nomeCampo_acucre01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_acucre01(var_acucre01, var_script_case_init, do_ajax_form_maecte_mob_validate_acucre01_cb);
  } // do_ajax_form_maecte_mob_validate_acucre01

  function do_ajax_form_maecte_mob_validate_acucre01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "acucre01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_acucre01_cb

  // ---------- Validate comentcte01
  function do_ajax_form_maecte_mob_validate_comentcte01()
  {
    var nomeCampo_comentcte01 = "comentcte01";
    var var_comentcte01 = scAjaxGetFieldText(nomeCampo_comentcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_comentcte01(var_comentcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_comentcte01_cb);
  } // do_ajax_form_maecte_mob_validate_comentcte01

  function do_ajax_form_maecte_mob_validate_comentcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "comentcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_comentcte01_cb

  // ---------- Validate statuscte01
  function do_ajax_form_maecte_mob_validate_statuscte01()
  {
    var nomeCampo_statuscte01 = "statuscte01";
    var var_statuscte01 = scAjaxGetFieldText(nomeCampo_statuscte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_statuscte01(var_statuscte01, var_script_case_init, do_ajax_form_maecte_mob_validate_statuscte01_cb);
  } // do_ajax_form_maecte_mob_validate_statuscte01

  function do_ajax_form_maecte_mob_validate_statuscte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "statuscte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_statuscte01_cb

  // ---------- Validate identcte01
  function do_ajax_form_maecte_mob_validate_identcte01()
  {
    var nomeCampo_identcte01 = "identcte01";
    var var_identcte01 = scAjaxGetFieldText(nomeCampo_identcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_identcte01(var_identcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_identcte01_cb);
  } // do_ajax_form_maecte_mob_validate_identcte01

  function do_ajax_form_maecte_mob_validate_identcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "identcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_identcte01_cb

  // ---------- Validate cordcte01
  function do_ajax_form_maecte_mob_validate_cordcte01()
  {
    var nomeCampo_cordcte01 = "cordcte01";
    var var_cordcte01 = scAjaxGetFieldText(nomeCampo_cordcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cordcte01(var_cordcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_cordcte01_cb);
  } // do_ajax_form_maecte_mob_validate_cordcte01

  function do_ajax_form_maecte_mob_validate_cordcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cordcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cordcte01_cb

  // ---------- Validate limcant01
  function do_ajax_form_maecte_mob_validate_limcant01()
  {
    var nomeCampo_limcant01 = "limcant01";
    var var_limcant01 = scAjaxGetFieldText(nomeCampo_limcant01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_limcant01(var_limcant01, var_script_case_init, do_ajax_form_maecte_mob_validate_limcant01_cb);
  } // do_ajax_form_maecte_mob_validate_limcant01

  function do_ajax_form_maecte_mob_validate_limcant01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "limcant01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_limcant01_cb

  // ---------- Validate pagleg01
  function do_ajax_form_maecte_mob_validate_pagleg01()
  {
    var nomeCampo_pagleg01 = "pagleg01";
    var var_pagleg01 = scAjaxGetFieldText(nomeCampo_pagleg01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_pagleg01(var_pagleg01, var_script_case_init, do_ajax_form_maecte_mob_validate_pagleg01_cb);
  } // do_ajax_form_maecte_mob_validate_pagleg01

  function do_ajax_form_maecte_mob_validate_pagleg01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pagleg01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_pagleg01_cb

  // ---------- Validate telcte01b
  function do_ajax_form_maecte_mob_validate_telcte01b()
  {
    var nomeCampo_telcte01b = "telcte01b";
    var var_telcte01b = scAjaxGetFieldText(nomeCampo_telcte01b);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telcte01b(var_telcte01b, var_script_case_init, do_ajax_form_maecte_mob_validate_telcte01b_cb);
  } // do_ajax_form_maecte_mob_validate_telcte01b

  function do_ajax_form_maecte_mob_validate_telcte01b_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telcte01b";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telcte01b_cb

  // ---------- Validate telcte01c
  function do_ajax_form_maecte_mob_validate_telcte01c()
  {
    var nomeCampo_telcte01c = "telcte01c";
    var var_telcte01c = scAjaxGetFieldText(nomeCampo_telcte01c);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telcte01c(var_telcte01c, var_script_case_init, do_ajax_form_maecte_mob_validate_telcte01c_cb);
  } // do_ajax_form_maecte_mob_validate_telcte01c

  function do_ajax_form_maecte_mob_validate_telcte01c_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telcte01c";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telcte01c_cb

  // ---------- Validate emailcte01
  function do_ajax_form_maecte_mob_validate_emailcte01()
  {
    var nomeCampo_emailcte01 = "emailcte01";
    var var_emailcte01 = scAjaxGetFieldText(nomeCampo_emailcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_emailcte01(var_emailcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_emailcte01_cb);
  } // do_ajax_form_maecte_mob_validate_emailcte01

  function do_ajax_form_maecte_mob_validate_emailcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "emailcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_emailcte01_cb

  // ---------- Validate calle_principal_exterior
  function do_ajax_form_maecte_mob_validate_calle_principal_exterior()
  {
    var nomeCampo_calle_principal_exterior = "calle_principal_exterior";
    var var_calle_principal_exterior = scAjaxGetFieldText(nomeCampo_calle_principal_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_principal_exterior(var_calle_principal_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_principal_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_calle_principal_exterior

  function do_ajax_form_maecte_mob_validate_calle_principal_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_principal_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_principal_exterior_cb

  // ---------- Validate no_exterior
  function do_ajax_form_maecte_mob_validate_no_exterior()
  {
    var nomeCampo_no_exterior = "no_exterior";
    var var_no_exterior = scAjaxGetFieldText(nomeCampo_no_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_no_exterior(var_no_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_no_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_no_exterior

  function do_ajax_form_maecte_mob_validate_no_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "no_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_no_exterior_cb

  // ---------- Validate calle_secundaria_exterior
  function do_ajax_form_maecte_mob_validate_calle_secundaria_exterior()
  {
    var nomeCampo_calle_secundaria_exterior = "calle_secundaria_exterior";
    var var_calle_secundaria_exterior = scAjaxGetFieldText(nomeCampo_calle_secundaria_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_secundaria_exterior(var_calle_secundaria_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_secundaria_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_calle_secundaria_exterior

  function do_ajax_form_maecte_mob_validate_calle_secundaria_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_secundaria_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_secundaria_exterior_cb

  // ---------- Validate id_pais_exterior
  function do_ajax_form_maecte_mob_validate_id_pais_exterior()
  {
    var nomeCampo_id_pais_exterior = "id_pais_exterior";
    var var_id_pais_exterior = scAjaxGetFieldText(nomeCampo_id_pais_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_pais_exterior(var_id_pais_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_id_pais_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_id_pais_exterior

  function do_ajax_form_maecte_mob_validate_id_pais_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_pais_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_pais_exterior_cb

  // ---------- Validate id_ciudad_exterior
  function do_ajax_form_maecte_mob_validate_id_ciudad_exterior()
  {
    var nomeCampo_id_ciudad_exterior = "id_ciudad_exterior";
    var var_id_ciudad_exterior = scAjaxGetFieldText(nomeCampo_id_ciudad_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_ciudad_exterior(var_id_ciudad_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_id_ciudad_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_id_ciudad_exterior

  function do_ajax_form_maecte_mob_validate_id_ciudad_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_ciudad_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_ciudad_exterior_cb

  // ---------- Validate codigo_postal_exterior
  function do_ajax_form_maecte_mob_validate_codigo_postal_exterior()
  {
    var nomeCampo_codigo_postal_exterior = "codigo_postal_exterior";
    var var_codigo_postal_exterior = scAjaxGetFieldText(nomeCampo_codigo_postal_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_codigo_postal_exterior(var_codigo_postal_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_codigo_postal_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_codigo_postal_exterior

  function do_ajax_form_maecte_mob_validate_codigo_postal_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codigo_postal_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_codigo_postal_exterior_cb

  // ---------- Validate sector_exterior
  function do_ajax_form_maecte_mob_validate_sector_exterior()
  {
    var nomeCampo_sector_exterior = "sector_exterior";
    var var_sector_exterior = scAjaxGetFieldText(nomeCampo_sector_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sector_exterior(var_sector_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_sector_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_sector_exterior

  function do_ajax_form_maecte_mob_validate_sector_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sector_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sector_exterior_cb

  // ---------- Validate telefono_exterior
  function do_ajax_form_maecte_mob_validate_telefono_exterior()
  {
    var nomeCampo_telefono_exterior = "telefono_exterior";
    var var_telefono_exterior = scAjaxGetFieldText(nomeCampo_telefono_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telefono_exterior(var_telefono_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_telefono_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_telefono_exterior

  function do_ajax_form_maecte_mob_validate_telefono_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telefono_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telefono_exterior_cb

  // ---------- Validate celular_exterior
  function do_ajax_form_maecte_mob_validate_celular_exterior()
  {
    var nomeCampo_celular_exterior = "celular_exterior";
    var var_celular_exterior = scAjaxGetFieldText(nomeCampo_celular_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_celular_exterior(var_celular_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_celular_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_celular_exterior

  function do_ajax_form_maecte_mob_validate_celular_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "celular_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_celular_exterior_cb

  // ---------- Validate email_exterior
  function do_ajax_form_maecte_mob_validate_email_exterior()
  {
    var nomeCampo_email_exterior = "email_exterior";
    var var_email_exterior = scAjaxGetFieldText(nomeCampo_email_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_email_exterior(var_email_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_email_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_email_exterior

  function do_ajax_form_maecte_mob_validate_email_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "email_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_email_exterior_cb

  // ---------- Validate emailaltcte01
  function do_ajax_form_maecte_mob_validate_emailaltcte01()
  {
    var nomeCampo_emailaltcte01 = "emailaltcte01";
    var var_emailaltcte01 = scAjaxGetFieldText(nomeCampo_emailaltcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_emailaltcte01(var_emailaltcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_emailaltcte01_cb);
  } // do_ajax_form_maecte_mob_validate_emailaltcte01

  function do_ajax_form_maecte_mob_validate_emailaltcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "emailaltcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_emailaltcte01_cb

  // ---------- Validate ctacgcte01
  function do_ajax_form_maecte_mob_validate_ctacgcte01()
  {
    var nomeCampo_ctacgcte01 = "ctacgcte01";
    var var_ctacgcte01 = scAjaxGetFieldText(nomeCampo_ctacgcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ctacgcte01(var_ctacgcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_ctacgcte01_cb);
  } // do_ajax_form_maecte_mob_validate_ctacgcte01

  function do_ajax_form_maecte_mob_validate_ctacgcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ctacgcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ctacgcte01_cb

  // ---------- Validate obsercte01
  function do_ajax_form_maecte_mob_validate_obsercte01()
  {
    var nomeCampo_obsercte01 = "obsercte01";
    var var_obsercte01 = scAjaxGetFieldText(nomeCampo_obsercte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_obsercte01(var_obsercte01, var_script_case_init, do_ajax_form_maecte_mob_validate_obsercte01_cb);
  } // do_ajax_form_maecte_mob_validate_obsercte01

  function do_ajax_form_maecte_mob_validate_obsercte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "obsercte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_obsercte01_cb

  // ---------- Validate totexceso01
  function do_ajax_form_maecte_mob_validate_totexceso01()
  {
    var nomeCampo_totexceso01 = "totexceso01";
    var var_totexceso01 = scAjaxGetFieldText(nomeCampo_totexceso01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_totexceso01(var_totexceso01, var_script_case_init, do_ajax_form_maecte_mob_validate_totexceso01_cb);
  } // do_ajax_form_maecte_mob_validate_totexceso01

  function do_ajax_form_maecte_mob_validate_totexceso01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "totexceso01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_totexceso01_cb

  // ---------- Validate imagencte01
  function do_ajax_form_maecte_mob_validate_imagencte01()
  {
    var nomeCampo_imagencte01 = "imagencte01";
    var var_imagencte01 = scAjaxGetFieldText(nomeCampo_imagencte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_imagencte01(var_imagencte01, var_script_case_init, do_ajax_form_maecte_mob_validate_imagencte01_cb);
  } // do_ajax_form_maecte_mob_validate_imagencte01

  function do_ajax_form_maecte_mob_validate_imagencte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "imagencte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_imagencte01_cb

  // ---------- Validate block
  function do_ajax_form_maecte_mob_validate_block()
  {
    var nomeCampo_block = "block";
    var var_block = scAjaxGetFieldText(nomeCampo_block);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_block(var_block, var_script_case_init, do_ajax_form_maecte_mob_validate_block_cb);
  } // do_ajax_form_maecte_mob_validate_block

  function do_ajax_form_maecte_mob_validate_block_cb(sResp)
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
  } // do_ajax_form_maecte_mob_validate_block_cb

  // ---------- Validate uid
  function do_ajax_form_maecte_mob_validate_uid()
  {
    var nomeCampo_uid = "uid";
    var var_uid = scAjaxGetFieldText(nomeCampo_uid);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_uid(var_uid, var_script_case_init, do_ajax_form_maecte_mob_validate_uid_cb);
  } // do_ajax_form_maecte_mob_validate_uid

  function do_ajax_form_maecte_mob_validate_uid_cb(sResp)
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
  } // do_ajax_form_maecte_mob_validate_uid_cb

  // ---------- Validate ultimoacceso
  function do_ajax_form_maecte_mob_validate_ultimoacceso()
  {
    var nomeCampo_ultimoacceso = "ultimoacceso";
    var var_ultimoacceso = scAjaxGetFieldText(nomeCampo_ultimoacceso);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ultimoacceso(var_ultimoacceso, var_script_case_init, do_ajax_form_maecte_mob_validate_ultimoacceso_cb);
  } // do_ajax_form_maecte_mob_validate_ultimoacceso

  function do_ajax_form_maecte_mob_validate_ultimoacceso_cb(sResp)
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
  } // do_ajax_form_maecte_mob_validate_ultimoacceso_cb

  // ---------- Validate idcli
  function do_ajax_form_maecte_mob_validate_idcli()
  {
    var nomeCampo_idcli = "idcli";
    var var_idcli = scAjaxGetFieldText(nomeCampo_idcli);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_idcli(var_idcli, var_script_case_init, do_ajax_form_maecte_mob_validate_idcli_cb);
  } // do_ajax_form_maecte_mob_validate_idcli

  function do_ajax_form_maecte_mob_validate_idcli_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "idcli";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_idcli_cb

  // ---------- Validate catcte01
  function do_ajax_form_maecte_mob_validate_catcte01()
  {
    var nomeCampo_catcte01 = "catcte01";
    var var_catcte01 = scAjaxGetFieldText(nomeCampo_catcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_catcte01(var_catcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_catcte01_cb);
  } // do_ajax_form_maecte_mob_validate_catcte01

  function do_ajax_form_maecte_mob_validate_catcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "catcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_catcte01_cb

  // ---------- Validate transferido
  function do_ajax_form_maecte_mob_validate_transferido()
  {
    var nomeCampo_transferido = "transferido";
    var var_transferido = scAjaxGetFieldText(nomeCampo_transferido);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_transferido(var_transferido, var_script_case_init, do_ajax_form_maecte_mob_validate_transferido_cb);
  } // do_ajax_form_maecte_mob_validate_transferido

  function do_ajax_form_maecte_mob_validate_transferido_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "transferido";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_transferido_cb

  // ---------- Validate password
  function do_ajax_form_maecte_mob_validate_password()
  {
    var nomeCampo_password = "password";
    var var_password = scAjaxGetFieldText(nomeCampo_password);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_password(var_password, var_script_case_init, do_ajax_form_maecte_mob_validate_password_cb);
  } // do_ajax_form_maecte_mob_validate_password

  function do_ajax_form_maecte_mob_validate_password_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "password";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_password_cb

  // ---------- Validate showroom
  function do_ajax_form_maecte_mob_validate_showroom()
  {
    var nomeCampo_showroom = "showroom";
    var var_showroom = scAjaxGetFieldText(nomeCampo_showroom);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_showroom(var_showroom, var_script_case_init, do_ajax_form_maecte_mob_validate_showroom_cb);
  } // do_ajax_form_maecte_mob_validate_showroom

  function do_ajax_form_maecte_mob_validate_showroom_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "showroom";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_showroom_cb

  // ---------- Validate orden
  function do_ajax_form_maecte_mob_validate_orden()
  {
    var nomeCampo_orden = "orden";
    var var_orden = scAjaxGetFieldText(nomeCampo_orden);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_orden(var_orden, var_script_case_init, do_ajax_form_maecte_mob_validate_orden_cb);
  } // do_ajax_form_maecte_mob_validate_orden

  function do_ajax_form_maecte_mob_validate_orden_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "orden";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_orden_cb

  // ---------- Validate website
  function do_ajax_form_maecte_mob_validate_website()
  {
    var nomeCampo_website = "website";
    var var_website = scAjaxGetFieldText(nomeCampo_website);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_website(var_website, var_script_case_init, do_ajax_form_maecte_mob_validate_website_cb);
  } // do_ajax_form_maecte_mob_validate_website

  function do_ajax_form_maecte_mob_validate_website_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "website";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_website_cb

  // ---------- Validate longitud01
  function do_ajax_form_maecte_mob_validate_longitud01()
  {
    var nomeCampo_longitud01 = "longitud01";
    var var_longitud01 = scAjaxGetFieldText(nomeCampo_longitud01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_longitud01(var_longitud01, var_script_case_init, do_ajax_form_maecte_mob_validate_longitud01_cb);
  } // do_ajax_form_maecte_mob_validate_longitud01

  function do_ajax_form_maecte_mob_validate_longitud01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "longitud01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_longitud01_cb

  // ---------- Validate latitud01
  function do_ajax_form_maecte_mob_validate_latitud01()
  {
    var nomeCampo_latitud01 = "latitud01";
    var var_latitud01 = scAjaxGetFieldText(nomeCampo_latitud01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_latitud01(var_latitud01, var_script_case_init, do_ajax_form_maecte_mob_validate_latitud01_cb);
  } // do_ajax_form_maecte_mob_validate_latitud01

  function do_ajax_form_maecte_mob_validate_latitud01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "latitud01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_latitud01_cb

  // ---------- Validate zoom01
  function do_ajax_form_maecte_mob_validate_zoom01()
  {
    var nomeCampo_zoom01 = "zoom01";
    var var_zoom01 = scAjaxGetFieldText(nomeCampo_zoom01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_zoom01(var_zoom01, var_script_case_init, do_ajax_form_maecte_mob_validate_zoom01_cb);
  } // do_ajax_form_maecte_mob_validate_zoom01

  function do_ajax_form_maecte_mob_validate_zoom01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "zoom01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_zoom01_cb

  // ---------- Validate acceder
  function do_ajax_form_maecte_mob_validate_acceder()
  {
    var nomeCampo_acceder = "acceder";
    var var_acceder = scAjaxGetFieldText(nomeCampo_acceder);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_acceder(var_acceder, var_script_case_init, do_ajax_form_maecte_mob_validate_acceder_cb);
  } // do_ajax_form_maecte_mob_validate_acceder

  function do_ajax_form_maecte_mob_validate_acceder_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "acceder";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_acceder_cb

  // ---------- Validate coniva01
  function do_ajax_form_maecte_mob_validate_coniva01()
  {
    var nomeCampo_coniva01 = "coniva01";
    var var_coniva01 = scAjaxGetFieldText(nomeCampo_coniva01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_coniva01(var_coniva01, var_script_case_init, do_ajax_form_maecte_mob_validate_coniva01_cb);
  } // do_ajax_form_maecte_mob_validate_coniva01

  function do_ajax_form_maecte_mob_validate_coniva01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "coniva01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_coniva01_cb

  // ---------- Validate idemp01
  function do_ajax_form_maecte_mob_validate_idemp01()
  {
    var nomeCampo_idemp01 = "idemp01";
    var var_idemp01 = scAjaxGetFieldText(nomeCampo_idemp01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_idemp01(var_idemp01, var_script_case_init, do_ajax_form_maecte_mob_validate_idemp01_cb);
  } // do_ajax_form_maecte_mob_validate_idemp01

  function do_ajax_form_maecte_mob_validate_idemp01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "idemp01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_idemp01_cb

  // ---------- Validate codprov01
  function do_ajax_form_maecte_mob_validate_codprov01()
  {
    var nomeCampo_codprov01 = "codprov01";
    var var_codprov01 = scAjaxGetFieldText(nomeCampo_codprov01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_codprov01(var_codprov01, var_script_case_init, do_ajax_form_maecte_mob_validate_codprov01_cb);
  } // do_ajax_form_maecte_mob_validate_codprov01

  function do_ajax_form_maecte_mob_validate_codprov01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "codprov01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_codprov01_cb

  // ---------- Validate celular01
  function do_ajax_form_maecte_mob_validate_celular01()
  {
    var nomeCampo_celular01 = "celular01";
    var var_celular01 = scAjaxGetFieldText(nomeCampo_celular01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_celular01(var_celular01, var_script_case_init, do_ajax_form_maecte_mob_validate_celular01_cb);
  } // do_ajax_form_maecte_mob_validate_celular01

  function do_ajax_form_maecte_mob_validate_celular01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "celular01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_celular01_cb

  // ---------- Validate dircliente01
  function do_ajax_form_maecte_mob_validate_dircliente01()
  {
    var nomeCampo_dircliente01 = "dircliente01";
    var var_dircliente01 = scAjaxGetFieldText(nomeCampo_dircliente01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_dircliente01(var_dircliente01, var_script_case_init, do_ajax_form_maecte_mob_validate_dircliente01_cb);
  } // do_ajax_form_maecte_mob_validate_dircliente01

  function do_ajax_form_maecte_mob_validate_dircliente01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dircliente01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_dircliente01_cb

  // ---------- Validate razcte01
  function do_ajax_form_maecte_mob_validate_razcte01()
  {
    var nomeCampo_razcte01 = "razcte01";
    var var_razcte01 = scAjaxGetFieldText(nomeCampo_razcte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_razcte01(var_razcte01, var_script_case_init, do_ajax_form_maecte_mob_validate_razcte01_cb);
  } // do_ajax_form_maecte_mob_validate_razcte01

  function do_ajax_form_maecte_mob_validate_razcte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "razcte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_razcte01_cb

  // ---------- Validate ruc01
  function do_ajax_form_maecte_mob_validate_ruc01()
  {
    var nomeCampo_ruc01 = "ruc01";
    var var_ruc01 = scAjaxGetFieldText(nomeCampo_ruc01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ruc01(var_ruc01, var_script_case_init, do_ajax_form_maecte_mob_validate_ruc01_cb);
  } // do_ajax_form_maecte_mob_validate_ruc01

  function do_ajax_form_maecte_mob_validate_ruc01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ruc01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ruc01_cb

  // ---------- Validate timenegocio01
  function do_ajax_form_maecte_mob_validate_timenegocio01()
  {
    var nomeCampo_timenegocio01 = "timenegocio01";
    var var_timenegocio01 = scAjaxGetFieldText(nomeCampo_timenegocio01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_timenegocio01(var_timenegocio01, var_script_case_init, do_ajax_form_maecte_mob_validate_timenegocio01_cb);
  } // do_ajax_form_maecte_mob_validate_timenegocio01

  function do_ajax_form_maecte_mob_validate_timenegocio01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "timenegocio01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_timenegocio01_cb

  // ---------- Validate refbanc01
  function do_ajax_form_maecte_mob_validate_refbanc01()
  {
    var nomeCampo_refbanc01 = "refbanc01";
    var var_refbanc01 = scAjaxGetFieldText(nomeCampo_refbanc01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_refbanc01(var_refbanc01, var_script_case_init, do_ajax_form_maecte_mob_validate_refbanc01_cb);
  } // do_ajax_form_maecte_mob_validate_refbanc01

  function do_ajax_form_maecte_mob_validate_refbanc01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "refbanc01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_refbanc01_cb

  // ---------- Validate refcom01
  function do_ajax_form_maecte_mob_validate_refcom01()
  {
    var nomeCampo_refcom01 = "refcom01";
    var var_refcom01 = scAjaxGetFieldText(nomeCampo_refcom01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_refcom01(var_refcom01, var_script_case_init, do_ajax_form_maecte_mob_validate_refcom01_cb);
  } // do_ajax_form_maecte_mob_validate_refcom01

  function do_ajax_form_maecte_mob_validate_refcom01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "refcom01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_refcom01_cb

  // ---------- Validate tarjcred01
  function do_ajax_form_maecte_mob_validate_tarjcred01()
  {
    var nomeCampo_tarjcred01 = "tarjcred01";
    var var_tarjcred01 = scAjaxGetFieldText(nomeCampo_tarjcred01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_tarjcred01(var_tarjcred01, var_script_case_init, do_ajax_form_maecte_mob_validate_tarjcred01_cb);
  } // do_ajax_form_maecte_mob_validate_tarjcred01

  function do_ajax_form_maecte_mob_validate_tarjcred01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tarjcred01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_tarjcred01_cb

  // ---------- Validate firmaut01
  function do_ajax_form_maecte_mob_validate_firmaut01()
  {
    var nomeCampo_firmaut01 = "firmaut01";
    var var_firmaut01 = scAjaxGetFieldText(nomeCampo_firmaut01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_firmaut01(var_firmaut01, var_script_case_init, do_ajax_form_maecte_mob_validate_firmaut01_cb);
  } // do_ajax_form_maecte_mob_validate_firmaut01

  function do_ajax_form_maecte_mob_validate_firmaut01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "firmaut01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_firmaut01_cb

  // ---------- Validate precte01
  function do_ajax_form_maecte_mob_validate_precte01()
  {
    var nomeCampo_precte01 = "precte01";
    var var_precte01 = scAjaxGetFieldText(nomeCampo_precte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_precte01(var_precte01, var_script_case_init, do_ajax_form_maecte_mob_validate_precte01_cb);
  } // do_ajax_form_maecte_mob_validate_precte01

  function do_ajax_form_maecte_mob_validate_precte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "precte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_precte01_cb

  // ---------- Validate cuotasven01
  function do_ajax_form_maecte_mob_validate_cuotasven01()
  {
    var nomeCampo_cuotasven01 = "cuotasven01";
    var var_cuotasven01 = scAjaxGetFieldText(nomeCampo_cuotasven01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cuotasven01(var_cuotasven01, var_script_case_init, do_ajax_form_maecte_mob_validate_cuotasven01_cb);
  } // do_ajax_form_maecte_mob_validate_cuotasven01

  function do_ajax_form_maecte_mob_validate_cuotasven01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cuotasven01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cuotasven01_cb

  // ---------- Validate diasven01
  function do_ajax_form_maecte_mob_validate_diasven01()
  {
    var nomeCampo_diasven01 = "diasven01";
    var var_diasven01 = scAjaxGetFieldText(nomeCampo_diasven01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_diasven01(var_diasven01, var_script_case_init, do_ajax_form_maecte_mob_validate_diasven01_cb);
  } // do_ajax_form_maecte_mob_validate_diasven01

  function do_ajax_form_maecte_mob_validate_diasven01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "diasven01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_diasven01_cb

  // ---------- Validate fechanace01
  function do_ajax_form_maecte_mob_validate_fechanace01()
  {
    var nomeCampo_fechanace01 = "fechanace01";
    var var_fechanace01 = scAjaxGetFieldText(nomeCampo_fechanace01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_fechanace01(var_fechanace01, var_script_case_init, do_ajax_form_maecte_mob_validate_fechanace01_cb);
  } // do_ajax_form_maecte_mob_validate_fechanace01

  function do_ajax_form_maecte_mob_validate_fechanace01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fechanace01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fechanace01_cb

  // ---------- Validate sexo01
  function do_ajax_form_maecte_mob_validate_sexo01()
  {
    var nomeCampo_sexo01 = "sexo01";
    var var_sexo01 = scAjaxGetFieldText(nomeCampo_sexo01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sexo01(var_sexo01, var_script_case_init, do_ajax_form_maecte_mob_validate_sexo01_cb);
  } // do_ajax_form_maecte_mob_validate_sexo01

  function do_ajax_form_maecte_mob_validate_sexo01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sexo01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sexo01_cb

  // ---------- Validate estadocivil01
  function do_ajax_form_maecte_mob_validate_estadocivil01()
  {
    var nomeCampo_estadocivil01 = "estadocivil01";
    var var_estadocivil01 = scAjaxGetFieldText(nomeCampo_estadocivil01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_estadocivil01(var_estadocivil01, var_script_case_init, do_ajax_form_maecte_mob_validate_estadocivil01_cb);
  } // do_ajax_form_maecte_mob_validate_estadocivil01

  function do_ajax_form_maecte_mob_validate_estadocivil01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estadocivil01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_estadocivil01_cb

  // ---------- Validate dirgestion01
  function do_ajax_form_maecte_mob_validate_dirgestion01()
  {
    var nomeCampo_dirgestion01 = "dirgestion01";
    var var_dirgestion01 = scAjaxGetFieldText(nomeCampo_dirgestion01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_dirgestion01(var_dirgestion01, var_script_case_init, do_ajax_form_maecte_mob_validate_dirgestion01_cb);
  } // do_ajax_form_maecte_mob_validate_dirgestion01

  function do_ajax_form_maecte_mob_validate_dirgestion01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dirgestion01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_dirgestion01_cb

  // ---------- Validate numhijos01
  function do_ajax_form_maecte_mob_validate_numhijos01()
  {
    var nomeCampo_numhijos01 = "numhijos01";
    var var_numhijos01 = scAjaxGetFieldText(nomeCampo_numhijos01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_numhijos01(var_numhijos01, var_script_case_init, do_ajax_form_maecte_mob_validate_numhijos01_cb);
  } // do_ajax_form_maecte_mob_validate_numhijos01

  function do_ajax_form_maecte_mob_validate_numhijos01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "numhijos01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_numhijos01_cb

  // ---------- Validate estsop01
  function do_ajax_form_maecte_mob_validate_estsop01()
  {
    var nomeCampo_estsop01 = "estsop01";
    var var_estsop01 = scAjaxGetFieldText(nomeCampo_estsop01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_estsop01(var_estsop01, var_script_case_init, do_ajax_form_maecte_mob_validate_estsop01_cb);
  } // do_ajax_form_maecte_mob_validate_estsop01

  function do_ajax_form_maecte_mob_validate_estsop01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estsop01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_estsop01_cb

  // ---------- Validate notick01
  function do_ajax_form_maecte_mob_validate_notick01()
  {
    var nomeCampo_notick01 = "notick01";
    var var_notick01 = scAjaxGetFieldText(nomeCampo_notick01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_notick01(var_notick01, var_script_case_init, do_ajax_form_maecte_mob_validate_notick01_cb);
  } // do_ajax_form_maecte_mob_validate_notick01

  function do_ajax_form_maecte_mob_validate_notick01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "notick01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_notick01_cb

  // ---------- Validate chequece
  function do_ajax_form_maecte_mob_validate_chequece()
  {
    var nomeCampo_chequece = "chequece";
    var var_chequece = scAjaxGetFieldText(nomeCampo_chequece);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_chequece(var_chequece, var_script_case_init, do_ajax_form_maecte_mob_validate_chequece_cb);
  } // do_ajax_form_maecte_mob_validate_chequece

  function do_ajax_form_maecte_mob_validate_chequece_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "chequece";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_chequece_cb

  // ---------- Validate solcre
  function do_ajax_form_maecte_mob_validate_solcre()
  {
    var nomeCampo_solcre = "solcre";
    var var_solcre = scAjaxGetFieldText(nomeCampo_solcre);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_solcre(var_solcre, var_script_case_init, do_ajax_form_maecte_mob_validate_solcre_cb);
  } // do_ajax_form_maecte_mob_validate_solcre

  function do_ajax_form_maecte_mob_validate_solcre_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "solcre";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_solcre_cb

  // ---------- Validate promocte01
  function do_ajax_form_maecte_mob_validate_promocte01()
  {
    var nomeCampo_promocte01 = "promocte01";
    var var_promocte01 = scAjaxGetFieldText(nomeCampo_promocte01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_promocte01(var_promocte01, var_script_case_init, do_ajax_form_maecte_mob_validate_promocte01_cb);
  } // do_ajax_form_maecte_mob_validate_promocte01

  function do_ajax_form_maecte_mob_validate_promocte01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "promocte01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_promocte01_cb

  // ---------- Validate pagare01
  function do_ajax_form_maecte_mob_validate_pagare01()
  {
    var nomeCampo_pagare01 = "pagare01";
    var var_pagare01 = scAjaxGetFieldText(nomeCampo_pagare01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_pagare01(var_pagare01, var_script_case_init, do_ajax_form_maecte_mob_validate_pagare01_cb);
  } // do_ajax_form_maecte_mob_validate_pagare01

  function do_ajax_form_maecte_mob_validate_pagare01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pagare01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_pagare01_cb

  // ---------- Validate valorpagare01
  function do_ajax_form_maecte_mob_validate_valorpagare01()
  {
    var nomeCampo_valorpagare01 = "valorpagare01";
    var var_valorpagare01 = scAjaxGetFieldText(nomeCampo_valorpagare01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_valorpagare01(var_valorpagare01, var_script_case_init, do_ajax_form_maecte_mob_validate_valorpagare01_cb);
  } // do_ajax_form_maecte_mob_validate_valorpagare01

  function do_ajax_form_maecte_mob_validate_valorpagare01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valorpagare01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_valorpagare01_cb

  // ---------- Validate garante01
  function do_ajax_form_maecte_mob_validate_garante01()
  {
    var nomeCampo_garante01 = "garante01";
    var var_garante01 = scAjaxGetFieldText(nomeCampo_garante01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_garante01(var_garante01, var_script_case_init, do_ajax_form_maecte_mob_validate_garante01_cb);
  } // do_ajax_form_maecte_mob_validate_garante01

  function do_ajax_form_maecte_mob_validate_garante01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "garante01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_garante01_cb

  // ---------- Validate fecvenp01
  function do_ajax_form_maecte_mob_validate_fecvenp01()
  {
    var nomeCampo_fecvenp01 = "fecvenp01";
    var var_fecvenp01 = scAjaxGetFieldText(nomeCampo_fecvenp01);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecvenp01 = scAjaxGetFieldText(nomeCampo_fecvenp01);
      x_ajax_form_maecte_mob_validate_fecvenp01(var_fecvenp01, var_script_case_init, do_ajax_form_maecte_mob_validate_fecvenp01_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecvenp01

  function do_ajax_form_maecte_mob_validate_fecvenp01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecvenp01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecvenp01_cb

  // ---------- Validate ctacgant01
  function do_ajax_form_maecte_mob_validate_ctacgant01()
  {
    var nomeCampo_ctacgant01 = "ctacgant01";
    var var_ctacgant01 = scAjaxGetFieldText(nomeCampo_ctacgant01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ctacgant01(var_ctacgant01, var_script_case_init, do_ajax_form_maecte_mob_validate_ctacgant01_cb);
  } // do_ajax_form_maecte_mob_validate_ctacgant01

  function do_ajax_form_maecte_mob_validate_ctacgant01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ctacgant01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ctacgant01_cb

  // ---------- Validate dsn
  function do_ajax_form_maecte_mob_validate_dsn()
  {
    var nomeCampo_dsn = "dsn";
    var var_dsn = scAjaxGetFieldText(nomeCampo_dsn);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_dsn(var_dsn, var_script_case_init, do_ajax_form_maecte_mob_validate_dsn_cb);
  } // do_ajax_form_maecte_mob_validate_dsn

  function do_ajax_form_maecte_mob_validate_dsn_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dsn";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_dsn_cb

  // ---------- Validate residente
  function do_ajax_form_maecte_mob_validate_residente()
  {
    var nomeCampo_residente = "residente";
    var var_residente = scAjaxGetFieldText(nomeCampo_residente);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_residente(var_residente, var_script_case_init, do_ajax_form_maecte_mob_validate_residente_cb);
  } // do_ajax_form_maecte_mob_validate_residente

  function do_ajax_form_maecte_mob_validate_residente_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "residente";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_residente_cb

  // ---------- Validate medio_contacto
  function do_ajax_form_maecte_mob_validate_medio_contacto()
  {
    var nomeCampo_medio_contacto = "medio_contacto";
    var var_medio_contacto = scAjaxGetFieldText(nomeCampo_medio_contacto);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_medio_contacto(var_medio_contacto, var_script_case_init, do_ajax_form_maecte_mob_validate_medio_contacto_cb);
  } // do_ajax_form_maecte_mob_validate_medio_contacto

  function do_ajax_form_maecte_mob_validate_medio_contacto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "medio_contacto";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_medio_contacto_cb

  // ---------- Validate separacion_bienes
  function do_ajax_form_maecte_mob_validate_separacion_bienes()
  {
    var nomeCampo_separacion_bienes = "separacion_bienes";
    var var_separacion_bienes = scAjaxGetFieldText(nomeCampo_separacion_bienes);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_separacion_bienes(var_separacion_bienes, var_script_case_init, do_ajax_form_maecte_mob_validate_separacion_bienes_cb);
  } // do_ajax_form_maecte_mob_validate_separacion_bienes

  function do_ajax_form_maecte_mob_validate_separacion_bienes_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "separacion_bienes";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_separacion_bienes_cb

  // ---------- Validate disolucion_conyugal
  function do_ajax_form_maecte_mob_validate_disolucion_conyugal()
  {
    var nomeCampo_disolucion_conyugal = "disolucion_conyugal";
    var var_disolucion_conyugal = scAjaxGetFieldText(nomeCampo_disolucion_conyugal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_disolucion_conyugal(var_disolucion_conyugal, var_script_case_init, do_ajax_form_maecte_mob_validate_disolucion_conyugal_cb);
  } // do_ajax_form_maecte_mob_validate_disolucion_conyugal

  function do_ajax_form_maecte_mob_validate_disolucion_conyugal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "disolucion_conyugal";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_disolucion_conyugal_cb

  // ---------- Validate capitulaciones
  function do_ajax_form_maecte_mob_validate_capitulaciones()
  {
    var nomeCampo_capitulaciones = "capitulaciones";
    var var_capitulaciones = scAjaxGetFieldText(nomeCampo_capitulaciones);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_capitulaciones(var_capitulaciones, var_script_case_init, do_ajax_form_maecte_mob_validate_capitulaciones_cb);
  } // do_ajax_form_maecte_mob_validate_capitulaciones

  function do_ajax_form_maecte_mob_validate_capitulaciones_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "capitulaciones";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_capitulaciones_cb

  // ---------- Validate numero_carga_familiar
  function do_ajax_form_maecte_mob_validate_numero_carga_familiar()
  {
    var nomeCampo_numero_carga_familiar = "numero_carga_familiar";
    var var_numero_carga_familiar = scAjaxGetFieldText(nomeCampo_numero_carga_familiar);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_numero_carga_familiar(var_numero_carga_familiar, var_script_case_init, do_ajax_form_maecte_mob_validate_numero_carga_familiar_cb);
  } // do_ajax_form_maecte_mob_validate_numero_carga_familiar

  function do_ajax_form_maecte_mob_validate_numero_carga_familiar_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "numero_carga_familiar";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_numero_carga_familiar_cb

  // ---------- Validate nivel_educacion
  function do_ajax_form_maecte_mob_validate_nivel_educacion()
  {
    var nomeCampo_nivel_educacion = "nivel_educacion";
    var var_nivel_educacion = scAjaxGetFieldText(nomeCampo_nivel_educacion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nivel_educacion(var_nivel_educacion, var_script_case_init, do_ajax_form_maecte_mob_validate_nivel_educacion_cb);
  } // do_ajax_form_maecte_mob_validate_nivel_educacion

  function do_ajax_form_maecte_mob_validate_nivel_educacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nivel_educacion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nivel_educacion_cb

  // ---------- Validate profesion
  function do_ajax_form_maecte_mob_validate_profesion()
  {
    var nomeCampo_profesion = "profesion";
    var var_profesion = scAjaxGetFieldText(nomeCampo_profesion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_profesion(var_profesion, var_script_case_init, do_ajax_form_maecte_mob_validate_profesion_cb);
  } // do_ajax_form_maecte_mob_validate_profesion

  function do_ajax_form_maecte_mob_validate_profesion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "profesion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_profesion_cb

  // ---------- Validate envio_correspondencia
  function do_ajax_form_maecte_mob_validate_envio_correspondencia()
  {
    var nomeCampo_envio_correspondencia = "envio_correspondencia";
    var var_envio_correspondencia = scAjaxGetFieldText(nomeCampo_envio_correspondencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_envio_correspondencia(var_envio_correspondencia, var_script_case_init, do_ajax_form_maecte_mob_validate_envio_correspondencia_cb);
  } // do_ajax_form_maecte_mob_validate_envio_correspondencia

  function do_ajax_form_maecte_mob_validate_envio_correspondencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "envio_correspondencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_envio_correspondencia_cb

  // ---------- Validate nombre_arrendador
  function do_ajax_form_maecte_mob_validate_nombre_arrendador()
  {
    var nomeCampo_nombre_arrendador = "nombre_arrendador";
    var var_nombre_arrendador = scAjaxGetFieldText(nomeCampo_nombre_arrendador);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nombre_arrendador(var_nombre_arrendador, var_script_case_init, do_ajax_form_maecte_mob_validate_nombre_arrendador_cb);
  } // do_ajax_form_maecte_mob_validate_nombre_arrendador

  function do_ajax_form_maecte_mob_validate_nombre_arrendador_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_arrendador";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nombre_arrendador_cb

  // ---------- Validate apellido_arrendador
  function do_ajax_form_maecte_mob_validate_apellido_arrendador()
  {
    var nomeCampo_apellido_arrendador = "apellido_arrendador";
    var var_apellido_arrendador = scAjaxGetFieldText(nomeCampo_apellido_arrendador);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_apellido_arrendador(var_apellido_arrendador, var_script_case_init, do_ajax_form_maecte_mob_validate_apellido_arrendador_cb);
  } // do_ajax_form_maecte_mob_validate_apellido_arrendador

  function do_ajax_form_maecte_mob_validate_apellido_arrendador_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "apellido_arrendador";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_apellido_arrendador_cb

  // ---------- Validate id_vivienda
  function do_ajax_form_maecte_mob_validate_id_vivienda()
  {
    var nomeCampo_id_vivienda = "id_vivienda";
    var var_id_vivienda = scAjaxGetFieldText(nomeCampo_id_vivienda);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_vivienda(var_id_vivienda, var_script_case_init, do_ajax_form_maecte_mob_validate_id_vivienda_cb);
  } // do_ajax_form_maecte_mob_validate_id_vivienda

  function do_ajax_form_maecte_mob_validate_id_vivienda_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_vivienda";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_vivienda_cb

  // ---------- Validate telefono_arrendador
  function do_ajax_form_maecte_mob_validate_telefono_arrendador()
  {
    var nomeCampo_telefono_arrendador = "telefono_arrendador";
    var var_telefono_arrendador = scAjaxGetFieldText(nomeCampo_telefono_arrendador);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telefono_arrendador(var_telefono_arrendador, var_script_case_init, do_ajax_form_maecte_mob_validate_telefono_arrendador_cb);
  } // do_ajax_form_maecte_mob_validate_telefono_arrendador

  function do_ajax_form_maecte_mob_validate_telefono_arrendador_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telefono_arrendador";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telefono_arrendador_cb

  // ---------- Validate nombres_referencia
  function do_ajax_form_maecte_mob_validate_nombres_referencia()
  {
    var nomeCampo_nombres_referencia = "nombres_referencia";
    var var_nombres_referencia = scAjaxGetFieldText(nomeCampo_nombres_referencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nombres_referencia(var_nombres_referencia, var_script_case_init, do_ajax_form_maecte_mob_validate_nombres_referencia_cb);
  } // do_ajax_form_maecte_mob_validate_nombres_referencia

  function do_ajax_form_maecte_mob_validate_nombres_referencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombres_referencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nombres_referencia_cb

  // ---------- Validate apellidos_referencia
  function do_ajax_form_maecte_mob_validate_apellidos_referencia()
  {
    var nomeCampo_apellidos_referencia = "apellidos_referencia";
    var var_apellidos_referencia = scAjaxGetFieldText(nomeCampo_apellidos_referencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_apellidos_referencia(var_apellidos_referencia, var_script_case_init, do_ajax_form_maecte_mob_validate_apellidos_referencia_cb);
  } // do_ajax_form_maecte_mob_validate_apellidos_referencia

  function do_ajax_form_maecte_mob_validate_apellidos_referencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "apellidos_referencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_apellidos_referencia_cb

  // ---------- Validate parentesco
  function do_ajax_form_maecte_mob_validate_parentesco()
  {
    var nomeCampo_parentesco = "parentesco";
    var var_parentesco = scAjaxGetFieldText(nomeCampo_parentesco);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_parentesco(var_parentesco, var_script_case_init, do_ajax_form_maecte_mob_validate_parentesco_cb);
  } // do_ajax_form_maecte_mob_validate_parentesco

  function do_ajax_form_maecte_mob_validate_parentesco_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "parentesco";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_parentesco_cb

  // ---------- Validate celular_ref
  function do_ajax_form_maecte_mob_validate_celular_ref()
  {
    var nomeCampo_celular_ref = "celular_ref";
    var var_celular_ref = scAjaxGetFieldText(nomeCampo_celular_ref);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_celular_ref(var_celular_ref, var_script_case_init, do_ajax_form_maecte_mob_validate_celular_ref_cb);
  } // do_ajax_form_maecte_mob_validate_celular_ref

  function do_ajax_form_maecte_mob_validate_celular_ref_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "celular_ref";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_celular_ref_cb

  // ---------- Validate telefono_convencional_ref
  function do_ajax_form_maecte_mob_validate_telefono_convencional_ref()
  {
    var nomeCampo_telefono_convencional_ref = "telefono_convencional_ref";
    var var_telefono_convencional_ref = scAjaxGetFieldText(nomeCampo_telefono_convencional_ref);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telefono_convencional_ref(var_telefono_convencional_ref, var_script_case_init, do_ajax_form_maecte_mob_validate_telefono_convencional_ref_cb);
  } // do_ajax_form_maecte_mob_validate_telefono_convencional_ref

  function do_ajax_form_maecte_mob_validate_telefono_convencional_ref_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telefono_convencional_ref";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telefono_convencional_ref_cb

  // ---------- Validate id_ocupacion
  function do_ajax_form_maecte_mob_validate_id_ocupacion()
  {
    var nomeCampo_id_ocupacion = "id_ocupacion";
    var var_id_ocupacion = scAjaxGetFieldText(nomeCampo_id_ocupacion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_ocupacion(var_id_ocupacion, var_script_case_init, do_ajax_form_maecte_mob_validate_id_ocupacion_cb);
  } // do_ajax_form_maecte_mob_validate_id_ocupacion

  function do_ajax_form_maecte_mob_validate_id_ocupacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_ocupacion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_ocupacion_cb

  // ---------- Validate fecha_ingreso_empresa
  function do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa()
  {
    var nomeCampo_fecha_ingreso_empresa = "fecha_ingreso_empresa";
    var var_fecha_ingreso_empresa = scAjaxGetFieldText(nomeCampo_fecha_ingreso_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecha_ingreso_empresa = scAjaxGetFieldText(nomeCampo_fecha_ingreso_empresa);
      x_ajax_form_maecte_mob_validate_fecha_ingreso_empresa(var_fecha_ingreso_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa

  function do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha_ingreso_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_cb

  // ---------- Validate nombre_empresa
  function do_ajax_form_maecte_mob_validate_nombre_empresa()
  {
    var nomeCampo_nombre_empresa = "nombre_empresa";
    var var_nombre_empresa = scAjaxGetFieldText(nomeCampo_nombre_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nombre_empresa(var_nombre_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_nombre_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_nombre_empresa

  function do_ajax_form_maecte_mob_validate_nombre_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nombre_empresa_cb

  // ---------- Validate ciudad_empresa
  function do_ajax_form_maecte_mob_validate_ciudad_empresa()
  {
    var nomeCampo_ciudad_empresa = "ciudad_empresa";
    var var_ciudad_empresa = scAjaxGetFieldText(nomeCampo_ciudad_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ciudad_empresa(var_ciudad_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_ciudad_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_ciudad_empresa

  function do_ajax_form_maecte_mob_validate_ciudad_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ciudad_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ciudad_empresa_cb

  // ---------- Validate provincia_empresa
  function do_ajax_form_maecte_mob_validate_provincia_empresa()
  {
    var nomeCampo_provincia_empresa = "provincia_empresa";
    var var_provincia_empresa = scAjaxGetFieldText(nomeCampo_provincia_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_provincia_empresa(var_provincia_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_provincia_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_provincia_empresa

  function do_ajax_form_maecte_mob_validate_provincia_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "provincia_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_provincia_empresa_cb

  // ---------- Validate direccion_empresa
  function do_ajax_form_maecte_mob_validate_direccion_empresa()
  {
    var nomeCampo_direccion_empresa = "direccion_empresa";
    var var_direccion_empresa = scAjaxGetFieldText(nomeCampo_direccion_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_direccion_empresa(var_direccion_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_direccion_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_direccion_empresa

  function do_ajax_form_maecte_mob_validate_direccion_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "direccion_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_direccion_empresa_cb

  // ---------- Validate cargo_empresa
  function do_ajax_form_maecte_mob_validate_cargo_empresa()
  {
    var nomeCampo_cargo_empresa = "cargo_empresa";
    var var_cargo_empresa = scAjaxGetFieldText(nomeCampo_cargo_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cargo_empresa(var_cargo_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_cargo_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_cargo_empresa

  function do_ajax_form_maecte_mob_validate_cargo_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cargo_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cargo_empresa_cb

  // ---------- Validate telefono_empresa
  function do_ajax_form_maecte_mob_validate_telefono_empresa()
  {
    var nomeCampo_telefono_empresa = "telefono_empresa";
    var var_telefono_empresa = scAjaxGetFieldText(nomeCampo_telefono_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telefono_empresa(var_telefono_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_telefono_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_telefono_empresa

  function do_ajax_form_maecte_mob_validate_telefono_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telefono_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telefono_empresa_cb

  // ---------- Validate ext_empresa
  function do_ajax_form_maecte_mob_validate_ext_empresa()
  {
    var nomeCampo_ext_empresa = "ext_empresa";
    var var_ext_empresa = scAjaxGetFieldText(nomeCampo_ext_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ext_empresa(var_ext_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_ext_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_ext_empresa

  function do_ajax_form_maecte_mob_validate_ext_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ext_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ext_empresa_cb

  // ---------- Validate id_tipo_contrato_actividad
  function do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad()
  {
    var nomeCampo_id_tipo_contrato_actividad = "id_tipo_contrato_actividad";
    var var_id_tipo_contrato_actividad = scAjaxGetFieldText(nomeCampo_id_tipo_contrato_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad(var_id_tipo_contrato_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad

  function do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_tipo_contrato_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad_cb

  // ---------- Validate empresa_jubilo_actividad
  function do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad()
  {
    var nomeCampo_empresa_jubilo_actividad = "empresa_jubilo_actividad";
    var var_empresa_jubilo_actividad = scAjaxGetFieldText(nomeCampo_empresa_jubilo_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_empresa_jubilo_actividad(var_empresa_jubilo_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad

  function do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "empresa_jubilo_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad_cb

  // ---------- Validate fecha_salida_empresa_actividad
  function do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad()
  {
    var nomeCampo_fecha_salida_empresa_actividad = "fecha_salida_empresa_actividad";
    var var_fecha_salida_empresa_actividad = scAjaxGetFieldText(nomeCampo_fecha_salida_empresa_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecha_salida_empresa_actividad = scAjaxGetFieldText(nomeCampo_fecha_salida_empresa_actividad);
      x_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad(var_fecha_salida_empresa_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad

  function do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha_salida_empresa_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad_cb

  // ---------- Validate cargo_salida_empresa_actividad
  function do_ajax_form_maecte_mob_validate_cargo_salida_empresa_actividad()
  {
    var nomeCampo_cargo_salida_empresa_actividad = "cargo_salida_empresa_actividad";
    var var_cargo_salida_empresa_actividad = scAjaxGetFieldText(nomeCampo_cargo_salida_empresa_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cargo_salida_empresa_actividad(var_cargo_salida_empresa_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_cargo_salida_empresa_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_cargo_salida_empresa_actividad

  function do_ajax_form_maecte_mob_validate_cargo_salida_empresa_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cargo_salida_empresa_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cargo_salida_empresa_actividad_cb

  // ---------- Validate fecha_inicio_actividad
  function do_ajax_form_maecte_mob_validate_fecha_inicio_actividad()
  {
    var nomeCampo_fecha_inicio_actividad = "fecha_inicio_actividad";
    var var_fecha_inicio_actividad = scAjaxGetFieldText(nomeCampo_fecha_inicio_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecha_inicio_actividad = scAjaxGetFieldText(nomeCampo_fecha_inicio_actividad);
      x_ajax_form_maecte_mob_validate_fecha_inicio_actividad(var_fecha_inicio_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_fecha_inicio_actividad_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecha_inicio_actividad

  function do_ajax_form_maecte_mob_validate_fecha_inicio_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha_inicio_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecha_inicio_actividad_cb

  // ---------- Validate fecha_ingreso_empresa_actividad
  function do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad()
  {
    var nomeCampo_fecha_ingreso_empresa_actividad = "fecha_ingreso_empresa_actividad";
    var var_fecha_ingreso_empresa_actividad = scAjaxGetFieldText(nomeCampo_fecha_ingreso_empresa_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecha_ingreso_empresa_actividad = scAjaxGetFieldText(nomeCampo_fecha_ingreso_empresa_actividad);
      x_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad(var_fecha_ingreso_empresa_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad

  function do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha_ingreso_empresa_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad_cb

  // ---------- Validate nombre_empresa_actividad
  function do_ajax_form_maecte_mob_validate_nombre_empresa_actividad()
  {
    var nomeCampo_nombre_empresa_actividad = "nombre_empresa_actividad";
    var var_nombre_empresa_actividad = scAjaxGetFieldText(nomeCampo_nombre_empresa_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nombre_empresa_actividad(var_nombre_empresa_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_nombre_empresa_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_nombre_empresa_actividad

  function do_ajax_form_maecte_mob_validate_nombre_empresa_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_empresa_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nombre_empresa_actividad_cb

  // ---------- Validate institucion_actividad
  function do_ajax_form_maecte_mob_validate_institucion_actividad()
  {
    var nomeCampo_institucion_actividad = "institucion_actividad";
    var var_institucion_actividad = scAjaxGetFieldText(nomeCampo_institucion_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_institucion_actividad(var_institucion_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_institucion_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_institucion_actividad

  function do_ajax_form_maecte_mob_validate_institucion_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "institucion_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_institucion_actividad_cb

  // ---------- Validate ciudad_actividad
  function do_ajax_form_maecte_mob_validate_ciudad_actividad()
  {
    var nomeCampo_ciudad_actividad = "ciudad_actividad";
    var var_ciudad_actividad = scAjaxGetFieldText(nomeCampo_ciudad_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ciudad_actividad(var_ciudad_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_ciudad_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_ciudad_actividad

  function do_ajax_form_maecte_mob_validate_ciudad_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ciudad_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ciudad_actividad_cb

  // ---------- Validate provincia_actividad
  function do_ajax_form_maecte_mob_validate_provincia_actividad()
  {
    var nomeCampo_provincia_actividad = "provincia_actividad";
    var var_provincia_actividad = scAjaxGetFieldText(nomeCampo_provincia_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_provincia_actividad(var_provincia_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_provincia_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_provincia_actividad

  function do_ajax_form_maecte_mob_validate_provincia_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "provincia_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_provincia_actividad_cb

  // ---------- Validate direccion_actividad
  function do_ajax_form_maecte_mob_validate_direccion_actividad()
  {
    var nomeCampo_direccion_actividad = "direccion_actividad";
    var var_direccion_actividad = scAjaxGetFieldText(nomeCampo_direccion_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_direccion_actividad(var_direccion_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_direccion_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_direccion_actividad

  function do_ajax_form_maecte_mob_validate_direccion_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "direccion_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_direccion_actividad_cb

  // ---------- Validate calle_principal_actividad
  function do_ajax_form_maecte_mob_validate_calle_principal_actividad()
  {
    var nomeCampo_calle_principal_actividad = "calle_principal_actividad";
    var var_calle_principal_actividad = scAjaxGetFieldText(nomeCampo_calle_principal_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_principal_actividad(var_calle_principal_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_principal_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_calle_principal_actividad

  function do_ajax_form_maecte_mob_validate_calle_principal_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_principal_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_principal_actividad_cb

  // ---------- Validate no_actividad
  function do_ajax_form_maecte_mob_validate_no_actividad()
  {
    var nomeCampo_no_actividad = "no_actividad";
    var var_no_actividad = scAjaxGetFieldText(nomeCampo_no_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_no_actividad(var_no_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_no_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_no_actividad

  function do_ajax_form_maecte_mob_validate_no_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "no_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_no_actividad_cb

  // ---------- Validate calle_secundaria_actividad
  function do_ajax_form_maecte_mob_validate_calle_secundaria_actividad()
  {
    var nomeCampo_calle_secundaria_actividad = "calle_secundaria_actividad";
    var var_calle_secundaria_actividad = scAjaxGetFieldText(nomeCampo_calle_secundaria_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_secundaria_actividad(var_calle_secundaria_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_secundaria_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_calle_secundaria_actividad

  function do_ajax_form_maecte_mob_validate_calle_secundaria_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_secundaria_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_secundaria_actividad_cb

  // ---------- Validate sector_actividad
  function do_ajax_form_maecte_mob_validate_sector_actividad()
  {
    var nomeCampo_sector_actividad = "sector_actividad";
    var var_sector_actividad = scAjaxGetFieldText(nomeCampo_sector_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sector_actividad(var_sector_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_sector_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_sector_actividad

  function do_ajax_form_maecte_mob_validate_sector_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sector_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sector_actividad_cb

  // ---------- Validate pais_actividad
  function do_ajax_form_maecte_mob_validate_pais_actividad()
  {
    var nomeCampo_pais_actividad = "pais_actividad";
    var var_pais_actividad = scAjaxGetFieldText(nomeCampo_pais_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_pais_actividad(var_pais_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_pais_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_pais_actividad

  function do_ajax_form_maecte_mob_validate_pais_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pais_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_pais_actividad_cb

  // ---------- Validate actividad
  function do_ajax_form_maecte_mob_validate_actividad()
  {
    var nomeCampo_actividad = "actividad";
    var var_actividad = scAjaxGetFieldText(nomeCampo_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_actividad(var_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_actividad

  function do_ajax_form_maecte_mob_validate_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_actividad_cb

  // ---------- Validate telefono_actividad
  function do_ajax_form_maecte_mob_validate_telefono_actividad()
  {
    var nomeCampo_telefono_actividad = "telefono_actividad";
    var var_telefono_actividad = scAjaxGetFieldText(nomeCampo_telefono_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telefono_actividad(var_telefono_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_telefono_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_telefono_actividad

  function do_ajax_form_maecte_mob_validate_telefono_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telefono_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telefono_actividad_cb

  // ---------- Validate cargo_actividad
  function do_ajax_form_maecte_mob_validate_cargo_actividad()
  {
    var nomeCampo_cargo_actividad = "cargo_actividad";
    var var_cargo_actividad = scAjaxGetFieldText(nomeCampo_cargo_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cargo_actividad(var_cargo_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_cargo_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_cargo_actividad

  function do_ajax_form_maecte_mob_validate_cargo_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cargo_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cargo_actividad_cb

  // ---------- Validate ext_actividad
  function do_ajax_form_maecte_mob_validate_ext_actividad()
  {
    var nomeCampo_ext_actividad = "ext_actividad";
    var var_ext_actividad = scAjaxGetFieldText(nomeCampo_ext_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ext_actividad(var_ext_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_ext_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_ext_actividad

  function do_ajax_form_maecte_mob_validate_ext_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ext_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ext_actividad_cb

  // ---------- Validate fecha_ingreso_empresa_actividad2
  function do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad2()
  {
    var nomeCampo_fecha_ingreso_empresa_actividad2 = "fecha_ingreso_empresa_actividad2";
    var var_fecha_ingreso_empresa_actividad2 = scAjaxGetFieldText(nomeCampo_fecha_ingreso_empresa_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecha_ingreso_empresa_actividad2 = scAjaxGetFieldText(nomeCampo_fecha_ingreso_empresa_actividad2);
      x_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad2(var_fecha_ingreso_empresa_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad2_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad2

  function do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha_ingreso_empresa_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecha_ingreso_empresa_actividad2_cb

  // ---------- Validate nombre_empresa_actividad2
  function do_ajax_form_maecte_mob_validate_nombre_empresa_actividad2()
  {
    var nomeCampo_nombre_empresa_actividad2 = "nombre_empresa_actividad2";
    var var_nombre_empresa_actividad2 = scAjaxGetFieldText(nomeCampo_nombre_empresa_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nombre_empresa_actividad2(var_nombre_empresa_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_nombre_empresa_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_nombre_empresa_actividad2

  function do_ajax_form_maecte_mob_validate_nombre_empresa_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_empresa_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nombre_empresa_actividad2_cb

  // ---------- Validate institucion_actividad2
  function do_ajax_form_maecte_mob_validate_institucion_actividad2()
  {
    var nomeCampo_institucion_actividad2 = "institucion_actividad2";
    var var_institucion_actividad2 = scAjaxGetFieldText(nomeCampo_institucion_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_institucion_actividad2(var_institucion_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_institucion_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_institucion_actividad2

  function do_ajax_form_maecte_mob_validate_institucion_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "institucion_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_institucion_actividad2_cb

  // ---------- Validate ciudad_actividad2
  function do_ajax_form_maecte_mob_validate_ciudad_actividad2()
  {
    var nomeCampo_ciudad_actividad2 = "ciudad_actividad2";
    var var_ciudad_actividad2 = scAjaxGetFieldText(nomeCampo_ciudad_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ciudad_actividad2(var_ciudad_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_ciudad_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_ciudad_actividad2

  function do_ajax_form_maecte_mob_validate_ciudad_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ciudad_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ciudad_actividad2_cb

  // ---------- Validate provincia_actividad2
  function do_ajax_form_maecte_mob_validate_provincia_actividad2()
  {
    var nomeCampo_provincia_actividad2 = "provincia_actividad2";
    var var_provincia_actividad2 = scAjaxGetFieldText(nomeCampo_provincia_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_provincia_actividad2(var_provincia_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_provincia_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_provincia_actividad2

  function do_ajax_form_maecte_mob_validate_provincia_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "provincia_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_provincia_actividad2_cb

  // ---------- Validate direccion_actividad2
  function do_ajax_form_maecte_mob_validate_direccion_actividad2()
  {
    var nomeCampo_direccion_actividad2 = "direccion_actividad2";
    var var_direccion_actividad2 = scAjaxGetFieldText(nomeCampo_direccion_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_direccion_actividad2(var_direccion_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_direccion_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_direccion_actividad2

  function do_ajax_form_maecte_mob_validate_direccion_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "direccion_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_direccion_actividad2_cb

  // ---------- Validate calle_principal_actividad2
  function do_ajax_form_maecte_mob_validate_calle_principal_actividad2()
  {
    var nomeCampo_calle_principal_actividad2 = "calle_principal_actividad2";
    var var_calle_principal_actividad2 = scAjaxGetFieldText(nomeCampo_calle_principal_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_principal_actividad2(var_calle_principal_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_principal_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_calle_principal_actividad2

  function do_ajax_form_maecte_mob_validate_calle_principal_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_principal_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_principal_actividad2_cb

  // ---------- Validate no_actividad2
  function do_ajax_form_maecte_mob_validate_no_actividad2()
  {
    var nomeCampo_no_actividad2 = "no_actividad2";
    var var_no_actividad2 = scAjaxGetFieldText(nomeCampo_no_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_no_actividad2(var_no_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_no_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_no_actividad2

  function do_ajax_form_maecte_mob_validate_no_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "no_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_no_actividad2_cb

  // ---------- Validate calle_secundaria_actividad2
  function do_ajax_form_maecte_mob_validate_calle_secundaria_actividad2()
  {
    var nomeCampo_calle_secundaria_actividad2 = "calle_secundaria_actividad2";
    var var_calle_secundaria_actividad2 = scAjaxGetFieldText(nomeCampo_calle_secundaria_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_secundaria_actividad2(var_calle_secundaria_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_secundaria_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_calle_secundaria_actividad2

  function do_ajax_form_maecte_mob_validate_calle_secundaria_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_secundaria_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_secundaria_actividad2_cb

  // ---------- Validate sector_actividad2
  function do_ajax_form_maecte_mob_validate_sector_actividad2()
  {
    var nomeCampo_sector_actividad2 = "sector_actividad2";
    var var_sector_actividad2 = scAjaxGetFieldText(nomeCampo_sector_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sector_actividad2(var_sector_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_sector_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_sector_actividad2

  function do_ajax_form_maecte_mob_validate_sector_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sector_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sector_actividad2_cb

  // ---------- Validate fecha_salida_empresa_actividad2
  function do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad2()
  {
    var nomeCampo_fecha_salida_empresa_actividad2 = "fecha_salida_empresa_actividad2";
    var var_fecha_salida_empresa_actividad2 = scAjaxGetFieldText(nomeCampo_fecha_salida_empresa_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecha_salida_empresa_actividad2 = scAjaxGetFieldText(nomeCampo_fecha_salida_empresa_actividad2);
      x_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad2(var_fecha_salida_empresa_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad2_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad2

  function do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha_salida_empresa_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecha_salida_empresa_actividad2_cb

  // ---------- Validate fecha_inicio_actividad2
  function do_ajax_form_maecte_mob_validate_fecha_inicio_actividad2()
  {
    var nomeCampo_fecha_inicio_actividad2 = "fecha_inicio_actividad2";
    var var_fecha_inicio_actividad2 = scAjaxGetFieldText(nomeCampo_fecha_inicio_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecha_inicio_actividad2 = scAjaxGetFieldText(nomeCampo_fecha_inicio_actividad2);
      x_ajax_form_maecte_mob_validate_fecha_inicio_actividad2(var_fecha_inicio_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_fecha_inicio_actividad2_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecha_inicio_actividad2

  function do_ajax_form_maecte_mob_validate_fecha_inicio_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha_inicio_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecha_inicio_actividad2_cb

  // ---------- Validate actividad2
  function do_ajax_form_maecte_mob_validate_actividad2()
  {
    var nomeCampo_actividad2 = "actividad2";
    var var_actividad2 = scAjaxGetFieldText(nomeCampo_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_actividad2(var_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_actividad2

  function do_ajax_form_maecte_mob_validate_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_actividad2_cb

  // ---------- Validate telefono_actividad2
  function do_ajax_form_maecte_mob_validate_telefono_actividad2()
  {
    var nomeCampo_telefono_actividad2 = "telefono_actividad2";
    var var_telefono_actividad2 = scAjaxGetFieldText(nomeCampo_telefono_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telefono_actividad2(var_telefono_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_telefono_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_telefono_actividad2

  function do_ajax_form_maecte_mob_validate_telefono_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telefono_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telefono_actividad2_cb

  // ---------- Validate ext_actividad2
  function do_ajax_form_maecte_mob_validate_ext_actividad2()
  {
    var nomeCampo_ext_actividad2 = "ext_actividad2";
    var var_ext_actividad2 = scAjaxGetFieldText(nomeCampo_ext_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ext_actividad2(var_ext_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_ext_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_ext_actividad2

  function do_ajax_form_maecte_mob_validate_ext_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ext_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ext_actividad2_cb

  // ---------- Validate cargo_actividad2
  function do_ajax_form_maecte_mob_validate_cargo_actividad2()
  {
    var nomeCampo_cargo_actividad2 = "cargo_actividad2";
    var var_cargo_actividad2 = scAjaxGetFieldText(nomeCampo_cargo_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cargo_actividad2(var_cargo_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_cargo_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_cargo_actividad2

  function do_ajax_form_maecte_mob_validate_cargo_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cargo_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cargo_actividad2_cb

  // ---------- Validate id_tipo_contrato_actividad2
  function do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad2()
  {
    var nomeCampo_id_tipo_contrato_actividad2 = "id_tipo_contrato_actividad2";
    var var_id_tipo_contrato_actividad2 = scAjaxGetFieldText(nomeCampo_id_tipo_contrato_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad2(var_id_tipo_contrato_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad2

  function do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_tipo_contrato_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_tipo_contrato_actividad2_cb

  // ---------- Validate empresa_jubilo_actividad2
  function do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad2()
  {
    var nomeCampo_empresa_jubilo_actividad2 = "empresa_jubilo_actividad2";
    var var_empresa_jubilo_actividad2 = scAjaxGetFieldText(nomeCampo_empresa_jubilo_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_empresa_jubilo_actividad2(var_empresa_jubilo_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad2

  function do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "empresa_jubilo_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_empresa_jubilo_actividad2_cb

  // ---------- Validate sueldo
  function do_ajax_form_maecte_mob_validate_sueldo()
  {
    var nomeCampo_sueldo = "sueldo";
    var var_sueldo = scAjaxGetFieldText(nomeCampo_sueldo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sueldo(var_sueldo, var_script_case_init, do_ajax_form_maecte_mob_validate_sueldo_cb);
  } // do_ajax_form_maecte_mob_validate_sueldo

  function do_ajax_form_maecte_mob_validate_sueldo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sueldo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sueldo_cb

  // ---------- Validate arriendos
  function do_ajax_form_maecte_mob_validate_arriendos()
  {
    var nomeCampo_arriendos = "arriendos";
    var var_arriendos = scAjaxGetFieldText(nomeCampo_arriendos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_arriendos(var_arriendos, var_script_case_init, do_ajax_form_maecte_mob_validate_arriendos_cb);
  } // do_ajax_form_maecte_mob_validate_arriendos

  function do_ajax_form_maecte_mob_validate_arriendos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "arriendos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_arriendos_cb

  // ---------- Validate dividendo_utilidades_ultimo_ano
  function do_ajax_form_maecte_mob_validate_dividendo_utilidades_ultimo_ano()
  {
    var nomeCampo_dividendo_utilidades_ultimo_ano = "dividendo_utilidades_ultimo_ano";
    var var_dividendo_utilidades_ultimo_ano = scAjaxGetFieldText(nomeCampo_dividendo_utilidades_ultimo_ano);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_dividendo_utilidades_ultimo_ano(var_dividendo_utilidades_ultimo_ano, var_script_case_init, do_ajax_form_maecte_mob_validate_dividendo_utilidades_ultimo_ano_cb);
  } // do_ajax_form_maecte_mob_validate_dividendo_utilidades_ultimo_ano

  function do_ajax_form_maecte_mob_validate_dividendo_utilidades_ultimo_ano_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "dividendo_utilidades_ultimo_ano";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_dividendo_utilidades_ultimo_ano_cb

  // ---------- Validate id_otros_ingresos
  function do_ajax_form_maecte_mob_validate_id_otros_ingresos()
  {
    var nomeCampo_id_otros_ingresos = "id_otros_ingresos";
    var var_id_otros_ingresos = scAjaxGetFieldText(nomeCampo_id_otros_ingresos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_otros_ingresos(var_id_otros_ingresos, var_script_case_init, do_ajax_form_maecte_mob_validate_id_otros_ingresos_cb);
  } // do_ajax_form_maecte_mob_validate_id_otros_ingresos

  function do_ajax_form_maecte_mob_validate_id_otros_ingresos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_otros_ingresos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_otros_ingresos_cb

  // ---------- Validate arriendo_hipoteca
  function do_ajax_form_maecte_mob_validate_arriendo_hipoteca()
  {
    var nomeCampo_arriendo_hipoteca = "arriendo_hipoteca";
    var var_arriendo_hipoteca = scAjaxGetFieldText(nomeCampo_arriendo_hipoteca);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_arriendo_hipoteca(var_arriendo_hipoteca, var_script_case_init, do_ajax_form_maecte_mob_validate_arriendo_hipoteca_cb);
  } // do_ajax_form_maecte_mob_validate_arriendo_hipoteca

  function do_ajax_form_maecte_mob_validate_arriendo_hipoteca_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "arriendo_hipoteca";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_arriendo_hipoteca_cb

  // ---------- Validate prestamos
  function do_ajax_form_maecte_mob_validate_prestamos()
  {
    var nomeCampo_prestamos = "prestamos";
    var var_prestamos = scAjaxGetFieldText(nomeCampo_prestamos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_prestamos(var_prestamos, var_script_case_init, do_ajax_form_maecte_mob_validate_prestamos_cb);
  } // do_ajax_form_maecte_mob_validate_prestamos

  function do_ajax_form_maecte_mob_validate_prestamos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "prestamos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_prestamos_cb

  // ---------- Validate tarjetas_creditos
  function do_ajax_form_maecte_mob_validate_tarjetas_creditos()
  {
    var nomeCampo_tarjetas_creditos = "tarjetas_creditos";
    var var_tarjetas_creditos = scAjaxGetFieldText(nomeCampo_tarjetas_creditos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_tarjetas_creditos(var_tarjetas_creditos, var_script_case_init, do_ajax_form_maecte_mob_validate_tarjetas_creditos_cb);
  } // do_ajax_form_maecte_mob_validate_tarjetas_creditos

  function do_ajax_form_maecte_mob_validate_tarjetas_creditos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tarjetas_creditos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_tarjetas_creditos_cb

  // ---------- Validate gastos_familiares
  function do_ajax_form_maecte_mob_validate_gastos_familiares()
  {
    var nomeCampo_gastos_familiares = "gastos_familiares";
    var var_gastos_familiares = scAjaxGetFieldText(nomeCampo_gastos_familiares);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_gastos_familiares(var_gastos_familiares, var_script_case_init, do_ajax_form_maecte_mob_validate_gastos_familiares_cb);
  } // do_ajax_form_maecte_mob_validate_gastos_familiares

  function do_ajax_form_maecte_mob_validate_gastos_familiares_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "gastos_familiares";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_gastos_familiares_cb

  // ---------- Validate id_otros_gastos
  function do_ajax_form_maecte_mob_validate_id_otros_gastos()
  {
    var nomeCampo_id_otros_gastos = "id_otros_gastos";
    var var_id_otros_gastos = scAjaxGetFieldText(nomeCampo_id_otros_gastos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_otros_gastos(var_id_otros_gastos, var_script_case_init, do_ajax_form_maecte_mob_validate_id_otros_gastos_cb);
  } // do_ajax_form_maecte_mob_validate_id_otros_gastos

  function do_ajax_form_maecte_mob_validate_id_otros_gastos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_otros_gastos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_otros_gastos_cb

  // ---------- Validate depositos_bancos
  function do_ajax_form_maecte_mob_validate_depositos_bancos()
  {
    var nomeCampo_depositos_bancos = "depositos_bancos";
    var var_depositos_bancos = scAjaxGetFieldText(nomeCampo_depositos_bancos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_depositos_bancos(var_depositos_bancos, var_script_case_init, do_ajax_form_maecte_mob_validate_depositos_bancos_cb);
  } // do_ajax_form_maecte_mob_validate_depositos_bancos

  function do_ajax_form_maecte_mob_validate_depositos_bancos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "depositos_bancos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_depositos_bancos_cb

  // ---------- Validate cuentas_documentos
  function do_ajax_form_maecte_mob_validate_cuentas_documentos()
  {
    var nomeCampo_cuentas_documentos = "cuentas_documentos";
    var var_cuentas_documentos = scAjaxGetFieldText(nomeCampo_cuentas_documentos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cuentas_documentos(var_cuentas_documentos, var_script_case_init, do_ajax_form_maecte_mob_validate_cuentas_documentos_cb);
  } // do_ajax_form_maecte_mob_validate_cuentas_documentos

  function do_ajax_form_maecte_mob_validate_cuentas_documentos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cuentas_documentos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cuentas_documentos_cb

  // ---------- Validate mercaderias
  function do_ajax_form_maecte_mob_validate_mercaderias()
  {
    var nomeCampo_mercaderias = "mercaderias";
    var var_mercaderias = scAjaxGetFieldText(nomeCampo_mercaderias);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_mercaderias(var_mercaderias, var_script_case_init, do_ajax_form_maecte_mob_validate_mercaderias_cb);
  } // do_ajax_form_maecte_mob_validate_mercaderias

  function do_ajax_form_maecte_mob_validate_mercaderias_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "mercaderias";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_mercaderias_cb

  // ---------- Validate maquinarias_vehiculos
  function do_ajax_form_maecte_mob_validate_maquinarias_vehiculos()
  {
    var nomeCampo_maquinarias_vehiculos = "maquinarias_vehiculos";
    var var_maquinarias_vehiculos = scAjaxGetFieldText(nomeCampo_maquinarias_vehiculos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_maquinarias_vehiculos(var_maquinarias_vehiculos, var_script_case_init, do_ajax_form_maecte_mob_validate_maquinarias_vehiculos_cb);
  } // do_ajax_form_maecte_mob_validate_maquinarias_vehiculos

  function do_ajax_form_maecte_mob_validate_maquinarias_vehiculos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "maquinarias_vehiculos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_maquinarias_vehiculos_cb

  // ---------- Validate terrenos_edificios
  function do_ajax_form_maecte_mob_validate_terrenos_edificios()
  {
    var nomeCampo_terrenos_edificios = "terrenos_edificios";
    var var_terrenos_edificios = scAjaxGetFieldText(nomeCampo_terrenos_edificios);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_terrenos_edificios(var_terrenos_edificios, var_script_case_init, do_ajax_form_maecte_mob_validate_terrenos_edificios_cb);
  } // do_ajax_form_maecte_mob_validate_terrenos_edificios

  function do_ajax_form_maecte_mob_validate_terrenos_edificios_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "terrenos_edificios";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_terrenos_edificios_cb

  // ---------- Validate acciones_bonos_cedulas
  function do_ajax_form_maecte_mob_validate_acciones_bonos_cedulas()
  {
    var nomeCampo_acciones_bonos_cedulas = "acciones_bonos_cedulas";
    var var_acciones_bonos_cedulas = scAjaxGetFieldText(nomeCampo_acciones_bonos_cedulas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_acciones_bonos_cedulas(var_acciones_bonos_cedulas, var_script_case_init, do_ajax_form_maecte_mob_validate_acciones_bonos_cedulas_cb);
  } // do_ajax_form_maecte_mob_validate_acciones_bonos_cedulas

  function do_ajax_form_maecte_mob_validate_acciones_bonos_cedulas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "acciones_bonos_cedulas";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_acciones_bonos_cedulas_cb

  // ---------- Validate id_otros_activos
  function do_ajax_form_maecte_mob_validate_id_otros_activos()
  {
    var nomeCampo_id_otros_activos = "id_otros_activos";
    var var_id_otros_activos = scAjaxGetFieldText(nomeCampo_id_otros_activos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_otros_activos(var_id_otros_activos, var_script_case_init, do_ajax_form_maecte_mob_validate_id_otros_activos_cb);
  } // do_ajax_form_maecte_mob_validate_id_otros_activos

  function do_ajax_form_maecte_mob_validate_id_otros_activos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_otros_activos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_otros_activos_cb

  // ---------- Validate cuentas_por_pagar
  function do_ajax_form_maecte_mob_validate_cuentas_por_pagar()
  {
    var nomeCampo_cuentas_por_pagar = "cuentas_por_pagar";
    var var_cuentas_por_pagar = scAjaxGetFieldText(nomeCampo_cuentas_por_pagar);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cuentas_por_pagar(var_cuentas_por_pagar, var_script_case_init, do_ajax_form_maecte_mob_validate_cuentas_por_pagar_cb);
  } // do_ajax_form_maecte_mob_validate_cuentas_por_pagar

  function do_ajax_form_maecte_mob_validate_cuentas_por_pagar_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cuentas_por_pagar";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cuentas_por_pagar_cb

  // ---------- Validate prestamos_banco_menos_ano
  function do_ajax_form_maecte_mob_validate_prestamos_banco_menos_ano()
  {
    var nomeCampo_prestamos_banco_menos_ano = "prestamos_banco_menos_ano";
    var var_prestamos_banco_menos_ano = scAjaxGetFieldText(nomeCampo_prestamos_banco_menos_ano);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_prestamos_banco_menos_ano(var_prestamos_banco_menos_ano, var_script_case_init, do_ajax_form_maecte_mob_validate_prestamos_banco_menos_ano_cb);
  } // do_ajax_form_maecte_mob_validate_prestamos_banco_menos_ano

  function do_ajax_form_maecte_mob_validate_prestamos_banco_menos_ano_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "prestamos_banco_menos_ano";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_prestamos_banco_menos_ano_cb

  // ---------- Validate prestamos_banco_mas_ano
  function do_ajax_form_maecte_mob_validate_prestamos_banco_mas_ano()
  {
    var nomeCampo_prestamos_banco_mas_ano = "prestamos_banco_mas_ano";
    var var_prestamos_banco_mas_ano = scAjaxGetFieldText(nomeCampo_prestamos_banco_mas_ano);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_prestamos_banco_mas_ano(var_prestamos_banco_mas_ano, var_script_case_init, do_ajax_form_maecte_mob_validate_prestamos_banco_mas_ano_cb);
  } // do_ajax_form_maecte_mob_validate_prestamos_banco_mas_ano

  function do_ajax_form_maecte_mob_validate_prestamos_banco_mas_ano_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "prestamos_banco_mas_ano";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_prestamos_banco_mas_ano_cb

  // ---------- Validate deudas_tarjetas_creditos
  function do_ajax_form_maecte_mob_validate_deudas_tarjetas_creditos()
  {
    var nomeCampo_deudas_tarjetas_creditos = "deudas_tarjetas_creditos";
    var var_deudas_tarjetas_creditos = scAjaxGetFieldText(nomeCampo_deudas_tarjetas_creditos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_deudas_tarjetas_creditos(var_deudas_tarjetas_creditos, var_script_case_init, do_ajax_form_maecte_mob_validate_deudas_tarjetas_creditos_cb);
  } // do_ajax_form_maecte_mob_validate_deudas_tarjetas_creditos

  function do_ajax_form_maecte_mob_validate_deudas_tarjetas_creditos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "deudas_tarjetas_creditos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_deudas_tarjetas_creditos_cb

  // ---------- Validate id_otras_obligaciones
  function do_ajax_form_maecte_mob_validate_id_otras_obligaciones()
  {
    var nomeCampo_id_otras_obligaciones = "id_otras_obligaciones";
    var var_id_otras_obligaciones = scAjaxGetFieldText(nomeCampo_id_otras_obligaciones);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_otras_obligaciones(var_id_otras_obligaciones, var_script_case_init, do_ajax_form_maecte_mob_validate_id_otras_obligaciones_cb);
  } // do_ajax_form_maecte_mob_validate_id_otras_obligaciones

  function do_ajax_form_maecte_mob_validate_id_otras_obligaciones_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_otras_obligaciones";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_otras_obligaciones_cb

  // ---------- Validate deudor
  function do_ajax_form_maecte_mob_validate_deudor()
  {
    var nomeCampo_deudor = "deudor";
    var var_deudor = scAjaxGetFieldText(nomeCampo_deudor);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_deudor(var_deudor, var_script_case_init, do_ajax_form_maecte_mob_validate_deudor_cb);
  } // do_ajax_form_maecte_mob_validate_deudor

  function do_ajax_form_maecte_mob_validate_deudor_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "deudor";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_deudor_cb

  // ---------- Validate monto
  function do_ajax_form_maecte_mob_validate_monto()
  {
    var nomeCampo_monto = "monto";
    var var_monto = scAjaxGetFieldText(nomeCampo_monto);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_monto(var_monto, var_script_case_init, do_ajax_form_maecte_mob_validate_monto_cb);
  } // do_ajax_form_maecte_mob_validate_monto

  function do_ajax_form_maecte_mob_validate_monto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "monto";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_monto_cb

  // ---------- Validate descripcion
  function do_ajax_form_maecte_mob_validate_descripcion()
  {
    var nomeCampo_descripcion = "descripcion";
    var var_descripcion = scAjaxGetFieldText(nomeCampo_descripcion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_descripcion(var_descripcion, var_script_case_init, do_ajax_form_maecte_mob_validate_descripcion_cb);
  } // do_ajax_form_maecte_mob_validate_descripcion

  function do_ajax_form_maecte_mob_validate_descripcion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "descripcion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_descripcion_cb

  // ---------- Validate placa
  function do_ajax_form_maecte_mob_validate_placa()
  {
    var nomeCampo_placa = "placa";
    var var_placa = scAjaxGetFieldText(nomeCampo_placa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_placa(var_placa, var_script_case_init, do_ajax_form_maecte_mob_validate_placa_cb);
  } // do_ajax_form_maecte_mob_validate_placa

  function do_ajax_form_maecte_mob_validate_placa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "placa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_placa_cb

  // ---------- Validate valor_maquinaria_vehiculo
  function do_ajax_form_maecte_mob_validate_valor_maquinaria_vehiculo()
  {
    var nomeCampo_valor_maquinaria_vehiculo = "valor_maquinaria_vehiculo";
    var var_valor_maquinaria_vehiculo = scAjaxGetFieldText(nomeCampo_valor_maquinaria_vehiculo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_valor_maquinaria_vehiculo(var_valor_maquinaria_vehiculo, var_script_case_init, do_ajax_form_maecte_mob_validate_valor_maquinaria_vehiculo_cb);
  } // do_ajax_form_maecte_mob_validate_valor_maquinaria_vehiculo

  function do_ajax_form_maecte_mob_validate_valor_maquinaria_vehiculo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valor_maquinaria_vehiculo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_valor_maquinaria_vehiculo_cb

  // ---------- Validate a_nombre_de
  function do_ajax_form_maecte_mob_validate_a_nombre_de()
  {
    var nomeCampo_a_nombre_de = "a_nombre_de";
    var var_a_nombre_de = scAjaxGetFieldText(nomeCampo_a_nombre_de);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_a_nombre_de(var_a_nombre_de, var_script_case_init, do_ajax_form_maecte_mob_validate_a_nombre_de_cb);
  } // do_ajax_form_maecte_mob_validate_a_nombre_de

  function do_ajax_form_maecte_mob_validate_a_nombre_de_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "a_nombre_de";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_a_nombre_de_cb

  // ---------- Validate ubicacion
  function do_ajax_form_maecte_mob_validate_ubicacion()
  {
    var nomeCampo_ubicacion = "ubicacion";
    var var_ubicacion = scAjaxGetFieldText(nomeCampo_ubicacion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ubicacion(var_ubicacion, var_script_case_init, do_ajax_form_maecte_mob_validate_ubicacion_cb);
  } // do_ajax_form_maecte_mob_validate_ubicacion

  function do_ajax_form_maecte_mob_validate_ubicacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ubicacion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ubicacion_cb

  // ---------- Validate valor_propiedad
  function do_ajax_form_maecte_mob_validate_valor_propiedad()
  {
    var nomeCampo_valor_propiedad = "valor_propiedad";
    var var_valor_propiedad = scAjaxGetFieldText(nomeCampo_valor_propiedad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_valor_propiedad(var_valor_propiedad, var_script_case_init, do_ajax_form_maecte_mob_validate_valor_propiedad_cb);
  } // do_ajax_form_maecte_mob_validate_valor_propiedad

  function do_ajax_form_maecte_mob_validate_valor_propiedad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valor_propiedad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_valor_propiedad_cb

  // ---------- Validate empresa
  function do_ajax_form_maecte_mob_validate_empresa()
  {
    var nomeCampo_empresa = "empresa";
    var var_empresa = scAjaxGetFieldText(nomeCampo_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_empresa(var_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_empresa

  function do_ajax_form_maecte_mob_validate_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_empresa_cb

  // ---------- Validate valor_mercado
  function do_ajax_form_maecte_mob_validate_valor_mercado()
  {
    var nomeCampo_valor_mercado = "valor_mercado";
    var var_valor_mercado = scAjaxGetFieldText(nomeCampo_valor_mercado);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_valor_mercado(var_valor_mercado, var_script_case_init, do_ajax_form_maecte_mob_validate_valor_mercado_cb);
  } // do_ajax_form_maecte_mob_validate_valor_mercado

  function do_ajax_form_maecte_mob_validate_valor_mercado_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "valor_mercado";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_valor_mercado_cb

  // ---------- Validate institucion_bancaria
  function do_ajax_form_maecte_mob_validate_institucion_bancaria()
  {
    var nomeCampo_institucion_bancaria = "institucion_bancaria";
    var var_institucion_bancaria = scAjaxGetFieldText(nomeCampo_institucion_bancaria);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_institucion_bancaria(var_institucion_bancaria, var_script_case_init, do_ajax_form_maecte_mob_validate_institucion_bancaria_cb);
  } // do_ajax_form_maecte_mob_validate_institucion_bancaria

  function do_ajax_form_maecte_mob_validate_institucion_bancaria_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "institucion_bancaria";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_institucion_bancaria_cb

  // ---------- Validate monto_banco
  function do_ajax_form_maecte_mob_validate_monto_banco()
  {
    var nomeCampo_monto_banco = "monto_banco";
    var var_monto_banco = scAjaxGetFieldText(nomeCampo_monto_banco);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_monto_banco(var_monto_banco, var_script_case_init, do_ajax_form_maecte_mob_validate_monto_banco_cb);
  } // do_ajax_form_maecte_mob_validate_monto_banco

  function do_ajax_form_maecte_mob_validate_monto_banco_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "monto_banco";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_monto_banco_cb

  // ---------- Validate institucion_finaciera
  function do_ajax_form_maecte_mob_validate_institucion_finaciera()
  {
    var nomeCampo_institucion_finaciera = "institucion_finaciera";
    var var_institucion_finaciera = scAjaxGetFieldText(nomeCampo_institucion_finaciera);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_institucion_finaciera(var_institucion_finaciera, var_script_case_init, do_ajax_form_maecte_mob_validate_institucion_finaciera_cb);
  } // do_ajax_form_maecte_mob_validate_institucion_finaciera

  function do_ajax_form_maecte_mob_validate_institucion_finaciera_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "institucion_finaciera";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_institucion_finaciera_cb

  // ---------- Validate monto_institucion_finaciera
  function do_ajax_form_maecte_mob_validate_monto_institucion_finaciera()
  {
    var nomeCampo_monto_institucion_finaciera = "monto_institucion_finaciera";
    var var_monto_institucion_finaciera = scAjaxGetFieldText(nomeCampo_monto_institucion_finaciera);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_monto_institucion_finaciera(var_monto_institucion_finaciera, var_script_case_init, do_ajax_form_maecte_mob_validate_monto_institucion_finaciera_cb);
  } // do_ajax_form_maecte_mob_validate_monto_institucion_finaciera

  function do_ajax_form_maecte_mob_validate_monto_institucion_finaciera_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "monto_institucion_finaciera";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_monto_institucion_finaciera_cb

  // ---------- Validate id_cliente_juridico
  function do_ajax_form_maecte_mob_validate_id_cliente_juridico()
  {
    var nomeCampo_id_cliente_juridico = "id_cliente_juridico";
    var var_id_cliente_juridico = scAjaxGetFieldText(nomeCampo_id_cliente_juridico);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_cliente_juridico(var_id_cliente_juridico, var_script_case_init, do_ajax_form_maecte_mob_validate_id_cliente_juridico_cb);
  } // do_ajax_form_maecte_mob_validate_id_cliente_juridico

  function do_ajax_form_maecte_mob_validate_id_cliente_juridico_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_cliente_juridico";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_cliente_juridico_cb

  // ---------- Validate nombre_completo_empresa
  function do_ajax_form_maecte_mob_validate_nombre_completo_empresa()
  {
    var nomeCampo_nombre_completo_empresa = "nombre_completo_empresa";
    var var_nombre_completo_empresa = scAjaxGetFieldText(nomeCampo_nombre_completo_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nombre_completo_empresa(var_nombre_completo_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_nombre_completo_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_nombre_completo_empresa

  function do_ajax_form_maecte_mob_validate_nombre_completo_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_completo_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nombre_completo_empresa_cb

  // ---------- Validate es_empresa_extranjera
  function do_ajax_form_maecte_mob_validate_es_empresa_extranjera()
  {
    var nomeCampo_es_empresa_extranjera = "es_empresa_extranjera";
    var var_es_empresa_extranjera = scAjaxGetFieldText(nomeCampo_es_empresa_extranjera);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_es_empresa_extranjera(var_es_empresa_extranjera, var_script_case_init, do_ajax_form_maecte_mob_validate_es_empresa_extranjera_cb);
  } // do_ajax_form_maecte_mob_validate_es_empresa_extranjera

  function do_ajax_form_maecte_mob_validate_es_empresa_extranjera_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "es_empresa_extranjera";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_es_empresa_extranjera_cb

  // ---------- Validate pais_empresa
  function do_ajax_form_maecte_mob_validate_pais_empresa()
  {
    var nomeCampo_pais_empresa = "pais_empresa";
    var var_pais_empresa = scAjaxGetFieldText(nomeCampo_pais_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_pais_empresa(var_pais_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_pais_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_pais_empresa

  function do_ajax_form_maecte_mob_validate_pais_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pais_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_pais_empresa_cb

  // ---------- Validate fecha_constitucion_empresa
  function do_ajax_form_maecte_mob_validate_fecha_constitucion_empresa()
  {
    var nomeCampo_fecha_constitucion_empresa = "fecha_constitucion_empresa";
    var var_fecha_constitucion_empresa = scAjaxGetFieldText(nomeCampo_fecha_constitucion_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecha_constitucion_empresa = scAjaxGetFieldText(nomeCampo_fecha_constitucion_empresa);
      x_ajax_form_maecte_mob_validate_fecha_constitucion_empresa(var_fecha_constitucion_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_fecha_constitucion_empresa_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecha_constitucion_empresa

  function do_ajax_form_maecte_mob_validate_fecha_constitucion_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha_constitucion_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecha_constitucion_empresa_cb

  // ---------- Validate id_oficina
  function do_ajax_form_maecte_mob_validate_id_oficina()
  {
    var nomeCampo_id_oficina = "id_oficina";
    var var_id_oficina = scAjaxGetFieldText(nomeCampo_id_oficina);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_oficina(var_id_oficina, var_script_case_init, do_ajax_form_maecte_mob_validate_id_oficina_cb);
  } // do_ajax_form_maecte_mob_validate_id_oficina

  function do_ajax_form_maecte_mob_validate_id_oficina_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_oficina";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_oficina_cb

  // ---------- Validate id_tipo_actividad
  function do_ajax_form_maecte_mob_validate_id_tipo_actividad()
  {
    var nomeCampo_id_tipo_actividad = "id_tipo_actividad";
    var var_id_tipo_actividad = scAjaxGetFieldText(nomeCampo_id_tipo_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_tipo_actividad(var_id_tipo_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_id_tipo_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_id_tipo_actividad

  function do_ajax_form_maecte_mob_validate_id_tipo_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_tipo_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_tipo_actividad_cb

  // ---------- Validate especifique_otros
  function do_ajax_form_maecte_mob_validate_especifique_otros()
  {
    var nomeCampo_especifique_otros = "especifique_otros";
    var var_especifique_otros = scAjaxGetFieldText(nomeCampo_especifique_otros);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_especifique_otros(var_especifique_otros, var_script_case_init, do_ajax_form_maecte_mob_validate_especifique_otros_cb);
  } // do_ajax_form_maecte_mob_validate_especifique_otros

  function do_ajax_form_maecte_mob_validate_especifique_otros_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "especifique_otros";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_especifique_otros_cb

  // ---------- Validate direccion_correspondencia
  function do_ajax_form_maecte_mob_validate_direccion_correspondencia()
  {
    var nomeCampo_direccion_correspondencia = "direccion_correspondencia";
    var var_direccion_correspondencia = scAjaxGetFieldText(nomeCampo_direccion_correspondencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_direccion_correspondencia(var_direccion_correspondencia, var_script_case_init, do_ajax_form_maecte_mob_validate_direccion_correspondencia_cb);
  } // do_ajax_form_maecte_mob_validate_direccion_correspondencia

  function do_ajax_form_maecte_mob_validate_direccion_correspondencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "direccion_correspondencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_direccion_correspondencia_cb

  // ---------- Validate calle_principal_correspondencia
  function do_ajax_form_maecte_mob_validate_calle_principal_correspondencia()
  {
    var nomeCampo_calle_principal_correspondencia = "calle_principal_correspondencia";
    var var_calle_principal_correspondencia = scAjaxGetFieldText(nomeCampo_calle_principal_correspondencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_principal_correspondencia(var_calle_principal_correspondencia, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_principal_correspondencia_cb);
  } // do_ajax_form_maecte_mob_validate_calle_principal_correspondencia

  function do_ajax_form_maecte_mob_validate_calle_principal_correspondencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_principal_correspondencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_principal_correspondencia_cb

  // ---------- Validate no_correspondencia
  function do_ajax_form_maecte_mob_validate_no_correspondencia()
  {
    var nomeCampo_no_correspondencia = "no_correspondencia";
    var var_no_correspondencia = scAjaxGetFieldText(nomeCampo_no_correspondencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_no_correspondencia(var_no_correspondencia, var_script_case_init, do_ajax_form_maecte_mob_validate_no_correspondencia_cb);
  } // do_ajax_form_maecte_mob_validate_no_correspondencia

  function do_ajax_form_maecte_mob_validate_no_correspondencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "no_correspondencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_no_correspondencia_cb

  // ---------- Validate calle_secundaria_correspondencia
  function do_ajax_form_maecte_mob_validate_calle_secundaria_correspondencia()
  {
    var nomeCampo_calle_secundaria_correspondencia = "calle_secundaria_correspondencia";
    var var_calle_secundaria_correspondencia = scAjaxGetFieldText(nomeCampo_calle_secundaria_correspondencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_calle_secundaria_correspondencia(var_calle_secundaria_correspondencia, var_script_case_init, do_ajax_form_maecte_mob_validate_calle_secundaria_correspondencia_cb);
  } // do_ajax_form_maecte_mob_validate_calle_secundaria_correspondencia

  function do_ajax_form_maecte_mob_validate_calle_secundaria_correspondencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "calle_secundaria_correspondencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_calle_secundaria_correspondencia_cb

  // ---------- Validate id_ciudad_correspondencia
  function do_ajax_form_maecte_mob_validate_id_ciudad_correspondencia()
  {
    var nomeCampo_id_ciudad_correspondencia = "id_ciudad_correspondencia";
    var var_id_ciudad_correspondencia = scAjaxGetFieldText(nomeCampo_id_ciudad_correspondencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_ciudad_correspondencia(var_id_ciudad_correspondencia, var_script_case_init, do_ajax_form_maecte_mob_validate_id_ciudad_correspondencia_cb);
  } // do_ajax_form_maecte_mob_validate_id_ciudad_correspondencia

  function do_ajax_form_maecte_mob_validate_id_ciudad_correspondencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_ciudad_correspondencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_ciudad_correspondencia_cb

  // ---------- Validate nombre_empresa_solicitante
  function do_ajax_form_maecte_mob_validate_nombre_empresa_solicitante()
  {
    var nomeCampo_nombre_empresa_solicitante = "nombre_empresa_solicitante";
    var var_nombre_empresa_solicitante = scAjaxGetFieldText(nomeCampo_nombre_empresa_solicitante);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nombre_empresa_solicitante(var_nombre_empresa_solicitante, var_script_case_init, do_ajax_form_maecte_mob_validate_nombre_empresa_solicitante_cb);
  } // do_ajax_form_maecte_mob_validate_nombre_empresa_solicitante

  function do_ajax_form_maecte_mob_validate_nombre_empresa_solicitante_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_empresa_solicitante";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nombre_empresa_solicitante_cb

  // ---------- Validate cargo_empresa_solicitante
  function do_ajax_form_maecte_mob_validate_cargo_empresa_solicitante()
  {
    var nomeCampo_cargo_empresa_solicitante = "cargo_empresa_solicitante";
    var var_cargo_empresa_solicitante = scAjaxGetFieldText(nomeCampo_cargo_empresa_solicitante);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cargo_empresa_solicitante(var_cargo_empresa_solicitante, var_script_case_init, do_ajax_form_maecte_mob_validate_cargo_empresa_solicitante_cb);
  } // do_ajax_form_maecte_mob_validate_cargo_empresa_solicitante

  function do_ajax_form_maecte_mob_validate_cargo_empresa_solicitante_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cargo_empresa_solicitante";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cargo_empresa_solicitante_cb

  // ---------- Validate celular_empresa_solicitante
  function do_ajax_form_maecte_mob_validate_celular_empresa_solicitante()
  {
    var nomeCampo_celular_empresa_solicitante = "celular_empresa_solicitante";
    var var_celular_empresa_solicitante = scAjaxGetFieldText(nomeCampo_celular_empresa_solicitante);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_celular_empresa_solicitante(var_celular_empresa_solicitante, var_script_case_init, do_ajax_form_maecte_mob_validate_celular_empresa_solicitante_cb);
  } // do_ajax_form_maecte_mob_validate_celular_empresa_solicitante

  function do_ajax_form_maecte_mob_validate_celular_empresa_solicitante_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "celular_empresa_solicitante";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_celular_empresa_solicitante_cb

  // ---------- Validate telefono_empresa_solicitante
  function do_ajax_form_maecte_mob_validate_telefono_empresa_solicitante()
  {
    var nomeCampo_telefono_empresa_solicitante = "telefono_empresa_solicitante";
    var var_telefono_empresa_solicitante = scAjaxGetFieldText(nomeCampo_telefono_empresa_solicitante);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telefono_empresa_solicitante(var_telefono_empresa_solicitante, var_script_case_init, do_ajax_form_maecte_mob_validate_telefono_empresa_solicitante_cb);
  } // do_ajax_form_maecte_mob_validate_telefono_empresa_solicitante

  function do_ajax_form_maecte_mob_validate_telefono_empresa_solicitante_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telefono_empresa_solicitante";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telefono_empresa_solicitante_cb

  // ---------- Validate mail_empresa_solicitante
  function do_ajax_form_maecte_mob_validate_mail_empresa_solicitante()
  {
    var nomeCampo_mail_empresa_solicitante = "mail_empresa_solicitante";
    var var_mail_empresa_solicitante = scAjaxGetFieldText(nomeCampo_mail_empresa_solicitante);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_mail_empresa_solicitante(var_mail_empresa_solicitante, var_script_case_init, do_ajax_form_maecte_mob_validate_mail_empresa_solicitante_cb);
  } // do_ajax_form_maecte_mob_validate_mail_empresa_solicitante

  function do_ajax_form_maecte_mob_validate_mail_empresa_solicitante_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "mail_empresa_solicitante";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_mail_empresa_solicitante_cb

  // ---------- Validate saldo_empresa_solicitante
  function do_ajax_form_maecte_mob_validate_saldo_empresa_solicitante()
  {
    var nomeCampo_saldo_empresa_solicitante = "saldo_empresa_solicitante";
    var var_saldo_empresa_solicitante = scAjaxGetFieldText(nomeCampo_saldo_empresa_solicitante);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_saldo_empresa_solicitante(var_saldo_empresa_solicitante, var_script_case_init, do_ajax_form_maecte_mob_validate_saldo_empresa_solicitante_cb);
  } // do_ajax_form_maecte_mob_validate_saldo_empresa_solicitante

  function do_ajax_form_maecte_mob_validate_saldo_empresa_solicitante_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "saldo_empresa_solicitante";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_saldo_empresa_solicitante_cb

  // ---------- Validate nombre_referencia_comerciales
  function do_ajax_form_maecte_mob_validate_nombre_referencia_comerciales()
  {
    var nomeCampo_nombre_referencia_comerciales = "nombre_referencia_comerciales";
    var var_nombre_referencia_comerciales = scAjaxGetFieldText(nomeCampo_nombre_referencia_comerciales);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_nombre_referencia_comerciales(var_nombre_referencia_comerciales, var_script_case_init, do_ajax_form_maecte_mob_validate_nombre_referencia_comerciales_cb);
  } // do_ajax_form_maecte_mob_validate_nombre_referencia_comerciales

  function do_ajax_form_maecte_mob_validate_nombre_referencia_comerciales_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "nombre_referencia_comerciales";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_nombre_referencia_comerciales_cb

  // ---------- Validate fecha_compra
  function do_ajax_form_maecte_mob_validate_fecha_compra()
  {
    var nomeCampo_fecha_compra = "fecha_compra";
    var var_fecha_compra = scAjaxGetFieldText(nomeCampo_fecha_compra);
    var var_script_case_init = document.F1.script_case_init.value;
    setTimeout(function() {
      var var_fecha_compra = scAjaxGetFieldText(nomeCampo_fecha_compra);
      x_ajax_form_maecte_mob_validate_fecha_compra(var_fecha_compra, var_script_case_init, do_ajax_form_maecte_mob_validate_fecha_compra_cb);
    }, 200);
  } // do_ajax_form_maecte_mob_validate_fecha_compra

  function do_ajax_form_maecte_mob_validate_fecha_compra_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "fecha_compra";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors || ($("#ui-datepicker-div").length && $("#ui-datepicker-div").filter(":visible").length))
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_fecha_compra_cb

  // ---------- Validate telefono_referencia_comerciales
  function do_ajax_form_maecte_mob_validate_telefono_referencia_comerciales()
  {
    var nomeCampo_telefono_referencia_comerciales = "telefono_referencia_comerciales";
    var var_telefono_referencia_comerciales = scAjaxGetFieldText(nomeCampo_telefono_referencia_comerciales);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_telefono_referencia_comerciales(var_telefono_referencia_comerciales, var_script_case_init, do_ajax_form_maecte_mob_validate_telefono_referencia_comerciales_cb);
  } // do_ajax_form_maecte_mob_validate_telefono_referencia_comerciales

  function do_ajax_form_maecte_mob_validate_telefono_referencia_comerciales_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "telefono_referencia_comerciales";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_telefono_referencia_comerciales_cb

  // ---------- Validate ventas
  function do_ajax_form_maecte_mob_validate_ventas()
  {
    var nomeCampo_ventas = "ventas";
    var var_ventas = scAjaxGetFieldText(nomeCampo_ventas);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ventas(var_ventas, var_script_case_init, do_ajax_form_maecte_mob_validate_ventas_cb);
  } // do_ajax_form_maecte_mob_validate_ventas

  function do_ajax_form_maecte_mob_validate_ventas_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ventas";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ventas_cb

  // ---------- Validate comisiones
  function do_ajax_form_maecte_mob_validate_comisiones()
  {
    var nomeCampo_comisiones = "comisiones";
    var var_comisiones = scAjaxGetFieldText(nomeCampo_comisiones);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_comisiones(var_comisiones, var_script_case_init, do_ajax_form_maecte_mob_validate_comisiones_cb);
  } // do_ajax_form_maecte_mob_validate_comisiones

  function do_ajax_form_maecte_mob_validate_comisiones_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "comisiones";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_comisiones_cb

  // ---------- Validate gastos_operativos
  function do_ajax_form_maecte_mob_validate_gastos_operativos()
  {
    var nomeCampo_gastos_operativos = "gastos_operativos";
    var var_gastos_operativos = scAjaxGetFieldText(nomeCampo_gastos_operativos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_gastos_operativos(var_gastos_operativos, var_script_case_init, do_ajax_form_maecte_mob_validate_gastos_operativos_cb);
  } // do_ajax_form_maecte_mob_validate_gastos_operativos

  function do_ajax_form_maecte_mob_validate_gastos_operativos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "gastos_operativos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_gastos_operativos_cb

  // ---------- Validate gastos_administrativos
  function do_ajax_form_maecte_mob_validate_gastos_administrativos()
  {
    var nomeCampo_gastos_administrativos = "gastos_administrativos";
    var var_gastos_administrativos = scAjaxGetFieldText(nomeCampo_gastos_administrativos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_gastos_administrativos(var_gastos_administrativos, var_script_case_init, do_ajax_form_maecte_mob_validate_gastos_administrativos_cb);
  } // do_ajax_form_maecte_mob_validate_gastos_administrativos

  function do_ajax_form_maecte_mob_validate_gastos_administrativos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "gastos_administrativos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_gastos_administrativos_cb

  // ---------- Validate pago_cuotas_prestamo
  function do_ajax_form_maecte_mob_validate_pago_cuotas_prestamo()
  {
    var nomeCampo_pago_cuotas_prestamo = "pago_cuotas_prestamo";
    var var_pago_cuotas_prestamo = scAjaxGetFieldText(nomeCampo_pago_cuotas_prestamo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_pago_cuotas_prestamo(var_pago_cuotas_prestamo, var_script_case_init, do_ajax_form_maecte_mob_validate_pago_cuotas_prestamo_cb);
  } // do_ajax_form_maecte_mob_validate_pago_cuotas_prestamo

  function do_ajax_form_maecte_mob_validate_pago_cuotas_prestamo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pago_cuotas_prestamo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_pago_cuotas_prestamo_cb

  // ---------- Validate funcionario
  function do_ajax_form_maecte_mob_validate_funcionario()
  {
    var nomeCampo_funcionario = "funcionario";
    var var_funcionario = scAjaxGetFieldText(nomeCampo_funcionario);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_funcionario(var_funcionario, var_script_case_init, do_ajax_form_maecte_mob_validate_funcionario_cb);
  } // do_ajax_form_maecte_mob_validate_funcionario

  function do_ajax_form_maecte_mob_validate_funcionario_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "funcionario";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_funcionario_cb

  // ---------- Validate funcionario_detalle
  function do_ajax_form_maecte_mob_validate_funcionario_detalle()
  {
    var nomeCampo_funcionario_detalle = "funcionario_detalle";
    var var_funcionario_detalle = scAjaxGetFieldText(nomeCampo_funcionario_detalle);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_funcionario_detalle(var_funcionario_detalle, var_script_case_init, do_ajax_form_maecte_mob_validate_funcionario_detalle_cb);
  } // do_ajax_form_maecte_mob_validate_funcionario_detalle

  function do_ajax_form_maecte_mob_validate_funcionario_detalle_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "funcionario_detalle";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_funcionario_detalle_cb

  // ---------- Validate miembro_politico
  function do_ajax_form_maecte_mob_validate_miembro_politico()
  {
    var nomeCampo_miembro_politico = "miembro_politico";
    var var_miembro_politico = scAjaxGetFieldText(nomeCampo_miembro_politico);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_miembro_politico(var_miembro_politico, var_script_case_init, do_ajax_form_maecte_mob_validate_miembro_politico_cb);
  } // do_ajax_form_maecte_mob_validate_miembro_politico

  function do_ajax_form_maecte_mob_validate_miembro_politico_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "miembro_politico";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_miembro_politico_cb

  // ---------- Validate miembro_politico_detalle
  function do_ajax_form_maecte_mob_validate_miembro_politico_detalle()
  {
    var nomeCampo_miembro_politico_detalle = "miembro_politico_detalle";
    var var_miembro_politico_detalle = scAjaxGetFieldText(nomeCampo_miembro_politico_detalle);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_miembro_politico_detalle(var_miembro_politico_detalle, var_script_case_init, do_ajax_form_maecte_mob_validate_miembro_politico_detalle_cb);
  } // do_ajax_form_maecte_mob_validate_miembro_politico_detalle

  function do_ajax_form_maecte_mob_validate_miembro_politico_detalle_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "miembro_politico_detalle";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_miembro_politico_detalle_cb

  // ---------- Validate ejecutivo_gobierno
  function do_ajax_form_maecte_mob_validate_ejecutivo_gobierno()
  {
    var nomeCampo_ejecutivo_gobierno = "ejecutivo_gobierno";
    var var_ejecutivo_gobierno = scAjaxGetFieldText(nomeCampo_ejecutivo_gobierno);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ejecutivo_gobierno(var_ejecutivo_gobierno, var_script_case_init, do_ajax_form_maecte_mob_validate_ejecutivo_gobierno_cb);
  } // do_ajax_form_maecte_mob_validate_ejecutivo_gobierno

  function do_ajax_form_maecte_mob_validate_ejecutivo_gobierno_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ejecutivo_gobierno";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ejecutivo_gobierno_cb

  // ---------- Validate ejecutivo_gobierno_detalle
  function do_ajax_form_maecte_mob_validate_ejecutivo_gobierno_detalle()
  {
    var nomeCampo_ejecutivo_gobierno_detalle = "ejecutivo_gobierno_detalle";
    var var_ejecutivo_gobierno_detalle = scAjaxGetFieldText(nomeCampo_ejecutivo_gobierno_detalle);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_ejecutivo_gobierno_detalle(var_ejecutivo_gobierno_detalle, var_script_case_init, do_ajax_form_maecte_mob_validate_ejecutivo_gobierno_detalle_cb);
  } // do_ajax_form_maecte_mob_validate_ejecutivo_gobierno_detalle

  function do_ajax_form_maecte_mob_validate_ejecutivo_gobierno_detalle_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "ejecutivo_gobierno_detalle";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_ejecutivo_gobierno_detalle_cb

  // ---------- Validate familiar_gobierno
  function do_ajax_form_maecte_mob_validate_familiar_gobierno()
  {
    var nomeCampo_familiar_gobierno = "familiar_gobierno";
    var var_familiar_gobierno = scAjaxGetFieldText(nomeCampo_familiar_gobierno);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_familiar_gobierno(var_familiar_gobierno, var_script_case_init, do_ajax_form_maecte_mob_validate_familiar_gobierno_cb);
  } // do_ajax_form_maecte_mob_validate_familiar_gobierno

  function do_ajax_form_maecte_mob_validate_familiar_gobierno_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "familiar_gobierno";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_familiar_gobierno_cb

  // ---------- Validate familiar_gobierno_detalle
  function do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle()
  {
    var nomeCampo_familiar_gobierno_detalle = "familiar_gobierno_detalle";
    var var_familiar_gobierno_detalle = scAjaxGetFieldText(nomeCampo_familiar_gobierno_detalle);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_familiar_gobierno_detalle(var_familiar_gobierno_detalle, var_script_case_init, do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_cb);
  } // do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle

  function do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "familiar_gobierno_detalle";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_cb

  // ---------- Validate familiar_gobierno_detalle_quien
  function do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_quien()
  {
    var nomeCampo_familiar_gobierno_detalle_quien = "familiar_gobierno_detalle_quien";
    var var_familiar_gobierno_detalle_quien = scAjaxGetFieldText(nomeCampo_familiar_gobierno_detalle_quien);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_quien(var_familiar_gobierno_detalle_quien, var_script_case_init, do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_quien_cb);
  } // do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_quien

  function do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_quien_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "familiar_gobierno_detalle_quien";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_familiar_gobierno_detalle_quien_cb

  // ---------- Validate otros_ingresos
  function do_ajax_form_maecte_mob_validate_otros_ingresos()
  {
    var nomeCampo_otros_ingresos = "otros_ingresos";
    var var_otros_ingresos = scAjaxGetFieldText(nomeCampo_otros_ingresos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_otros_ingresos(var_otros_ingresos, var_script_case_init, do_ajax_form_maecte_mob_validate_otros_ingresos_cb);
  } // do_ajax_form_maecte_mob_validate_otros_ingresos

  function do_ajax_form_maecte_mob_validate_otros_ingresos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "otros_ingresos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_otros_ingresos_cb

  // ---------- Validate otros_gastos
  function do_ajax_form_maecte_mob_validate_otros_gastos()
  {
    var nomeCampo_otros_gastos = "otros_gastos";
    var var_otros_gastos = scAjaxGetFieldText(nomeCampo_otros_gastos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_otros_gastos(var_otros_gastos, var_script_case_init, do_ajax_form_maecte_mob_validate_otros_gastos_cb);
  } // do_ajax_form_maecte_mob_validate_otros_gastos

  function do_ajax_form_maecte_mob_validate_otros_gastos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "otros_gastos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_otros_gastos_cb

  // ---------- Validate otros_activos
  function do_ajax_form_maecte_mob_validate_otros_activos()
  {
    var nomeCampo_otros_activos = "otros_activos";
    var var_otros_activos = scAjaxGetFieldText(nomeCampo_otros_activos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_otros_activos(var_otros_activos, var_script_case_init, do_ajax_form_maecte_mob_validate_otros_activos_cb);
  } // do_ajax_form_maecte_mob_validate_otros_activos

  function do_ajax_form_maecte_mob_validate_otros_activos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "otros_activos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_otros_activos_cb

  // ---------- Validate otras_obligaciones
  function do_ajax_form_maecte_mob_validate_otras_obligaciones()
  {
    var nomeCampo_otras_obligaciones = "otras_obligaciones";
    var var_otras_obligaciones = scAjaxGetFieldText(nomeCampo_otras_obligaciones);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_otras_obligaciones(var_otras_obligaciones, var_script_case_init, do_ajax_form_maecte_mob_validate_otras_obligaciones_cb);
  } // do_ajax_form_maecte_mob_validate_otras_obligaciones

  function do_ajax_form_maecte_mob_validate_otras_obligaciones_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "otras_obligaciones";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_otras_obligaciones_cb

  // ---------- Validate sector_direccion_empresa
  function do_ajax_form_maecte_mob_validate_sector_direccion_empresa()
  {
    var nomeCampo_sector_direccion_empresa = "sector_direccion_empresa";
    var var_sector_direccion_empresa = scAjaxGetFieldText(nomeCampo_sector_direccion_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sector_direccion_empresa(var_sector_direccion_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_sector_direccion_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_sector_direccion_empresa

  function do_ajax_form_maecte_mob_validate_sector_direccion_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sector_direccion_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sector_direccion_empresa_cb

  // ---------- Validate sector_direccion_empresa_correo
  function do_ajax_form_maecte_mob_validate_sector_direccion_empresa_correo()
  {
    var nomeCampo_sector_direccion_empresa_correo = "sector_direccion_empresa_correo";
    var var_sector_direccion_empresa_correo = scAjaxGetFieldText(nomeCampo_sector_direccion_empresa_correo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_sector_direccion_empresa_correo(var_sector_direccion_empresa_correo, var_script_case_init, do_ajax_form_maecte_mob_validate_sector_direccion_empresa_correo_cb);
  } // do_ajax_form_maecte_mob_validate_sector_direccion_empresa_correo

  function do_ajax_form_maecte_mob_validate_sector_direccion_empresa_correo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "sector_direccion_empresa_correo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_sector_direccion_empresa_correo_cb

  // ---------- Validate extranjero_nombres_referencia
  function do_ajax_form_maecte_mob_validate_extranjero_nombres_referencia()
  {
    var nomeCampo_extranjero_nombres_referencia = "extranjero_nombres_referencia";
    var var_extranjero_nombres_referencia = scAjaxGetFieldText(nomeCampo_extranjero_nombres_referencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_extranjero_nombres_referencia(var_extranjero_nombres_referencia, var_script_case_init, do_ajax_form_maecte_mob_validate_extranjero_nombres_referencia_cb);
  } // do_ajax_form_maecte_mob_validate_extranjero_nombres_referencia

  function do_ajax_form_maecte_mob_validate_extranjero_nombres_referencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "extranjero_nombres_referencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_extranjero_nombres_referencia_cb

  // ---------- Validate extranjero_apellidos_referencia
  function do_ajax_form_maecte_mob_validate_extranjero_apellidos_referencia()
  {
    var nomeCampo_extranjero_apellidos_referencia = "extranjero_apellidos_referencia";
    var var_extranjero_apellidos_referencia = scAjaxGetFieldText(nomeCampo_extranjero_apellidos_referencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_extranjero_apellidos_referencia(var_extranjero_apellidos_referencia, var_script_case_init, do_ajax_form_maecte_mob_validate_extranjero_apellidos_referencia_cb);
  } // do_ajax_form_maecte_mob_validate_extranjero_apellidos_referencia

  function do_ajax_form_maecte_mob_validate_extranjero_apellidos_referencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "extranjero_apellidos_referencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_extranjero_apellidos_referencia_cb

  // ---------- Validate extranjero_parentesco
  function do_ajax_form_maecte_mob_validate_extranjero_parentesco()
  {
    var nomeCampo_extranjero_parentesco = "extranjero_parentesco";
    var var_extranjero_parentesco = scAjaxGetFieldText(nomeCampo_extranjero_parentesco);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_extranjero_parentesco(var_extranjero_parentesco, var_script_case_init, do_ajax_form_maecte_mob_validate_extranjero_parentesco_cb);
  } // do_ajax_form_maecte_mob_validate_extranjero_parentesco

  function do_ajax_form_maecte_mob_validate_extranjero_parentesco_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "extranjero_parentesco";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_extranjero_parentesco_cb

  // ---------- Validate extranjero_celular_ref
  function do_ajax_form_maecte_mob_validate_extranjero_celular_ref()
  {
    var nomeCampo_extranjero_celular_ref = "extranjero_celular_ref";
    var var_extranjero_celular_ref = scAjaxGetFieldText(nomeCampo_extranjero_celular_ref);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_extranjero_celular_ref(var_extranjero_celular_ref, var_script_case_init, do_ajax_form_maecte_mob_validate_extranjero_celular_ref_cb);
  } // do_ajax_form_maecte_mob_validate_extranjero_celular_ref

  function do_ajax_form_maecte_mob_validate_extranjero_celular_ref_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "extranjero_celular_ref";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_extranjero_celular_ref_cb

  // ---------- Validate extranjero_telefono_convencional_ref
  function do_ajax_form_maecte_mob_validate_extranjero_telefono_convencional_ref()
  {
    var nomeCampo_extranjero_telefono_convencional_ref = "extranjero_telefono_convencional_ref";
    var var_extranjero_telefono_convencional_ref = scAjaxGetFieldText(nomeCampo_extranjero_telefono_convencional_ref);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_extranjero_telefono_convencional_ref(var_extranjero_telefono_convencional_ref, var_script_case_init, do_ajax_form_maecte_mob_validate_extranjero_telefono_convencional_ref_cb);
  } // do_ajax_form_maecte_mob_validate_extranjero_telefono_convencional_ref

  function do_ajax_form_maecte_mob_validate_extranjero_telefono_convencional_ref_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "extranjero_telefono_convencional_ref";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_extranjero_telefono_convencional_ref_cb

  // ---------- Validate cargo_representante_legal
  function do_ajax_form_maecte_mob_validate_cargo_representante_legal()
  {
    var nomeCampo_cargo_representante_legal = "cargo_representante_legal";
    var var_cargo_representante_legal = scAjaxGetFieldText(nomeCampo_cargo_representante_legal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_cargo_representante_legal(var_cargo_representante_legal, var_script_case_init, do_ajax_form_maecte_mob_validate_cargo_representante_legal_cb);
  } // do_ajax_form_maecte_mob_validate_cargo_representante_legal

  function do_ajax_form_maecte_mob_validate_cargo_representante_legal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "cargo_representante_legal";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_cargo_representante_legal_cb

  // ---------- Validate direccion_extranjero
  function do_ajax_form_maecte_mob_validate_direccion_extranjero()
  {
    var nomeCampo_direccion_extranjero = "direccion_extranjero";
    var var_direccion_extranjero = scAjaxGetFieldText(nomeCampo_direccion_extranjero);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_direccion_extranjero(var_direccion_extranjero, var_script_case_init, do_ajax_form_maecte_mob_validate_direccion_extranjero_cb);
  } // do_ajax_form_maecte_mob_validate_direccion_extranjero

  function do_ajax_form_maecte_mob_validate_direccion_extranjero_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "direccion_extranjero";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_direccion_extranjero_cb

  // ---------- Validate relacion_dependencia_principal
  function do_ajax_form_maecte_mob_validate_relacion_dependencia_principal()
  {
    var nomeCampo_relacion_dependencia_principal = "relacion_dependencia_principal";
    var var_relacion_dependencia_principal = scAjaxGetFieldText(nomeCampo_relacion_dependencia_principal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_relacion_dependencia_principal(var_relacion_dependencia_principal, var_script_case_init, do_ajax_form_maecte_mob_validate_relacion_dependencia_principal_cb);
  } // do_ajax_form_maecte_mob_validate_relacion_dependencia_principal

  function do_ajax_form_maecte_mob_validate_relacion_dependencia_principal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "relacion_dependencia_principal";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_relacion_dependencia_principal_cb

  // ---------- Validate correo_corporativo_principal
  function do_ajax_form_maecte_mob_validate_correo_corporativo_principal()
  {
    var nomeCampo_correo_corporativo_principal = "correo_corporativo_principal";
    var var_correo_corporativo_principal = scAjaxGetFieldText(nomeCampo_correo_corporativo_principal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_correo_corporativo_principal(var_correo_corporativo_principal, var_script_case_init, do_ajax_form_maecte_mob_validate_correo_corporativo_principal_cb);
  } // do_ajax_form_maecte_mob_validate_correo_corporativo_principal

  function do_ajax_form_maecte_mob_validate_correo_corporativo_principal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "correo_corporativo_principal";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_correo_corporativo_principal_cb

  // ---------- Validate relacion_dependencia_secundaria
  function do_ajax_form_maecte_mob_validate_relacion_dependencia_secundaria()
  {
    var nomeCampo_relacion_dependencia_secundaria = "relacion_dependencia_secundaria";
    var var_relacion_dependencia_secundaria = scAjaxGetFieldText(nomeCampo_relacion_dependencia_secundaria);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_relacion_dependencia_secundaria(var_relacion_dependencia_secundaria, var_script_case_init, do_ajax_form_maecte_mob_validate_relacion_dependencia_secundaria_cb);
  } // do_ajax_form_maecte_mob_validate_relacion_dependencia_secundaria

  function do_ajax_form_maecte_mob_validate_relacion_dependencia_secundaria_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "relacion_dependencia_secundaria";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_relacion_dependencia_secundaria_cb

  // ---------- Validate correo_corporativo_secundario
  function do_ajax_form_maecte_mob_validate_correo_corporativo_secundario()
  {
    var nomeCampo_correo_corporativo_secundario = "correo_corporativo_secundario";
    var var_correo_corporativo_secundario = scAjaxGetFieldText(nomeCampo_correo_corporativo_secundario);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_correo_corporativo_secundario(var_correo_corporativo_secundario, var_script_case_init, do_ajax_form_maecte_mob_validate_correo_corporativo_secundario_cb);
  } // do_ajax_form_maecte_mob_validate_correo_corporativo_secundario

  function do_ajax_form_maecte_mob_validate_correo_corporativo_secundario_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "correo_corporativo_secundario";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_correo_corporativo_secundario_cb

  // ---------- Validate actividad_secundaria
  function do_ajax_form_maecte_mob_validate_actividad_secundaria()
  {
    var nomeCampo_actividad_secundaria = "actividad_secundaria";
    var var_actividad_secundaria = scAjaxGetFieldText(nomeCampo_actividad_secundaria);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_actividad_secundaria(var_actividad_secundaria, var_script_case_init, do_ajax_form_maecte_mob_validate_actividad_secundaria_cb);
  } // do_ajax_form_maecte_mob_validate_actividad_secundaria

  function do_ajax_form_maecte_mob_validate_actividad_secundaria_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "actividad_secundaria";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_actividad_secundaria_cb

  // ---------- Validate id_pais_empresa
  function do_ajax_form_maecte_mob_validate_id_pais_empresa()
  {
    var nomeCampo_id_pais_empresa = "id_pais_empresa";
    var var_id_pais_empresa = scAjaxGetFieldText(nomeCampo_id_pais_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_pais_empresa(var_id_pais_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_id_pais_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_id_pais_empresa

  function do_ajax_form_maecte_mob_validate_id_pais_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_pais_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_pais_empresa_cb

  // ---------- Validate id_provincia_empresa
  function do_ajax_form_maecte_mob_validate_id_provincia_empresa()
  {
    var nomeCampo_id_provincia_empresa = "id_provincia_empresa";
    var var_id_provincia_empresa = scAjaxGetFieldText(nomeCampo_id_provincia_empresa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_provincia_empresa(var_id_provincia_empresa, var_script_case_init, do_ajax_form_maecte_mob_validate_id_provincia_empresa_cb);
  } // do_ajax_form_maecte_mob_validate_id_provincia_empresa

  function do_ajax_form_maecte_mob_validate_id_provincia_empresa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_provincia_empresa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_provincia_empresa_cb

  // ---------- Validate id_pais_correo
  function do_ajax_form_maecte_mob_validate_id_pais_correo()
  {
    var nomeCampo_id_pais_correo = "id_pais_correo";
    var var_id_pais_correo = scAjaxGetFieldText(nomeCampo_id_pais_correo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_pais_correo(var_id_pais_correo, var_script_case_init, do_ajax_form_maecte_mob_validate_id_pais_correo_cb);
  } // do_ajax_form_maecte_mob_validate_id_pais_correo

  function do_ajax_form_maecte_mob_validate_id_pais_correo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_pais_correo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_pais_correo_cb

  // ---------- Validate id_provincia_correo
  function do_ajax_form_maecte_mob_validate_id_provincia_correo()
  {
    var nomeCampo_id_provincia_correo = "id_provincia_correo";
    var var_id_provincia_correo = scAjaxGetFieldText(nomeCampo_id_provincia_correo);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_provincia_correo(var_id_provincia_correo, var_script_case_init, do_ajax_form_maecte_mob_validate_id_provincia_correo_cb);
  } // do_ajax_form_maecte_mob_validate_id_provincia_correo

  function do_ajax_form_maecte_mob_validate_id_provincia_correo_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_provincia_correo";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_provincia_correo_cb

  // ---------- Validate apellido_empresa_solicitante
  function do_ajax_form_maecte_mob_validate_apellido_empresa_solicitante()
  {
    var nomeCampo_apellido_empresa_solicitante = "apellido_empresa_solicitante";
    var var_apellido_empresa_solicitante = scAjaxGetFieldText(nomeCampo_apellido_empresa_solicitante);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_apellido_empresa_solicitante(var_apellido_empresa_solicitante, var_script_case_init, do_ajax_form_maecte_mob_validate_apellido_empresa_solicitante_cb);
  } // do_ajax_form_maecte_mob_validate_apellido_empresa_solicitante

  function do_ajax_form_maecte_mob_validate_apellido_empresa_solicitante_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "apellido_empresa_solicitante";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_apellido_empresa_solicitante_cb

  // ---------- Validate pais_actividad2
  function do_ajax_form_maecte_mob_validate_pais_actividad2()
  {
    var nomeCampo_pais_actividad2 = "pais_actividad2";
    var var_pais_actividad2 = scAjaxGetFieldText(nomeCampo_pais_actividad2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_pais_actividad2(var_pais_actividad2, var_script_case_init, do_ajax_form_maecte_mob_validate_pais_actividad2_cb);
  } // do_ajax_form_maecte_mob_validate_pais_actividad2

  function do_ajax_form_maecte_mob_validate_pais_actividad2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pais_actividad2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_pais_actividad2_cb

  // ---------- Validate id_provincia_exterior
  function do_ajax_form_maecte_mob_validate_id_provincia_exterior()
  {
    var nomeCampo_id_provincia_exterior = "id_provincia_exterior";
    var var_id_provincia_exterior = scAjaxGetFieldText(nomeCampo_id_provincia_exterior);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_provincia_exterior(var_id_provincia_exterior, var_script_case_init, do_ajax_form_maecte_mob_validate_id_provincia_exterior_cb);
  } // do_ajax_form_maecte_mob_validate_id_provincia_exterior

  function do_ajax_form_maecte_mob_validate_id_provincia_exterior_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_provincia_exterior";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_provincia_exterior_cb

  // ---------- Validate pais_independiente
  function do_ajax_form_maecte_mob_validate_pais_independiente()
  {
    var nomeCampo_pais_independiente = "pais_independiente";
    var var_pais_independiente = scAjaxGetFieldText(nomeCampo_pais_independiente);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_pais_independiente(var_pais_independiente, var_script_case_init, do_ajax_form_maecte_mob_validate_pais_independiente_cb);
  } // do_ajax_form_maecte_mob_validate_pais_independiente

  function do_ajax_form_maecte_mob_validate_pais_independiente_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "pais_independiente";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_pais_independiente_cb

  // ---------- Validate tipo_contrato_otros_actividad_principal
  function do_ajax_form_maecte_mob_validate_tipo_contrato_otros_actividad_principal()
  {
    var nomeCampo_tipo_contrato_otros_actividad_principal = "tipo_contrato_otros_actividad_principal";
    var var_tipo_contrato_otros_actividad_principal = scAjaxGetFieldText(nomeCampo_tipo_contrato_otros_actividad_principal);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_tipo_contrato_otros_actividad_principal(var_tipo_contrato_otros_actividad_principal, var_script_case_init, do_ajax_form_maecte_mob_validate_tipo_contrato_otros_actividad_principal_cb);
  } // do_ajax_form_maecte_mob_validate_tipo_contrato_otros_actividad_principal

  function do_ajax_form_maecte_mob_validate_tipo_contrato_otros_actividad_principal_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipo_contrato_otros_actividad_principal";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_tipo_contrato_otros_actividad_principal_cb

  // ---------- Validate actividadeconomica
  function do_ajax_form_maecte_mob_validate_actividadeconomica()
  {
    var nomeCampo_actividadeconomica = "actividadeconomica";
    var var_actividadeconomica = scAjaxGetFieldText(nomeCampo_actividadeconomica);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_actividadeconomica(var_actividadeconomica, var_script_case_init, do_ajax_form_maecte_mob_validate_actividadeconomica_cb);
  } // do_ajax_form_maecte_mob_validate_actividadeconomica

  function do_ajax_form_maecte_mob_validate_actividadeconomica_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "actividadeconomica";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_actividadeconomica_cb

  // ---------- Validate clasesujeto
  function do_ajax_form_maecte_mob_validate_clasesujeto()
  {
    var nomeCampo_clasesujeto = "clasesujeto";
    var var_clasesujeto = scAjaxGetFieldText(nomeCampo_clasesujeto);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_clasesujeto(var_clasesujeto, var_script_case_init, do_ajax_form_maecte_mob_validate_clasesujeto_cb);
  } // do_ajax_form_maecte_mob_validate_clasesujeto

  function do_ajax_form_maecte_mob_validate_clasesujeto_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "clasesujeto";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_clasesujeto_cb

  // ---------- Validate provincia
  function do_ajax_form_maecte_mob_validate_provincia()
  {
    var nomeCampo_provincia = "provincia";
    var var_provincia = scAjaxGetFieldText(nomeCampo_provincia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_provincia(var_provincia, var_script_case_init, do_ajax_form_maecte_mob_validate_provincia_cb);
  } // do_ajax_form_maecte_mob_validate_provincia

  function do_ajax_form_maecte_mob_validate_provincia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "provincia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_provincia_cb

  // ---------- Validate parroquia
  function do_ajax_form_maecte_mob_validate_parroquia()
  {
    var nomeCampo_parroquia = "parroquia";
    var var_parroquia = scAjaxGetFieldText(nomeCampo_parroquia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_parroquia(var_parroquia, var_script_case_init, do_ajax_form_maecte_mob_validate_parroquia_cb);
  } // do_ajax_form_maecte_mob_validate_parroquia

  function do_ajax_form_maecte_mob_validate_parroquia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "parroquia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_parroquia_cb

  // ---------- Validate canton
  function do_ajax_form_maecte_mob_validate_canton()
  {
    var nomeCampo_canton = "canton";
    var var_canton = scAjaxGetFieldText(nomeCampo_canton);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_canton(var_canton, var_script_case_init, do_ajax_form_maecte_mob_validate_canton_cb);
  } // do_ajax_form_maecte_mob_validate_canton

  function do_ajax_form_maecte_mob_validate_canton_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "canton";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_canton_cb

  // ---------- Validate demandajudicial
  function do_ajax_form_maecte_mob_validate_demandajudicial()
  {
    var nomeCampo_demandajudicial = "demandajudicial";
    var var_demandajudicial = scAjaxGetFieldText(nomeCampo_demandajudicial);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_demandajudicial(var_demandajudicial, var_script_case_init, do_ajax_form_maecte_mob_validate_demandajudicial_cb);
  } // do_ajax_form_maecte_mob_validate_demandajudicial

  function do_ajax_form_maecte_mob_validate_demandajudicial_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "demandajudicial";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_demandajudicial_cb

  // ---------- Validate vdemandajudicial
  function do_ajax_form_maecte_mob_validate_vdemandajudicial()
  {
    var nomeCampo_vdemandajudicial = "vdemandajudicial";
    var var_vdemandajudicial = scAjaxGetFieldText(nomeCampo_vdemandajudicial);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_vdemandajudicial(var_vdemandajudicial, var_script_case_init, do_ajax_form_maecte_mob_validate_vdemandajudicial_cb);
  } // do_ajax_form_maecte_mob_validate_vdemandajudicial

  function do_ajax_form_maecte_mob_validate_vdemandajudicial_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "vdemandajudicial";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_vdemandajudicial_cb

  // ---------- Validate carteracastigada
  function do_ajax_form_maecte_mob_validate_carteracastigada()
  {
    var nomeCampo_carteracastigada = "carteracastigada";
    var var_carteracastigada = scAjaxGetFieldText(nomeCampo_carteracastigada);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_carteracastigada(var_carteracastigada, var_script_case_init, do_ajax_form_maecte_mob_validate_carteracastigada_cb);
  } // do_ajax_form_maecte_mob_validate_carteracastigada

  function do_ajax_form_maecte_mob_validate_carteracastigada_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "carteracastigada";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_carteracastigada_cb

  // ---------- Validate vcarteracastigada
  function do_ajax_form_maecte_mob_validate_vcarteracastigada()
  {
    var nomeCampo_vcarteracastigada = "vcarteracastigada";
    var var_vcarteracastigada = scAjaxGetFieldText(nomeCampo_vcarteracastigada);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_vcarteracastigada(var_vcarteracastigada, var_script_case_init, do_ajax_form_maecte_mob_validate_vcarteracastigada_cb);
  } // do_ajax_form_maecte_mob_validate_vcarteracastigada

  function do_ajax_form_maecte_mob_validate_vcarteracastigada_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "vcarteracastigada";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_vcarteracastigada_cb

  // ---------- Validate accesoexterno01
  function do_ajax_form_maecte_mob_validate_accesoexterno01()
  {
    var nomeCampo_accesoexterno01 = "accesoexterno01";
    var var_accesoexterno01 = scAjaxGetFieldText(nomeCampo_accesoexterno01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_accesoexterno01(var_accesoexterno01, var_script_case_init, do_ajax_form_maecte_mob_validate_accesoexterno01_cb);
  } // do_ajax_form_maecte_mob_validate_accesoexterno01

  function do_ajax_form_maecte_mob_validate_accesoexterno01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "accesoexterno01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_accesoexterno01_cb

  // ---------- Validate referencia
  function do_ajax_form_maecte_mob_validate_referencia()
  {
    var nomeCampo_referencia = "referencia";
    var var_referencia = scAjaxGetFieldText(nomeCampo_referencia);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_referencia(var_referencia, var_script_case_init, do_ajax_form_maecte_mob_validate_referencia_cb);
  } // do_ajax_form_maecte_mob_validate_referencia

  function do_ajax_form_maecte_mob_validate_referencia_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "referencia";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_referencia_cb

  // ---------- Validate id_pais_empleado_dir_desempeno
  function do_ajax_form_maecte_mob_validate_id_pais_empleado_dir_desempeno()
  {
    var nomeCampo_id_pais_empleado_dir_desempeno = "id_pais_empleado_dir_desempeno";
    var var_id_pais_empleado_dir_desempeno = scAjaxGetFieldText(nomeCampo_id_pais_empleado_dir_desempeno);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_pais_empleado_dir_desempeno(var_id_pais_empleado_dir_desempeno, var_script_case_init, do_ajax_form_maecte_mob_validate_id_pais_empleado_dir_desempeno_cb);
  } // do_ajax_form_maecte_mob_validate_id_pais_empleado_dir_desempeno

  function do_ajax_form_maecte_mob_validate_id_pais_empleado_dir_desempeno_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_pais_empleado_dir_desempeno";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_pais_empleado_dir_desempeno_cb

  // ---------- Validate id_provincia_empleado_dir_desempeno
  function do_ajax_form_maecte_mob_validate_id_provincia_empleado_dir_desempeno()
  {
    var nomeCampo_id_provincia_empleado_dir_desempeno = "id_provincia_empleado_dir_desempeno";
    var var_id_provincia_empleado_dir_desempeno = scAjaxGetFieldText(nomeCampo_id_provincia_empleado_dir_desempeno);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_provincia_empleado_dir_desempeno(var_id_provincia_empleado_dir_desempeno, var_script_case_init, do_ajax_form_maecte_mob_validate_id_provincia_empleado_dir_desempeno_cb);
  } // do_ajax_form_maecte_mob_validate_id_provincia_empleado_dir_desempeno

  function do_ajax_form_maecte_mob_validate_id_provincia_empleado_dir_desempeno_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_provincia_empleado_dir_desempeno";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_provincia_empleado_dir_desempeno_cb

  // ---------- Validate id_ciudad_empleado_dir_desempeno
  function do_ajax_form_maecte_mob_validate_id_ciudad_empleado_dir_desempeno()
  {
    var nomeCampo_id_ciudad_empleado_dir_desempeno = "id_ciudad_empleado_dir_desempeno";
    var var_id_ciudad_empleado_dir_desempeno = scAjaxGetFieldText(nomeCampo_id_ciudad_empleado_dir_desempeno);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_ciudad_empleado_dir_desempeno(var_id_ciudad_empleado_dir_desempeno, var_script_case_init, do_ajax_form_maecte_mob_validate_id_ciudad_empleado_dir_desempeno_cb);
  } // do_ajax_form_maecte_mob_validate_id_ciudad_empleado_dir_desempeno

  function do_ajax_form_maecte_mob_validate_id_ciudad_empleado_dir_desempeno_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_ciudad_empleado_dir_desempeno";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_ciudad_empleado_dir_desempeno_cb

  // ---------- Validate razon_social
  function do_ajax_form_maecte_mob_validate_razon_social()
  {
    var nomeCampo_razon_social = "razon_social";
    var var_razon_social = scAjaxGetFieldText(nomeCampo_razon_social);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_razon_social(var_razon_social, var_script_case_init, do_ajax_form_maecte_mob_validate_razon_social_cb);
  } // do_ajax_form_maecte_mob_validate_razon_social

  function do_ajax_form_maecte_mob_validate_razon_social_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "razon_social";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_razon_social_cb

  // ---------- Validate parterel01
  function do_ajax_form_maecte_mob_validate_parterel01()
  {
    var nomeCampo_parterel01 = "parterel01";
    var var_parterel01 = scAjaxGetFieldText(nomeCampo_parterel01);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_parterel01(var_parterel01, var_script_case_init, do_ajax_form_maecte_mob_validate_parterel01_cb);
  } // do_ajax_form_maecte_mob_validate_parterel01

  function do_ajax_form_maecte_mob_validate_parterel01_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "parterel01";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_parterel01_cb

  // ---------- Validate origen_fondos
  function do_ajax_form_maecte_mob_validate_origen_fondos()
  {
    var nomeCampo_origen_fondos = "origen_fondos";
    var var_origen_fondos = scAjaxGetFieldText(nomeCampo_origen_fondos);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_origen_fondos(var_origen_fondos, var_script_case_init, do_ajax_form_maecte_mob_validate_origen_fondos_cb);
  } // do_ajax_form_maecte_mob_validate_origen_fondos

  function do_ajax_form_maecte_mob_validate_origen_fondos_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "origen_fondos";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_origen_fondos_cb

  // ---------- Validate tipo_identificacion
  function do_ajax_form_maecte_mob_validate_tipo_identificacion()
  {
    var nomeCampo_tipo_identificacion = "tipo_identificacion";
    var var_tipo_identificacion = scAjaxGetFieldText(nomeCampo_tipo_identificacion);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_tipo_identificacion(var_tipo_identificacion, var_script_case_init, do_ajax_form_maecte_mob_validate_tipo_identificacion_cb);
  } // do_ajax_form_maecte_mob_validate_tipo_identificacion

  function do_ajax_form_maecte_mob_validate_tipo_identificacion_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "tipo_identificacion";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_tipo_identificacion_cb

  // ---------- Validate id_actividad
  function do_ajax_form_maecte_mob_validate_id_actividad()
  {
    var nomeCampo_id_actividad = "id_actividad";
    var var_id_actividad = scAjaxGetFieldText(nomeCampo_id_actividad);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_form_maecte_mob_validate_id_actividad(var_id_actividad, var_script_case_init, do_ajax_form_maecte_mob_validate_id_actividad_cb);
  } // do_ajax_form_maecte_mob_validate_id_actividad

  function do_ajax_form_maecte_mob_validate_id_actividad_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "id_actividad";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sFieldErrors = scAjaxListFieldErrors(sFieldValid, false);
    if ("" == sFieldErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay(sFieldValid);
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay(sFieldValid, sFieldErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_form_maecte_mob_validate_id_actividad_cb
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
  function do_ajax_form_maecte_mob_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_form_maecte_mob_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_codcte01 = scAjaxGetFieldHidden("codcte01");
    var var_tipo_cliente = scAjaxGetFieldText("tipo_cliente");
    var var_id_nacionalidad = scAjaxGetFieldText("id_nacionalidad");
    var var_nomcte01 = scAjaxGetFieldText("nomcte01");
    var var_primer_nombre = scAjaxGetFieldText("primer_nombre");
    var var_segundo_nombre = scAjaxGetFieldText("segundo_nombre");
    var var_primer_apellido = scAjaxGetFieldText("primer_apellido");
    var var_segundo_apellido = scAjaxGetFieldText("segundo_apellido");
    var var_cv1cte01 = scAjaxGetFieldText("cv1cte01");
    var var_cv2cte01 = scAjaxGetFieldText("cv2cte01");
    var var_tipcte01 = scAjaxGetFieldText("tipcte01");
    var var_ofienccte01 = scAjaxGetFieldText("ofienccte01");
    var var_vendcte01 = scAjaxGetFieldText("vendcte01");
    var var_cobrcte01 = scAjaxGetFieldText("cobrcte01");
    var var_loccte01 = scAjaxGetFieldText("loccte01");
    var var_dircte01 = scAjaxGetFieldText("dircte01");
    var var_sector = scAjaxGetFieldText("sector");
    var var_calle_principal = scAjaxGetFieldText("calle_principal");
    var var_no = scAjaxGetFieldText("no");
    var var_calle_secundaria = scAjaxGetFieldText("calle_secundaria");
    var var_id_pais = scAjaxGetFieldText("id_pais");
    var var_id_provincia = scAjaxGetFieldText("id_provincia");
    var var_id_ciudad = scAjaxGetFieldText("id_ciudad");
    var var_id_canton = scAjaxGetFieldText("id_canton");
    var var_telcte01 = scAjaxGetFieldText("telcte01");
    var var_cascte01 = scAjaxGetFieldText("cascte01");
    var var_ci_conyuge = scAjaxGetFieldText("ci_conyuge");
    var var_conyuge_tipo_identidad = scAjaxGetFieldText("conyuge_tipo_identidad");
    var var_conyuge_primer_nombre = scAjaxGetFieldText("conyuge_primer_nombre");
    var var_conyuge_segundo_nombre = scAjaxGetFieldText("conyuge_segundo_nombre");
    var var_conyuge_primer_apellido = scAjaxGetFieldText("conyuge_primer_apellido");
    var var_conyuge_segundo_apellido = scAjaxGetFieldText("conyuge_segundo_apellido");
    var var_conyuge_profesion = scAjaxGetFieldText("conyuge_profesion");
    var var_id_tipo_documento = scAjaxGetFieldText("id_tipo_documento");
    var var_repleg01 = scAjaxGetFieldText("repleg01");
    var var_fecing01 = scAjaxGetFieldText("fecing01");
    var var_condpag01 = scAjaxGetFieldText("condpag01");
    var var_desctocte01 = scAjaxGetFieldText("desctocte01");
    var var_limcred01 = scAjaxGetFieldText("limcred01");
    var var_desppar01 = scAjaxGetFieldText("desppar01");
    var var_cheqpro01 = scAjaxGetFieldText("cheqpro01");
    var var_sdoeje01 = scAjaxGetFieldText("sdoeje01");
    var var_sdoant01 = scAjaxGetFieldText("sdoant01");
    var var_sdoact01 = scAjaxGetFieldText("sdoact01");
    var var_acudbm01 = scAjaxGetFieldText("acudbm01");
    var var_acucrm01 = scAjaxGetFieldText("acucrm01");
    var var_acudbe01 = scAjaxGetFieldText("acudbe01");
    var var_acucre01 = scAjaxGetFieldText("acucre01");
    var var_comentcte01 = scAjaxGetFieldText("comentcte01");
    var var_statuscte01 = scAjaxGetFieldText("statuscte01");
    var var_identcte01 = scAjaxGetFieldText("identcte01");
    var var_cordcte01 = scAjaxGetFieldText("cordcte01");
    var var_limcant01 = scAjaxGetFieldText("limcant01");
    var var_pagleg01 = scAjaxGetFieldText("pagleg01");
    var var_telcte01b = scAjaxGetFieldText("telcte01b");
    var var_telcte01c = scAjaxGetFieldText("telcte01c");
    var var_emailcte01 = scAjaxGetFieldText("emailcte01");
    var var_calle_principal_exterior = scAjaxGetFieldText("calle_principal_exterior");
    var var_no_exterior = scAjaxGetFieldText("no_exterior");
    var var_calle_secundaria_exterior = scAjaxGetFieldText("calle_secundaria_exterior");
    var var_id_pais_exterior = scAjaxGetFieldText("id_pais_exterior");
    var var_id_ciudad_exterior = scAjaxGetFieldText("id_ciudad_exterior");
    var var_codigo_postal_exterior = scAjaxGetFieldText("codigo_postal_exterior");
    var var_sector_exterior = scAjaxGetFieldText("sector_exterior");
    var var_telefono_exterior = scAjaxGetFieldText("telefono_exterior");
    var var_celular_exterior = scAjaxGetFieldText("celular_exterior");
    var var_email_exterior = scAjaxGetFieldText("email_exterior");
    var var_emailaltcte01 = scAjaxGetFieldText("emailaltcte01");
    var var_ctacgcte01 = scAjaxGetFieldText("ctacgcte01");
    var var_obsercte01 = scAjaxGetFieldText("obsercte01");
    var var_totexceso01 = scAjaxGetFieldText("totexceso01");
    var var_imagencte01 = scAjaxGetFieldText("imagencte01");
    var var_block = scAjaxGetFieldText("block");
    var var_uid = scAjaxGetFieldText("uid");
    var var_ultimoacceso = scAjaxGetFieldText("ultimoacceso");
    var var_idcli = scAjaxGetFieldText("idcli");
    var var_catcte01 = scAjaxGetFieldText("catcte01");
    var var_transferido = scAjaxGetFieldText("transferido");
    var var_password = scAjaxGetFieldText("password");
    var var_showroom = scAjaxGetFieldText("showroom");
    var var_orden = scAjaxGetFieldText("orden");
    var var_website = scAjaxGetFieldText("website");
    var var_longitud01 = scAjaxGetFieldText("longitud01");
    var var_latitud01 = scAjaxGetFieldText("latitud01");
    var var_zoom01 = scAjaxGetFieldText("zoom01");
    var var_acceder = scAjaxGetFieldText("acceder");
    var var_coniva01 = scAjaxGetFieldText("coniva01");
    var var_idemp01 = scAjaxGetFieldText("idemp01");
    var var_codprov01 = scAjaxGetFieldText("codprov01");
    var var_celular01 = scAjaxGetFieldText("celular01");
    var var_dircliente01 = scAjaxGetFieldText("dircliente01");
    var var_razcte01 = scAjaxGetFieldText("razcte01");
    var var_ruc01 = scAjaxGetFieldText("ruc01");
    var var_timenegocio01 = scAjaxGetFieldText("timenegocio01");
    var var_refbanc01 = scAjaxGetFieldText("refbanc01");
    var var_refcom01 = scAjaxGetFieldText("refcom01");
    var var_tarjcred01 = scAjaxGetFieldText("tarjcred01");
    var var_firmaut01 = scAjaxGetFieldText("firmaut01");
    var var_precte01 = scAjaxGetFieldText("precte01");
    var var_cuotasven01 = scAjaxGetFieldText("cuotasven01");
    var var_diasven01 = scAjaxGetFieldText("diasven01");
    var var_fechanace01 = scAjaxGetFieldText("fechanace01");
    var var_sexo01 = scAjaxGetFieldText("sexo01");
    var var_estadocivil01 = scAjaxGetFieldText("estadocivil01");
    var var_dirgestion01 = scAjaxGetFieldText("dirgestion01");
    var var_numhijos01 = scAjaxGetFieldText("numhijos01");
    var var_estsop01 = scAjaxGetFieldText("estsop01");
    var var_notick01 = scAjaxGetFieldText("notick01");
    var var_chequece = scAjaxGetFieldText("chequece");
    var var_solcre = scAjaxGetFieldText("solcre");
    var var_promocte01 = scAjaxGetFieldText("promocte01");
    var var_pagare01 = scAjaxGetFieldText("pagare01");
    var var_valorpagare01 = scAjaxGetFieldText("valorpagare01");
    var var_garante01 = scAjaxGetFieldText("garante01");
    var var_fecvenp01 = scAjaxGetFieldText("fecvenp01");
    var var_ctacgant01 = scAjaxGetFieldText("ctacgant01");
    var var_dsn = scAjaxGetFieldText("dsn");
    var var_residente = scAjaxGetFieldText("residente");
    var var_medio_contacto = scAjaxGetFieldText("medio_contacto");
    var var_separacion_bienes = scAjaxGetFieldText("separacion_bienes");
    var var_disolucion_conyugal = scAjaxGetFieldText("disolucion_conyugal");
    var var_capitulaciones = scAjaxGetFieldText("capitulaciones");
    var var_numero_carga_familiar = scAjaxGetFieldText("numero_carga_familiar");
    var var_nivel_educacion = scAjaxGetFieldText("nivel_educacion");
    var var_profesion = scAjaxGetFieldText("profesion");
    var var_envio_correspondencia = scAjaxGetFieldText("envio_correspondencia");
    var var_nombre_arrendador = scAjaxGetFieldText("nombre_arrendador");
    var var_apellido_arrendador = scAjaxGetFieldText("apellido_arrendador");
    var var_id_vivienda = scAjaxGetFieldText("id_vivienda");
    var var_telefono_arrendador = scAjaxGetFieldText("telefono_arrendador");
    var var_nombres_referencia = scAjaxGetFieldText("nombres_referencia");
    var var_apellidos_referencia = scAjaxGetFieldText("apellidos_referencia");
    var var_parentesco = scAjaxGetFieldText("parentesco");
    var var_celular_ref = scAjaxGetFieldText("celular_ref");
    var var_telefono_convencional_ref = scAjaxGetFieldText("telefono_convencional_ref");
    var var_id_ocupacion = scAjaxGetFieldText("id_ocupacion");
    var var_fecha_ingreso_empresa = scAjaxGetFieldText("fecha_ingreso_empresa");
    var var_nombre_empresa = scAjaxGetFieldText("nombre_empresa");
    var var_ciudad_empresa = scAjaxGetFieldText("ciudad_empresa");
    var var_provincia_empresa = scAjaxGetFieldText("provincia_empresa");
    var var_direccion_empresa = scAjaxGetFieldText("direccion_empresa");
    var var_cargo_empresa = scAjaxGetFieldText("cargo_empresa");
    var var_telefono_empresa = scAjaxGetFieldText("telefono_empresa");
    var var_ext_empresa = scAjaxGetFieldText("ext_empresa");
    var var_id_tipo_contrato_actividad = scAjaxGetFieldText("id_tipo_contrato_actividad");
    var var_empresa_jubilo_actividad = scAjaxGetFieldText("empresa_jubilo_actividad");
    var var_fecha_salida_empresa_actividad = scAjaxGetFieldText("fecha_salida_empresa_actividad");
    var var_cargo_salida_empresa_actividad = scAjaxGetFieldText("cargo_salida_empresa_actividad");
    var var_fecha_inicio_actividad = scAjaxGetFieldText("fecha_inicio_actividad");
    var var_fecha_ingreso_empresa_actividad = scAjaxGetFieldText("fecha_ingreso_empresa_actividad");
    var var_nombre_empresa_actividad = scAjaxGetFieldText("nombre_empresa_actividad");
    var var_institucion_actividad = scAjaxGetFieldText("institucion_actividad");
    var var_ciudad_actividad = scAjaxGetFieldText("ciudad_actividad");
    var var_provincia_actividad = scAjaxGetFieldText("provincia_actividad");
    var var_direccion_actividad = scAjaxGetFieldText("direccion_actividad");
    var var_calle_principal_actividad = scAjaxGetFieldText("calle_principal_actividad");
    var var_no_actividad = scAjaxGetFieldText("no_actividad");
    var var_calle_secundaria_actividad = scAjaxGetFieldText("calle_secundaria_actividad");
    var var_sector_actividad = scAjaxGetFieldText("sector_actividad");
    var var_pais_actividad = scAjaxGetFieldText("pais_actividad");
    var var_actividad = scAjaxGetFieldText("actividad");
    var var_telefono_actividad = scAjaxGetFieldText("telefono_actividad");
    var var_cargo_actividad = scAjaxGetFieldText("cargo_actividad");
    var var_ext_actividad = scAjaxGetFieldText("ext_actividad");
    var var_fecha_ingreso_empresa_actividad2 = scAjaxGetFieldText("fecha_ingreso_empresa_actividad2");
    var var_nombre_empresa_actividad2 = scAjaxGetFieldText("nombre_empresa_actividad2");
    var var_institucion_actividad2 = scAjaxGetFieldText("institucion_actividad2");
    var var_ciudad_actividad2 = scAjaxGetFieldText("ciudad_actividad2");
    var var_provincia_actividad2 = scAjaxGetFieldText("provincia_actividad2");
    var var_direccion_actividad2 = scAjaxGetFieldText("direccion_actividad2");
    var var_calle_principal_actividad2 = scAjaxGetFieldText("calle_principal_actividad2");
    var var_no_actividad2 = scAjaxGetFieldText("no_actividad2");
    var var_calle_secundaria_actividad2 = scAjaxGetFieldText("calle_secundaria_actividad2");
    var var_sector_actividad2 = scAjaxGetFieldText("sector_actividad2");
    var var_fecha_salida_empresa_actividad2 = scAjaxGetFieldText("fecha_salida_empresa_actividad2");
    var var_fecha_inicio_actividad2 = scAjaxGetFieldText("fecha_inicio_actividad2");
    var var_actividad2 = scAjaxGetFieldText("actividad2");
    var var_telefono_actividad2 = scAjaxGetFieldText("telefono_actividad2");
    var var_ext_actividad2 = scAjaxGetFieldText("ext_actividad2");
    var var_cargo_actividad2 = scAjaxGetFieldText("cargo_actividad2");
    var var_id_tipo_contrato_actividad2 = scAjaxGetFieldText("id_tipo_contrato_actividad2");
    var var_empresa_jubilo_actividad2 = scAjaxGetFieldText("empresa_jubilo_actividad2");
    var var_sueldo = scAjaxGetFieldText("sueldo");
    var var_arriendos = scAjaxGetFieldText("arriendos");
    var var_dividendo_utilidades_ultimo_ano = scAjaxGetFieldText("dividendo_utilidades_ultimo_ano");
    var var_id_otros_ingresos = scAjaxGetFieldText("id_otros_ingresos");
    var var_arriendo_hipoteca = scAjaxGetFieldText("arriendo_hipoteca");
    var var_prestamos = scAjaxGetFieldText("prestamos");
    var var_tarjetas_creditos = scAjaxGetFieldText("tarjetas_creditos");
    var var_gastos_familiares = scAjaxGetFieldText("gastos_familiares");
    var var_id_otros_gastos = scAjaxGetFieldText("id_otros_gastos");
    var var_depositos_bancos = scAjaxGetFieldText("depositos_bancos");
    var var_cuentas_documentos = scAjaxGetFieldText("cuentas_documentos");
    var var_mercaderias = scAjaxGetFieldText("mercaderias");
    var var_maquinarias_vehiculos = scAjaxGetFieldText("maquinarias_vehiculos");
    var var_terrenos_edificios = scAjaxGetFieldText("terrenos_edificios");
    var var_acciones_bonos_cedulas = scAjaxGetFieldText("acciones_bonos_cedulas");
    var var_id_otros_activos = scAjaxGetFieldText("id_otros_activos");
    var var_cuentas_por_pagar = scAjaxGetFieldText("cuentas_por_pagar");
    var var_prestamos_banco_menos_ano = scAjaxGetFieldText("prestamos_banco_menos_ano");
    var var_prestamos_banco_mas_ano = scAjaxGetFieldText("prestamos_banco_mas_ano");
    var var_deudas_tarjetas_creditos = scAjaxGetFieldText("deudas_tarjetas_creditos");
    var var_id_otras_obligaciones = scAjaxGetFieldText("id_otras_obligaciones");
    var var_deudor = scAjaxGetFieldText("deudor");
    var var_monto = scAjaxGetFieldText("monto");
    var var_descripcion = scAjaxGetFieldText("descripcion");
    var var_placa = scAjaxGetFieldText("placa");
    var var_valor_maquinaria_vehiculo = scAjaxGetFieldText("valor_maquinaria_vehiculo");
    var var_a_nombre_de = scAjaxGetFieldText("a_nombre_de");
    var var_ubicacion = scAjaxGetFieldText("ubicacion");
    var var_valor_propiedad = scAjaxGetFieldText("valor_propiedad");
    var var_empresa = scAjaxGetFieldText("empresa");
    var var_valor_mercado = scAjaxGetFieldText("valor_mercado");
    var var_institucion_bancaria = scAjaxGetFieldText("institucion_bancaria");
    var var_monto_banco = scAjaxGetFieldText("monto_banco");
    var var_institucion_finaciera = scAjaxGetFieldText("institucion_finaciera");
    var var_monto_institucion_finaciera = scAjaxGetFieldText("monto_institucion_finaciera");
    var var_id_cliente_juridico = scAjaxGetFieldText("id_cliente_juridico");
    var var_nombre_completo_empresa = scAjaxGetFieldText("nombre_completo_empresa");
    var var_es_empresa_extranjera = scAjaxGetFieldText("es_empresa_extranjera");
    var var_pais_empresa = scAjaxGetFieldText("pais_empresa");
    var var_fecha_constitucion_empresa = scAjaxGetFieldText("fecha_constitucion_empresa");
    var var_id_oficina = scAjaxGetFieldText("id_oficina");
    var var_id_tipo_actividad = scAjaxGetFieldText("id_tipo_actividad");
    var var_especifique_otros = scAjaxGetFieldText("especifique_otros");
    var var_direccion_correspondencia = scAjaxGetFieldText("direccion_correspondencia");
    var var_calle_principal_correspondencia = scAjaxGetFieldText("calle_principal_correspondencia");
    var var_no_correspondencia = scAjaxGetFieldText("no_correspondencia");
    var var_calle_secundaria_correspondencia = scAjaxGetFieldText("calle_secundaria_correspondencia");
    var var_id_ciudad_correspondencia = scAjaxGetFieldText("id_ciudad_correspondencia");
    var var_nombre_empresa_solicitante = scAjaxGetFieldText("nombre_empresa_solicitante");
    var var_cargo_empresa_solicitante = scAjaxGetFieldText("cargo_empresa_solicitante");
    var var_celular_empresa_solicitante = scAjaxGetFieldText("celular_empresa_solicitante");
    var var_telefono_empresa_solicitante = scAjaxGetFieldText("telefono_empresa_solicitante");
    var var_mail_empresa_solicitante = scAjaxGetFieldText("mail_empresa_solicitante");
    var var_saldo_empresa_solicitante = scAjaxGetFieldText("saldo_empresa_solicitante");
    var var_nombre_referencia_comerciales = scAjaxGetFieldText("nombre_referencia_comerciales");
    var var_fecha_compra = scAjaxGetFieldText("fecha_compra");
    var var_telefono_referencia_comerciales = scAjaxGetFieldText("telefono_referencia_comerciales");
    var var_ventas = scAjaxGetFieldText("ventas");
    var var_comisiones = scAjaxGetFieldText("comisiones");
    var var_gastos_operativos = scAjaxGetFieldText("gastos_operativos");
    var var_gastos_administrativos = scAjaxGetFieldText("gastos_administrativos");
    var var_pago_cuotas_prestamo = scAjaxGetFieldText("pago_cuotas_prestamo");
    var var_funcionario = scAjaxGetFieldText("funcionario");
    var var_funcionario_detalle = scAjaxGetFieldText("funcionario_detalle");
    var var_miembro_politico = scAjaxGetFieldText("miembro_politico");
    var var_miembro_politico_detalle = scAjaxGetFieldText("miembro_politico_detalle");
    var var_ejecutivo_gobierno = scAjaxGetFieldText("ejecutivo_gobierno");
    var var_ejecutivo_gobierno_detalle = scAjaxGetFieldText("ejecutivo_gobierno_detalle");
    var var_familiar_gobierno = scAjaxGetFieldText("familiar_gobierno");
    var var_familiar_gobierno_detalle = scAjaxGetFieldText("familiar_gobierno_detalle");
    var var_familiar_gobierno_detalle_quien = scAjaxGetFieldText("familiar_gobierno_detalle_quien");
    var var_otros_ingresos = scAjaxGetFieldText("otros_ingresos");
    var var_otros_gastos = scAjaxGetFieldText("otros_gastos");
    var var_otros_activos = scAjaxGetFieldText("otros_activos");
    var var_otras_obligaciones = scAjaxGetFieldText("otras_obligaciones");
    var var_sector_direccion_empresa = scAjaxGetFieldText("sector_direccion_empresa");
    var var_sector_direccion_empresa_correo = scAjaxGetFieldText("sector_direccion_empresa_correo");
    var var_extranjero_nombres_referencia = scAjaxGetFieldText("extranjero_nombres_referencia");
    var var_extranjero_apellidos_referencia = scAjaxGetFieldText("extranjero_apellidos_referencia");
    var var_extranjero_parentesco = scAjaxGetFieldText("extranjero_parentesco");
    var var_extranjero_celular_ref = scAjaxGetFieldText("extranjero_celular_ref");
    var var_extranjero_telefono_convencional_ref = scAjaxGetFieldText("extranjero_telefono_convencional_ref");
    var var_cargo_representante_legal = scAjaxGetFieldText("cargo_representante_legal");
    var var_direccion_extranjero = scAjaxGetFieldText("direccion_extranjero");
    var var_relacion_dependencia_principal = scAjaxGetFieldText("relacion_dependencia_principal");
    var var_correo_corporativo_principal = scAjaxGetFieldText("correo_corporativo_principal");
    var var_relacion_dependencia_secundaria = scAjaxGetFieldText("relacion_dependencia_secundaria");
    var var_correo_corporativo_secundario = scAjaxGetFieldText("correo_corporativo_secundario");
    var var_actividad_secundaria = scAjaxGetFieldText("actividad_secundaria");
    var var_id_pais_empresa = scAjaxGetFieldText("id_pais_empresa");
    var var_id_provincia_empresa = scAjaxGetFieldText("id_provincia_empresa");
    var var_id_pais_correo = scAjaxGetFieldText("id_pais_correo");
    var var_id_provincia_correo = scAjaxGetFieldText("id_provincia_correo");
    var var_apellido_empresa_solicitante = scAjaxGetFieldText("apellido_empresa_solicitante");
    var var_pais_actividad2 = scAjaxGetFieldText("pais_actividad2");
    var var_id_provincia_exterior = scAjaxGetFieldText("id_provincia_exterior");
    var var_pais_independiente = scAjaxGetFieldText("pais_independiente");
    var var_tipo_contrato_otros_actividad_principal = scAjaxGetFieldText("tipo_contrato_otros_actividad_principal");
    var var_actividadeconomica = scAjaxGetFieldText("actividadeconomica");
    var var_clasesujeto = scAjaxGetFieldText("clasesujeto");
    var var_provincia = scAjaxGetFieldText("provincia");
    var var_parroquia = scAjaxGetFieldText("parroquia");
    var var_canton = scAjaxGetFieldText("canton");
    var var_demandajudicial = scAjaxGetFieldText("demandajudicial");
    var var_vdemandajudicial = scAjaxGetFieldText("vdemandajudicial");
    var var_carteracastigada = scAjaxGetFieldText("carteracastigada");
    var var_vcarteracastigada = scAjaxGetFieldText("vcarteracastigada");
    var var_accesoexterno01 = scAjaxGetFieldText("accesoexterno01");
    var var_referencia = scAjaxGetFieldText("referencia");
    var var_id_pais_empleado_dir_desempeno = scAjaxGetFieldText("id_pais_empleado_dir_desempeno");
    var var_id_provincia_empleado_dir_desempeno = scAjaxGetFieldText("id_provincia_empleado_dir_desempeno");
    var var_id_ciudad_empleado_dir_desempeno = scAjaxGetFieldText("id_ciudad_empleado_dir_desempeno");
    var var_razon_social = scAjaxGetFieldText("razon_social");
    var var_parterel01 = scAjaxGetFieldText("parterel01");
    var var_origen_fondos = scAjaxGetFieldText("origen_fondos");
    var var_tipo_identificacion = scAjaxGetFieldText("tipo_identificacion");
    var var_id_actividad = scAjaxGetFieldText("id_actividad");
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_form_maecte_mob_submit_form(var_codcte01, var_tipo_cliente, var_id_nacionalidad, var_nomcte01, var_primer_nombre, var_segundo_nombre, var_primer_apellido, var_segundo_apellido, var_cv1cte01, var_cv2cte01, var_tipcte01, var_ofienccte01, var_vendcte01, var_cobrcte01, var_loccte01, var_dircte01, var_sector, var_calle_principal, var_no, var_calle_secundaria, var_id_pais, var_id_provincia, var_id_ciudad, var_id_canton, var_telcte01, var_cascte01, var_ci_conyuge, var_conyuge_tipo_identidad, var_conyuge_primer_nombre, var_conyuge_segundo_nombre, var_conyuge_primer_apellido, var_conyuge_segundo_apellido, var_conyuge_profesion, var_id_tipo_documento, var_repleg01, var_fecing01, var_condpag01, var_desctocte01, var_limcred01, var_desppar01, var_cheqpro01, var_sdoeje01, var_sdoant01, var_sdoact01, var_acudbm01, var_acucrm01, var_acudbe01, var_acucre01, var_comentcte01, var_statuscte01, var_identcte01, var_cordcte01, var_limcant01, var_pagleg01, var_telcte01b, var_telcte01c, var_emailcte01, var_calle_principal_exterior, var_no_exterior, var_calle_secundaria_exterior, var_id_pais_exterior, var_id_ciudad_exterior, var_codigo_postal_exterior, var_sector_exterior, var_telefono_exterior, var_celular_exterior, var_email_exterior, var_emailaltcte01, var_ctacgcte01, var_obsercte01, var_totexceso01, var_imagencte01, var_block, var_uid, var_ultimoacceso, var_idcli, var_catcte01, var_transferido, var_password, var_showroom, var_orden, var_website, var_longitud01, var_latitud01, var_zoom01, var_acceder, var_coniva01, var_idemp01, var_codprov01, var_celular01, var_dircliente01, var_razcte01, var_ruc01, var_timenegocio01, var_refbanc01, var_refcom01, var_tarjcred01, var_firmaut01, var_precte01, var_cuotasven01, var_diasven01, var_fechanace01, var_sexo01, var_estadocivil01, var_dirgestion01, var_numhijos01, var_estsop01, var_notick01, var_chequece, var_solcre, var_promocte01, var_pagare01, var_valorpagare01, var_garante01, var_fecvenp01, var_ctacgant01, var_dsn, var_residente, var_medio_contacto, var_separacion_bienes, var_disolucion_conyugal, var_capitulaciones, var_numero_carga_familiar, var_nivel_educacion, var_profesion, var_envio_correspondencia, var_nombre_arrendador, var_apellido_arrendador, var_id_vivienda, var_telefono_arrendador, var_nombres_referencia, var_apellidos_referencia, var_parentesco, var_celular_ref, var_telefono_convencional_ref, var_id_ocupacion, var_fecha_ingreso_empresa, var_nombre_empresa, var_ciudad_empresa, var_provincia_empresa, var_direccion_empresa, var_cargo_empresa, var_telefono_empresa, var_ext_empresa, var_id_tipo_contrato_actividad, var_empresa_jubilo_actividad, var_fecha_salida_empresa_actividad, var_cargo_salida_empresa_actividad, var_fecha_inicio_actividad, var_fecha_ingreso_empresa_actividad, var_nombre_empresa_actividad, var_institucion_actividad, var_ciudad_actividad, var_provincia_actividad, var_direccion_actividad, var_calle_principal_actividad, var_no_actividad, var_calle_secundaria_actividad, var_sector_actividad, var_pais_actividad, var_actividad, var_telefono_actividad, var_cargo_actividad, var_ext_actividad, var_fecha_ingreso_empresa_actividad2, var_nombre_empresa_actividad2, var_institucion_actividad2, var_ciudad_actividad2, var_provincia_actividad2, var_direccion_actividad2, var_calle_principal_actividad2, var_no_actividad2, var_calle_secundaria_actividad2, var_sector_actividad2, var_fecha_salida_empresa_actividad2, var_fecha_inicio_actividad2, var_actividad2, var_telefono_actividad2, var_ext_actividad2, var_cargo_actividad2, var_id_tipo_contrato_actividad2, var_empresa_jubilo_actividad2, var_sueldo, var_arriendos, var_dividendo_utilidades_ultimo_ano, var_id_otros_ingresos, var_arriendo_hipoteca, var_prestamos, var_tarjetas_creditos, var_gastos_familiares, var_id_otros_gastos, var_depositos_bancos, var_cuentas_documentos, var_mercaderias, var_maquinarias_vehiculos, var_terrenos_edificios, var_acciones_bonos_cedulas, var_id_otros_activos, var_cuentas_por_pagar, var_prestamos_banco_menos_ano, var_prestamos_banco_mas_ano, var_deudas_tarjetas_creditos, var_id_otras_obligaciones, var_deudor, var_monto, var_descripcion, var_placa, var_valor_maquinaria_vehiculo, var_a_nombre_de, var_ubicacion, var_valor_propiedad, var_empresa, var_valor_mercado, var_institucion_bancaria, var_monto_banco, var_institucion_finaciera, var_monto_institucion_finaciera, var_id_cliente_juridico, var_nombre_completo_empresa, var_es_empresa_extranjera, var_pais_empresa, var_fecha_constitucion_empresa, var_id_oficina, var_id_tipo_actividad, var_especifique_otros, var_direccion_correspondencia, var_calle_principal_correspondencia, var_no_correspondencia, var_calle_secundaria_correspondencia, var_id_ciudad_correspondencia, var_nombre_empresa_solicitante, var_cargo_empresa_solicitante, var_celular_empresa_solicitante, var_telefono_empresa_solicitante, var_mail_empresa_solicitante, var_saldo_empresa_solicitante, var_nombre_referencia_comerciales, var_fecha_compra, var_telefono_referencia_comerciales, var_ventas, var_comisiones, var_gastos_operativos, var_gastos_administrativos, var_pago_cuotas_prestamo, var_funcionario, var_funcionario_detalle, var_miembro_politico, var_miembro_politico_detalle, var_ejecutivo_gobierno, var_ejecutivo_gobierno_detalle, var_familiar_gobierno, var_familiar_gobierno_detalle, var_familiar_gobierno_detalle_quien, var_otros_ingresos, var_otros_gastos, var_otros_activos, var_otras_obligaciones, var_sector_direccion_empresa, var_sector_direccion_empresa_correo, var_extranjero_nombres_referencia, var_extranjero_apellidos_referencia, var_extranjero_parentesco, var_extranjero_celular_ref, var_extranjero_telefono_convencional_ref, var_cargo_representante_legal, var_direccion_extranjero, var_relacion_dependencia_principal, var_correo_corporativo_principal, var_relacion_dependencia_secundaria, var_correo_corporativo_secundario, var_actividad_secundaria, var_id_pais_empresa, var_id_provincia_empresa, var_id_pais_correo, var_id_provincia_correo, var_apellido_empresa_solicitante, var_pais_actividad2, var_id_provincia_exterior, var_pais_independiente, var_tipo_contrato_otros_actividad_principal, var_actividadeconomica, var_clasesujeto, var_provincia, var_parroquia, var_canton, var_demandajudicial, var_vdemandajudicial, var_carteracastigada, var_vcarteracastigada, var_accesoexterno01, var_referencia, var_id_pais_empleado_dir_desempeno, var_id_provincia_empleado_dir_desempeno, var_id_ciudad_empleado_dir_desempeno, var_razon_social, var_parterel01, var_origen_fondos, var_tipo_identificacion, var_id_actividad, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_form_maecte_mob_submit_form_cb);
  } // do_ajax_form_maecte_mob_submit_form

  function do_ajax_form_maecte_mob_submit_form_cb(sResp)
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
      scAjaxHideErrorDisplay("codcte01");
      scAjaxHideErrorDisplay("tipo_cliente");
      scAjaxHideErrorDisplay("id_nacionalidad");
      scAjaxHideErrorDisplay("nomcte01");
      scAjaxHideErrorDisplay("primer_nombre");
      scAjaxHideErrorDisplay("segundo_nombre");
      scAjaxHideErrorDisplay("primer_apellido");
      scAjaxHideErrorDisplay("segundo_apellido");
      scAjaxHideErrorDisplay("cv1cte01");
      scAjaxHideErrorDisplay("cv2cte01");
      scAjaxHideErrorDisplay("tipcte01");
      scAjaxHideErrorDisplay("ofienccte01");
      scAjaxHideErrorDisplay("vendcte01");
      scAjaxHideErrorDisplay("cobrcte01");
      scAjaxHideErrorDisplay("loccte01");
      scAjaxHideErrorDisplay("dircte01");
      scAjaxHideErrorDisplay("sector");
      scAjaxHideErrorDisplay("calle_principal");
      scAjaxHideErrorDisplay("no");
      scAjaxHideErrorDisplay("calle_secundaria");
      scAjaxHideErrorDisplay("id_pais");
      scAjaxHideErrorDisplay("id_provincia");
      scAjaxHideErrorDisplay("id_ciudad");
      scAjaxHideErrorDisplay("id_canton");
      scAjaxHideErrorDisplay("telcte01");
      scAjaxHideErrorDisplay("cascte01");
      scAjaxHideErrorDisplay("ci_conyuge");
      scAjaxHideErrorDisplay("conyuge_tipo_identidad");
      scAjaxHideErrorDisplay("conyuge_primer_nombre");
      scAjaxHideErrorDisplay("conyuge_segundo_nombre");
      scAjaxHideErrorDisplay("conyuge_primer_apellido");
      scAjaxHideErrorDisplay("conyuge_segundo_apellido");
      scAjaxHideErrorDisplay("conyuge_profesion");
      scAjaxHideErrorDisplay("id_tipo_documento");
      scAjaxHideErrorDisplay("repleg01");
      scAjaxHideErrorDisplay("fecing01");
      scAjaxHideErrorDisplay("condpag01");
      scAjaxHideErrorDisplay("desctocte01");
      scAjaxHideErrorDisplay("limcred01");
      scAjaxHideErrorDisplay("desppar01");
      scAjaxHideErrorDisplay("cheqpro01");
      scAjaxHideErrorDisplay("sdoeje01");
      scAjaxHideErrorDisplay("sdoant01");
      scAjaxHideErrorDisplay("sdoact01");
      scAjaxHideErrorDisplay("acudbm01");
      scAjaxHideErrorDisplay("acucrm01");
      scAjaxHideErrorDisplay("acudbe01");
      scAjaxHideErrorDisplay("acucre01");
      scAjaxHideErrorDisplay("comentcte01");
      scAjaxHideErrorDisplay("statuscte01");
      scAjaxHideErrorDisplay("identcte01");
      scAjaxHideErrorDisplay("cordcte01");
      scAjaxHideErrorDisplay("limcant01");
      scAjaxHideErrorDisplay("pagleg01");
      scAjaxHideErrorDisplay("telcte01b");
      scAjaxHideErrorDisplay("telcte01c");
      scAjaxHideErrorDisplay("emailcte01");
      scAjaxHideErrorDisplay("calle_principal_exterior");
      scAjaxHideErrorDisplay("no_exterior");
      scAjaxHideErrorDisplay("calle_secundaria_exterior");
      scAjaxHideErrorDisplay("id_pais_exterior");
      scAjaxHideErrorDisplay("id_ciudad_exterior");
      scAjaxHideErrorDisplay("codigo_postal_exterior");
      scAjaxHideErrorDisplay("sector_exterior");
      scAjaxHideErrorDisplay("telefono_exterior");
      scAjaxHideErrorDisplay("celular_exterior");
      scAjaxHideErrorDisplay("email_exterior");
      scAjaxHideErrorDisplay("emailaltcte01");
      scAjaxHideErrorDisplay("ctacgcte01");
      scAjaxHideErrorDisplay("obsercte01");
      scAjaxHideErrorDisplay("totexceso01");
      scAjaxHideErrorDisplay("imagencte01");
      scAjaxHideErrorDisplay("block");
      scAjaxHideErrorDisplay("uid");
      scAjaxHideErrorDisplay("ultimoacceso");
      scAjaxHideErrorDisplay("idcli");
      scAjaxHideErrorDisplay("catcte01");
      scAjaxHideErrorDisplay("transferido");
      scAjaxHideErrorDisplay("password");
      scAjaxHideErrorDisplay("showroom");
      scAjaxHideErrorDisplay("orden");
      scAjaxHideErrorDisplay("website");
      scAjaxHideErrorDisplay("longitud01");
      scAjaxHideErrorDisplay("latitud01");
      scAjaxHideErrorDisplay("zoom01");
      scAjaxHideErrorDisplay("acceder");
      scAjaxHideErrorDisplay("coniva01");
      scAjaxHideErrorDisplay("idemp01");
      scAjaxHideErrorDisplay("codprov01");
      scAjaxHideErrorDisplay("celular01");
      scAjaxHideErrorDisplay("dircliente01");
      scAjaxHideErrorDisplay("razcte01");
      scAjaxHideErrorDisplay("ruc01");
      scAjaxHideErrorDisplay("timenegocio01");
      scAjaxHideErrorDisplay("refbanc01");
      scAjaxHideErrorDisplay("refcom01");
      scAjaxHideErrorDisplay("tarjcred01");
      scAjaxHideErrorDisplay("firmaut01");
      scAjaxHideErrorDisplay("precte01");
      scAjaxHideErrorDisplay("cuotasven01");
      scAjaxHideErrorDisplay("diasven01");
      scAjaxHideErrorDisplay("fechanace01");
      scAjaxHideErrorDisplay("sexo01");
      scAjaxHideErrorDisplay("estadocivil01");
      scAjaxHideErrorDisplay("dirgestion01");
      scAjaxHideErrorDisplay("numhijos01");
      scAjaxHideErrorDisplay("estsop01");
      scAjaxHideErrorDisplay("notick01");
      scAjaxHideErrorDisplay("chequece");
      scAjaxHideErrorDisplay("solcre");
      scAjaxHideErrorDisplay("promocte01");
      scAjaxHideErrorDisplay("pagare01");
      scAjaxHideErrorDisplay("valorpagare01");
      scAjaxHideErrorDisplay("garante01");
      scAjaxHideErrorDisplay("fecvenp01");
      scAjaxHideErrorDisplay("ctacgant01");
      scAjaxHideErrorDisplay("dsn");
      scAjaxHideErrorDisplay("residente");
      scAjaxHideErrorDisplay("medio_contacto");
      scAjaxHideErrorDisplay("separacion_bienes");
      scAjaxHideErrorDisplay("disolucion_conyugal");
      scAjaxHideErrorDisplay("capitulaciones");
      scAjaxHideErrorDisplay("numero_carga_familiar");
      scAjaxHideErrorDisplay("nivel_educacion");
      scAjaxHideErrorDisplay("profesion");
      scAjaxHideErrorDisplay("envio_correspondencia");
      scAjaxHideErrorDisplay("nombre_arrendador");
      scAjaxHideErrorDisplay("apellido_arrendador");
      scAjaxHideErrorDisplay("id_vivienda");
      scAjaxHideErrorDisplay("telefono_arrendador");
      scAjaxHideErrorDisplay("nombres_referencia");
      scAjaxHideErrorDisplay("apellidos_referencia");
      scAjaxHideErrorDisplay("parentesco");
      scAjaxHideErrorDisplay("celular_ref");
      scAjaxHideErrorDisplay("telefono_convencional_ref");
      scAjaxHideErrorDisplay("id_ocupacion");
      scAjaxHideErrorDisplay("fecha_ingreso_empresa");
      scAjaxHideErrorDisplay("nombre_empresa");
      scAjaxHideErrorDisplay("ciudad_empresa");
      scAjaxHideErrorDisplay("provincia_empresa");
      scAjaxHideErrorDisplay("direccion_empresa");
      scAjaxHideErrorDisplay("cargo_empresa");
      scAjaxHideErrorDisplay("telefono_empresa");
      scAjaxHideErrorDisplay("ext_empresa");
      scAjaxHideErrorDisplay("id_tipo_contrato_actividad");
      scAjaxHideErrorDisplay("empresa_jubilo_actividad");
      scAjaxHideErrorDisplay("fecha_salida_empresa_actividad");
      scAjaxHideErrorDisplay("cargo_salida_empresa_actividad");
      scAjaxHideErrorDisplay("fecha_inicio_actividad");
      scAjaxHideErrorDisplay("fecha_ingreso_empresa_actividad");
      scAjaxHideErrorDisplay("nombre_empresa_actividad");
      scAjaxHideErrorDisplay("institucion_actividad");
      scAjaxHideErrorDisplay("ciudad_actividad");
      scAjaxHideErrorDisplay("provincia_actividad");
      scAjaxHideErrorDisplay("direccion_actividad");
      scAjaxHideErrorDisplay("calle_principal_actividad");
      scAjaxHideErrorDisplay("no_actividad");
      scAjaxHideErrorDisplay("calle_secundaria_actividad");
      scAjaxHideErrorDisplay("sector_actividad");
      scAjaxHideErrorDisplay("pais_actividad");
      scAjaxHideErrorDisplay("actividad");
      scAjaxHideErrorDisplay("telefono_actividad");
      scAjaxHideErrorDisplay("cargo_actividad");
      scAjaxHideErrorDisplay("ext_actividad");
      scAjaxHideErrorDisplay("fecha_ingreso_empresa_actividad2");
      scAjaxHideErrorDisplay("nombre_empresa_actividad2");
      scAjaxHideErrorDisplay("institucion_actividad2");
      scAjaxHideErrorDisplay("ciudad_actividad2");
      scAjaxHideErrorDisplay("provincia_actividad2");
      scAjaxHideErrorDisplay("direccion_actividad2");
      scAjaxHideErrorDisplay("calle_principal_actividad2");
      scAjaxHideErrorDisplay("no_actividad2");
      scAjaxHideErrorDisplay("calle_secundaria_actividad2");
      scAjaxHideErrorDisplay("sector_actividad2");
      scAjaxHideErrorDisplay("fecha_salida_empresa_actividad2");
      scAjaxHideErrorDisplay("fecha_inicio_actividad2");
      scAjaxHideErrorDisplay("actividad2");
      scAjaxHideErrorDisplay("telefono_actividad2");
      scAjaxHideErrorDisplay("ext_actividad2");
      scAjaxHideErrorDisplay("cargo_actividad2");
      scAjaxHideErrorDisplay("id_tipo_contrato_actividad2");
      scAjaxHideErrorDisplay("empresa_jubilo_actividad2");
      scAjaxHideErrorDisplay("sueldo");
      scAjaxHideErrorDisplay("arriendos");
      scAjaxHideErrorDisplay("dividendo_utilidades_ultimo_ano");
      scAjaxHideErrorDisplay("id_otros_ingresos");
      scAjaxHideErrorDisplay("arriendo_hipoteca");
      scAjaxHideErrorDisplay("prestamos");
      scAjaxHideErrorDisplay("tarjetas_creditos");
      scAjaxHideErrorDisplay("gastos_familiares");
      scAjaxHideErrorDisplay("id_otros_gastos");
      scAjaxHideErrorDisplay("depositos_bancos");
      scAjaxHideErrorDisplay("cuentas_documentos");
      scAjaxHideErrorDisplay("mercaderias");
      scAjaxHideErrorDisplay("maquinarias_vehiculos");
      scAjaxHideErrorDisplay("terrenos_edificios");
      scAjaxHideErrorDisplay("acciones_bonos_cedulas");
      scAjaxHideErrorDisplay("id_otros_activos");
      scAjaxHideErrorDisplay("cuentas_por_pagar");
      scAjaxHideErrorDisplay("prestamos_banco_menos_ano");
      scAjaxHideErrorDisplay("prestamos_banco_mas_ano");
      scAjaxHideErrorDisplay("deudas_tarjetas_creditos");
      scAjaxHideErrorDisplay("id_otras_obligaciones");
      scAjaxHideErrorDisplay("deudor");
      scAjaxHideErrorDisplay("monto");
      scAjaxHideErrorDisplay("descripcion");
      scAjaxHideErrorDisplay("placa");
      scAjaxHideErrorDisplay("valor_maquinaria_vehiculo");
      scAjaxHideErrorDisplay("a_nombre_de");
      scAjaxHideErrorDisplay("ubicacion");
      scAjaxHideErrorDisplay("valor_propiedad");
      scAjaxHideErrorDisplay("empresa");
      scAjaxHideErrorDisplay("valor_mercado");
      scAjaxHideErrorDisplay("institucion_bancaria");
      scAjaxHideErrorDisplay("monto_banco");
      scAjaxHideErrorDisplay("institucion_finaciera");
      scAjaxHideErrorDisplay("monto_institucion_finaciera");
      scAjaxHideErrorDisplay("id_cliente_juridico");
      scAjaxHideErrorDisplay("nombre_completo_empresa");
      scAjaxHideErrorDisplay("es_empresa_extranjera");
      scAjaxHideErrorDisplay("pais_empresa");
      scAjaxHideErrorDisplay("fecha_constitucion_empresa");
      scAjaxHideErrorDisplay("id_oficina");
      scAjaxHideErrorDisplay("id_tipo_actividad");
      scAjaxHideErrorDisplay("especifique_otros");
      scAjaxHideErrorDisplay("direccion_correspondencia");
      scAjaxHideErrorDisplay("calle_principal_correspondencia");
      scAjaxHideErrorDisplay("no_correspondencia");
      scAjaxHideErrorDisplay("calle_secundaria_correspondencia");
      scAjaxHideErrorDisplay("id_ciudad_correspondencia");
      scAjaxHideErrorDisplay("nombre_empresa_solicitante");
      scAjaxHideErrorDisplay("cargo_empresa_solicitante");
      scAjaxHideErrorDisplay("celular_empresa_solicitante");
      scAjaxHideErrorDisplay("telefono_empresa_solicitante");
      scAjaxHideErrorDisplay("mail_empresa_solicitante");
      scAjaxHideErrorDisplay("saldo_empresa_solicitante");
      scAjaxHideErrorDisplay("nombre_referencia_comerciales");
      scAjaxHideErrorDisplay("fecha_compra");
      scAjaxHideErrorDisplay("telefono_referencia_comerciales");
      scAjaxHideErrorDisplay("ventas");
      scAjaxHideErrorDisplay("comisiones");
      scAjaxHideErrorDisplay("gastos_operativos");
      scAjaxHideErrorDisplay("gastos_administrativos");
      scAjaxHideErrorDisplay("pago_cuotas_prestamo");
      scAjaxHideErrorDisplay("funcionario");
      scAjaxHideErrorDisplay("funcionario_detalle");
      scAjaxHideErrorDisplay("miembro_politico");
      scAjaxHideErrorDisplay("miembro_politico_detalle");
      scAjaxHideErrorDisplay("ejecutivo_gobierno");
      scAjaxHideErrorDisplay("ejecutivo_gobierno_detalle");
      scAjaxHideErrorDisplay("familiar_gobierno");
      scAjaxHideErrorDisplay("familiar_gobierno_detalle");
      scAjaxHideErrorDisplay("familiar_gobierno_detalle_quien");
      scAjaxHideErrorDisplay("otros_ingresos");
      scAjaxHideErrorDisplay("otros_gastos");
      scAjaxHideErrorDisplay("otros_activos");
      scAjaxHideErrorDisplay("otras_obligaciones");
      scAjaxHideErrorDisplay("sector_direccion_empresa");
      scAjaxHideErrorDisplay("sector_direccion_empresa_correo");
      scAjaxHideErrorDisplay("extranjero_nombres_referencia");
      scAjaxHideErrorDisplay("extranjero_apellidos_referencia");
      scAjaxHideErrorDisplay("extranjero_parentesco");
      scAjaxHideErrorDisplay("extranjero_celular_ref");
      scAjaxHideErrorDisplay("extranjero_telefono_convencional_ref");
      scAjaxHideErrorDisplay("cargo_representante_legal");
      scAjaxHideErrorDisplay("direccion_extranjero");
      scAjaxHideErrorDisplay("relacion_dependencia_principal");
      scAjaxHideErrorDisplay("correo_corporativo_principal");
      scAjaxHideErrorDisplay("relacion_dependencia_secundaria");
      scAjaxHideErrorDisplay("correo_corporativo_secundario");
      scAjaxHideErrorDisplay("actividad_secundaria");
      scAjaxHideErrorDisplay("id_pais_empresa");
      scAjaxHideErrorDisplay("id_provincia_empresa");
      scAjaxHideErrorDisplay("id_pais_correo");
      scAjaxHideErrorDisplay("id_provincia_correo");
      scAjaxHideErrorDisplay("apellido_empresa_solicitante");
      scAjaxHideErrorDisplay("pais_actividad2");
      scAjaxHideErrorDisplay("id_provincia_exterior");
      scAjaxHideErrorDisplay("pais_independiente");
      scAjaxHideErrorDisplay("tipo_contrato_otros_actividad_principal");
      scAjaxHideErrorDisplay("actividadeconomica");
      scAjaxHideErrorDisplay("clasesujeto");
      scAjaxHideErrorDisplay("provincia");
      scAjaxHideErrorDisplay("parroquia");
      scAjaxHideErrorDisplay("canton");
      scAjaxHideErrorDisplay("demandajudicial");
      scAjaxHideErrorDisplay("vdemandajudicial");
      scAjaxHideErrorDisplay("carteracastigada");
      scAjaxHideErrorDisplay("vcarteracastigada");
      scAjaxHideErrorDisplay("accesoexterno01");
      scAjaxHideErrorDisplay("referencia");
      scAjaxHideErrorDisplay("id_pais_empleado_dir_desempeno");
      scAjaxHideErrorDisplay("id_provincia_empleado_dir_desempeno");
      scAjaxHideErrorDisplay("id_ciudad_empleado_dir_desempeno");
      scAjaxHideErrorDisplay("razon_social");
      scAjaxHideErrorDisplay("parterel01");
      scAjaxHideErrorDisplay("origen_fondos");
      scAjaxHideErrorDisplay("tipo_identificacion");
      scAjaxHideErrorDisplay("id_actividad");
      scLigEditLookupCall();
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_maecte_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecte_mob']['dashboard_info']['under_dashboard']) {
?>
      var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecte_mob']['dashboard_info']['parent_widget']; ?>']");
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
    scAjaxAlert(do_ajax_form_maecte_mob_submit_form_cb_after_alert);
  } // do_ajax_form_maecte_mob_submit_form_cb
  function do_ajax_form_maecte_mob_submit_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_maecte_mob_submit_form_cb_after_alert

  var scStatusDetail = {};

  function do_ajax_form_maecte_mob_navigate_form()
  {
    if (scFormHasChanged) {
      scJs_confirm('<?php echo html_entity_decode($this->Ini->Nm_lang['lang_reload_confirm']) ?>', perform_ajax_form_maecte_mob_navigate_form, function() {});
    } else {
      perform_ajax_form_maecte_mob_navigate_form();
    }
  }

  function perform_ajax_form_maecte_mob_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
    scAjaxHideMessage();
    scAjaxHideErrorDisplay("table");
    scAjaxHideErrorDisplay("codcte01");
    scAjaxHideErrorDisplay("tipo_cliente");
    scAjaxHideErrorDisplay("id_nacionalidad");
    scAjaxHideErrorDisplay("nomcte01");
    scAjaxHideErrorDisplay("primer_nombre");
    scAjaxHideErrorDisplay("segundo_nombre");
    scAjaxHideErrorDisplay("primer_apellido");
    scAjaxHideErrorDisplay("segundo_apellido");
    scAjaxHideErrorDisplay("cv1cte01");
    scAjaxHideErrorDisplay("cv2cte01");
    scAjaxHideErrorDisplay("tipcte01");
    scAjaxHideErrorDisplay("ofienccte01");
    scAjaxHideErrorDisplay("vendcte01");
    scAjaxHideErrorDisplay("cobrcte01");
    scAjaxHideErrorDisplay("loccte01");
    scAjaxHideErrorDisplay("dircte01");
    scAjaxHideErrorDisplay("sector");
    scAjaxHideErrorDisplay("calle_principal");
    scAjaxHideErrorDisplay("no");
    scAjaxHideErrorDisplay("calle_secundaria");
    scAjaxHideErrorDisplay("id_pais");
    scAjaxHideErrorDisplay("id_provincia");
    scAjaxHideErrorDisplay("id_ciudad");
    scAjaxHideErrorDisplay("id_canton");
    scAjaxHideErrorDisplay("telcte01");
    scAjaxHideErrorDisplay("cascte01");
    scAjaxHideErrorDisplay("ci_conyuge");
    scAjaxHideErrorDisplay("conyuge_tipo_identidad");
    scAjaxHideErrorDisplay("conyuge_primer_nombre");
    scAjaxHideErrorDisplay("conyuge_segundo_nombre");
    scAjaxHideErrorDisplay("conyuge_primer_apellido");
    scAjaxHideErrorDisplay("conyuge_segundo_apellido");
    scAjaxHideErrorDisplay("conyuge_profesion");
    scAjaxHideErrorDisplay("id_tipo_documento");
    scAjaxHideErrorDisplay("repleg01");
    scAjaxHideErrorDisplay("fecing01");
    scAjaxHideErrorDisplay("condpag01");
    scAjaxHideErrorDisplay("desctocte01");
    scAjaxHideErrorDisplay("limcred01");
    scAjaxHideErrorDisplay("desppar01");
    scAjaxHideErrorDisplay("cheqpro01");
    scAjaxHideErrorDisplay("sdoeje01");
    scAjaxHideErrorDisplay("sdoant01");
    scAjaxHideErrorDisplay("sdoact01");
    scAjaxHideErrorDisplay("acudbm01");
    scAjaxHideErrorDisplay("acucrm01");
    scAjaxHideErrorDisplay("acudbe01");
    scAjaxHideErrorDisplay("acucre01");
    scAjaxHideErrorDisplay("comentcte01");
    scAjaxHideErrorDisplay("statuscte01");
    scAjaxHideErrorDisplay("identcte01");
    scAjaxHideErrorDisplay("cordcte01");
    scAjaxHideErrorDisplay("limcant01");
    scAjaxHideErrorDisplay("pagleg01");
    scAjaxHideErrorDisplay("telcte01b");
    scAjaxHideErrorDisplay("telcte01c");
    scAjaxHideErrorDisplay("emailcte01");
    scAjaxHideErrorDisplay("calle_principal_exterior");
    scAjaxHideErrorDisplay("no_exterior");
    scAjaxHideErrorDisplay("calle_secundaria_exterior");
    scAjaxHideErrorDisplay("id_pais_exterior");
    scAjaxHideErrorDisplay("id_ciudad_exterior");
    scAjaxHideErrorDisplay("codigo_postal_exterior");
    scAjaxHideErrorDisplay("sector_exterior");
    scAjaxHideErrorDisplay("telefono_exterior");
    scAjaxHideErrorDisplay("celular_exterior");
    scAjaxHideErrorDisplay("email_exterior");
    scAjaxHideErrorDisplay("emailaltcte01");
    scAjaxHideErrorDisplay("ctacgcte01");
    scAjaxHideErrorDisplay("obsercte01");
    scAjaxHideErrorDisplay("totexceso01");
    scAjaxHideErrorDisplay("imagencte01");
    scAjaxHideErrorDisplay("block");
    scAjaxHideErrorDisplay("uid");
    scAjaxHideErrorDisplay("ultimoacceso");
    scAjaxHideErrorDisplay("idcli");
    scAjaxHideErrorDisplay("catcte01");
    scAjaxHideErrorDisplay("transferido");
    scAjaxHideErrorDisplay("password");
    scAjaxHideErrorDisplay("showroom");
    scAjaxHideErrorDisplay("orden");
    scAjaxHideErrorDisplay("website");
    scAjaxHideErrorDisplay("longitud01");
    scAjaxHideErrorDisplay("latitud01");
    scAjaxHideErrorDisplay("zoom01");
    scAjaxHideErrorDisplay("acceder");
    scAjaxHideErrorDisplay("coniva01");
    scAjaxHideErrorDisplay("idemp01");
    scAjaxHideErrorDisplay("codprov01");
    scAjaxHideErrorDisplay("celular01");
    scAjaxHideErrorDisplay("dircliente01");
    scAjaxHideErrorDisplay("razcte01");
    scAjaxHideErrorDisplay("ruc01");
    scAjaxHideErrorDisplay("timenegocio01");
    scAjaxHideErrorDisplay("refbanc01");
    scAjaxHideErrorDisplay("refcom01");
    scAjaxHideErrorDisplay("tarjcred01");
    scAjaxHideErrorDisplay("firmaut01");
    scAjaxHideErrorDisplay("precte01");
    scAjaxHideErrorDisplay("cuotasven01");
    scAjaxHideErrorDisplay("diasven01");
    scAjaxHideErrorDisplay("fechanace01");
    scAjaxHideErrorDisplay("sexo01");
    scAjaxHideErrorDisplay("estadocivil01");
    scAjaxHideErrorDisplay("dirgestion01");
    scAjaxHideErrorDisplay("numhijos01");
    scAjaxHideErrorDisplay("estsop01");
    scAjaxHideErrorDisplay("notick01");
    scAjaxHideErrorDisplay("chequece");
    scAjaxHideErrorDisplay("solcre");
    scAjaxHideErrorDisplay("promocte01");
    scAjaxHideErrorDisplay("pagare01");
    scAjaxHideErrorDisplay("valorpagare01");
    scAjaxHideErrorDisplay("garante01");
    scAjaxHideErrorDisplay("fecvenp01");
    scAjaxHideErrorDisplay("ctacgant01");
    scAjaxHideErrorDisplay("dsn");
    scAjaxHideErrorDisplay("residente");
    scAjaxHideErrorDisplay("medio_contacto");
    scAjaxHideErrorDisplay("separacion_bienes");
    scAjaxHideErrorDisplay("disolucion_conyugal");
    scAjaxHideErrorDisplay("capitulaciones");
    scAjaxHideErrorDisplay("numero_carga_familiar");
    scAjaxHideErrorDisplay("nivel_educacion");
    scAjaxHideErrorDisplay("profesion");
    scAjaxHideErrorDisplay("envio_correspondencia");
    scAjaxHideErrorDisplay("nombre_arrendador");
    scAjaxHideErrorDisplay("apellido_arrendador");
    scAjaxHideErrorDisplay("id_vivienda");
    scAjaxHideErrorDisplay("telefono_arrendador");
    scAjaxHideErrorDisplay("nombres_referencia");
    scAjaxHideErrorDisplay("apellidos_referencia");
    scAjaxHideErrorDisplay("parentesco");
    scAjaxHideErrorDisplay("celular_ref");
    scAjaxHideErrorDisplay("telefono_convencional_ref");
    scAjaxHideErrorDisplay("id_ocupacion");
    scAjaxHideErrorDisplay("fecha_ingreso_empresa");
    scAjaxHideErrorDisplay("nombre_empresa");
    scAjaxHideErrorDisplay("ciudad_empresa");
    scAjaxHideErrorDisplay("provincia_empresa");
    scAjaxHideErrorDisplay("direccion_empresa");
    scAjaxHideErrorDisplay("cargo_empresa");
    scAjaxHideErrorDisplay("telefono_empresa");
    scAjaxHideErrorDisplay("ext_empresa");
    scAjaxHideErrorDisplay("id_tipo_contrato_actividad");
    scAjaxHideErrorDisplay("empresa_jubilo_actividad");
    scAjaxHideErrorDisplay("fecha_salida_empresa_actividad");
    scAjaxHideErrorDisplay("cargo_salida_empresa_actividad");
    scAjaxHideErrorDisplay("fecha_inicio_actividad");
    scAjaxHideErrorDisplay("fecha_ingreso_empresa_actividad");
    scAjaxHideErrorDisplay("nombre_empresa_actividad");
    scAjaxHideErrorDisplay("institucion_actividad");
    scAjaxHideErrorDisplay("ciudad_actividad");
    scAjaxHideErrorDisplay("provincia_actividad");
    scAjaxHideErrorDisplay("direccion_actividad");
    scAjaxHideErrorDisplay("calle_principal_actividad");
    scAjaxHideErrorDisplay("no_actividad");
    scAjaxHideErrorDisplay("calle_secundaria_actividad");
    scAjaxHideErrorDisplay("sector_actividad");
    scAjaxHideErrorDisplay("pais_actividad");
    scAjaxHideErrorDisplay("actividad");
    scAjaxHideErrorDisplay("telefono_actividad");
    scAjaxHideErrorDisplay("cargo_actividad");
    scAjaxHideErrorDisplay("ext_actividad");
    scAjaxHideErrorDisplay("fecha_ingreso_empresa_actividad2");
    scAjaxHideErrorDisplay("nombre_empresa_actividad2");
    scAjaxHideErrorDisplay("institucion_actividad2");
    scAjaxHideErrorDisplay("ciudad_actividad2");
    scAjaxHideErrorDisplay("provincia_actividad2");
    scAjaxHideErrorDisplay("direccion_actividad2");
    scAjaxHideErrorDisplay("calle_principal_actividad2");
    scAjaxHideErrorDisplay("no_actividad2");
    scAjaxHideErrorDisplay("calle_secundaria_actividad2");
    scAjaxHideErrorDisplay("sector_actividad2");
    scAjaxHideErrorDisplay("fecha_salida_empresa_actividad2");
    scAjaxHideErrorDisplay("fecha_inicio_actividad2");
    scAjaxHideErrorDisplay("actividad2");
    scAjaxHideErrorDisplay("telefono_actividad2");
    scAjaxHideErrorDisplay("ext_actividad2");
    scAjaxHideErrorDisplay("cargo_actividad2");
    scAjaxHideErrorDisplay("id_tipo_contrato_actividad2");
    scAjaxHideErrorDisplay("empresa_jubilo_actividad2");
    scAjaxHideErrorDisplay("sueldo");
    scAjaxHideErrorDisplay("arriendos");
    scAjaxHideErrorDisplay("dividendo_utilidades_ultimo_ano");
    scAjaxHideErrorDisplay("id_otros_ingresos");
    scAjaxHideErrorDisplay("arriendo_hipoteca");
    scAjaxHideErrorDisplay("prestamos");
    scAjaxHideErrorDisplay("tarjetas_creditos");
    scAjaxHideErrorDisplay("gastos_familiares");
    scAjaxHideErrorDisplay("id_otros_gastos");
    scAjaxHideErrorDisplay("depositos_bancos");
    scAjaxHideErrorDisplay("cuentas_documentos");
    scAjaxHideErrorDisplay("mercaderias");
    scAjaxHideErrorDisplay("maquinarias_vehiculos");
    scAjaxHideErrorDisplay("terrenos_edificios");
    scAjaxHideErrorDisplay("acciones_bonos_cedulas");
    scAjaxHideErrorDisplay("id_otros_activos");
    scAjaxHideErrorDisplay("cuentas_por_pagar");
    scAjaxHideErrorDisplay("prestamos_banco_menos_ano");
    scAjaxHideErrorDisplay("prestamos_banco_mas_ano");
    scAjaxHideErrorDisplay("deudas_tarjetas_creditos");
    scAjaxHideErrorDisplay("id_otras_obligaciones");
    scAjaxHideErrorDisplay("deudor");
    scAjaxHideErrorDisplay("monto");
    scAjaxHideErrorDisplay("descripcion");
    scAjaxHideErrorDisplay("placa");
    scAjaxHideErrorDisplay("valor_maquinaria_vehiculo");
    scAjaxHideErrorDisplay("a_nombre_de");
    scAjaxHideErrorDisplay("ubicacion");
    scAjaxHideErrorDisplay("valor_propiedad");
    scAjaxHideErrorDisplay("empresa");
    scAjaxHideErrorDisplay("valor_mercado");
    scAjaxHideErrorDisplay("institucion_bancaria");
    scAjaxHideErrorDisplay("monto_banco");
    scAjaxHideErrorDisplay("institucion_finaciera");
    scAjaxHideErrorDisplay("monto_institucion_finaciera");
    scAjaxHideErrorDisplay("id_cliente_juridico");
    scAjaxHideErrorDisplay("nombre_completo_empresa");
    scAjaxHideErrorDisplay("es_empresa_extranjera");
    scAjaxHideErrorDisplay("pais_empresa");
    scAjaxHideErrorDisplay("fecha_constitucion_empresa");
    scAjaxHideErrorDisplay("id_oficina");
    scAjaxHideErrorDisplay("id_tipo_actividad");
    scAjaxHideErrorDisplay("especifique_otros");
    scAjaxHideErrorDisplay("direccion_correspondencia");
    scAjaxHideErrorDisplay("calle_principal_correspondencia");
    scAjaxHideErrorDisplay("no_correspondencia");
    scAjaxHideErrorDisplay("calle_secundaria_correspondencia");
    scAjaxHideErrorDisplay("id_ciudad_correspondencia");
    scAjaxHideErrorDisplay("nombre_empresa_solicitante");
    scAjaxHideErrorDisplay("cargo_empresa_solicitante");
    scAjaxHideErrorDisplay("celular_empresa_solicitante");
    scAjaxHideErrorDisplay("telefono_empresa_solicitante");
    scAjaxHideErrorDisplay("mail_empresa_solicitante");
    scAjaxHideErrorDisplay("saldo_empresa_solicitante");
    scAjaxHideErrorDisplay("nombre_referencia_comerciales");
    scAjaxHideErrorDisplay("fecha_compra");
    scAjaxHideErrorDisplay("telefono_referencia_comerciales");
    scAjaxHideErrorDisplay("ventas");
    scAjaxHideErrorDisplay("comisiones");
    scAjaxHideErrorDisplay("gastos_operativos");
    scAjaxHideErrorDisplay("gastos_administrativos");
    scAjaxHideErrorDisplay("pago_cuotas_prestamo");
    scAjaxHideErrorDisplay("funcionario");
    scAjaxHideErrorDisplay("funcionario_detalle");
    scAjaxHideErrorDisplay("miembro_politico");
    scAjaxHideErrorDisplay("miembro_politico_detalle");
    scAjaxHideErrorDisplay("ejecutivo_gobierno");
    scAjaxHideErrorDisplay("ejecutivo_gobierno_detalle");
    scAjaxHideErrorDisplay("familiar_gobierno");
    scAjaxHideErrorDisplay("familiar_gobierno_detalle");
    scAjaxHideErrorDisplay("familiar_gobierno_detalle_quien");
    scAjaxHideErrorDisplay("otros_ingresos");
    scAjaxHideErrorDisplay("otros_gastos");
    scAjaxHideErrorDisplay("otros_activos");
    scAjaxHideErrorDisplay("otras_obligaciones");
    scAjaxHideErrorDisplay("sector_direccion_empresa");
    scAjaxHideErrorDisplay("sector_direccion_empresa_correo");
    scAjaxHideErrorDisplay("extranjero_nombres_referencia");
    scAjaxHideErrorDisplay("extranjero_apellidos_referencia");
    scAjaxHideErrorDisplay("extranjero_parentesco");
    scAjaxHideErrorDisplay("extranjero_celular_ref");
    scAjaxHideErrorDisplay("extranjero_telefono_convencional_ref");
    scAjaxHideErrorDisplay("cargo_representante_legal");
    scAjaxHideErrorDisplay("direccion_extranjero");
    scAjaxHideErrorDisplay("relacion_dependencia_principal");
    scAjaxHideErrorDisplay("correo_corporativo_principal");
    scAjaxHideErrorDisplay("relacion_dependencia_secundaria");
    scAjaxHideErrorDisplay("correo_corporativo_secundario");
    scAjaxHideErrorDisplay("actividad_secundaria");
    scAjaxHideErrorDisplay("id_pais_empresa");
    scAjaxHideErrorDisplay("id_provincia_empresa");
    scAjaxHideErrorDisplay("id_pais_correo");
    scAjaxHideErrorDisplay("id_provincia_correo");
    scAjaxHideErrorDisplay("apellido_empresa_solicitante");
    scAjaxHideErrorDisplay("pais_actividad2");
    scAjaxHideErrorDisplay("id_provincia_exterior");
    scAjaxHideErrorDisplay("pais_independiente");
    scAjaxHideErrorDisplay("tipo_contrato_otros_actividad_principal");
    scAjaxHideErrorDisplay("actividadeconomica");
    scAjaxHideErrorDisplay("clasesujeto");
    scAjaxHideErrorDisplay("provincia");
    scAjaxHideErrorDisplay("parroquia");
    scAjaxHideErrorDisplay("canton");
    scAjaxHideErrorDisplay("demandajudicial");
    scAjaxHideErrorDisplay("vdemandajudicial");
    scAjaxHideErrorDisplay("carteracastigada");
    scAjaxHideErrorDisplay("vcarteracastigada");
    scAjaxHideErrorDisplay("accesoexterno01");
    scAjaxHideErrorDisplay("referencia");
    scAjaxHideErrorDisplay("id_pais_empleado_dir_desempeno");
    scAjaxHideErrorDisplay("id_provincia_empleado_dir_desempeno");
    scAjaxHideErrorDisplay("id_ciudad_empleado_dir_desempeno");
    scAjaxHideErrorDisplay("razon_social");
    scAjaxHideErrorDisplay("parterel01");
    scAjaxHideErrorDisplay("origen_fondos");
    scAjaxHideErrorDisplay("tipo_identificacion");
    scAjaxHideErrorDisplay("id_actividad");
    var var_codcte01 = document.F2.codcte01.value;
    var var_nm_form_submit = document.F2.nm_form_submit.value;
    var var_nmgp_opcao = document.F2.nmgp_opcao.value;
    var var_nmgp_ordem = document.F2.nmgp_ordem.value;
    var var_nmgp_fast_search = document.F2.nmgp_fast_search.value;
    var var_nmgp_cond_fast_search = document.F2.nmgp_cond_fast_search.value;
    var var_nmgp_arg_fast_search = document.F2.nmgp_arg_fast_search.value;
    var var_nmgp_arg_dyn_search = document.F2.nmgp_arg_dyn_search.value;
    var var_script_case_init = document.F2.script_case_init.value;
    scAjaxProcOn();
    x_ajax_form_maecte_mob_navigate_form(var_codcte01, var_nm_form_submit, var_nmgp_opcao, var_nmgp_ordem, var_nmgp_fast_search,  var_nmgp_cond_fast_search,  var_nmgp_arg_fast_search, var_nmgp_arg_dyn_search, var_script_case_init, do_ajax_form_maecte_mob_navigate_form_cb);
  } // do_ajax_form_maecte_mob_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_maecte_mob']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_form_maecte_mob_navigate_form_cb(sResp)
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
    document.F2.codcte01.value = scAjaxGetKeyValue("codcte01");
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
    scAjaxAlert(do_ajax_form_maecte_mob_navigate_form_cb_after_alert);
  } // do_ajax_form_maecte_mob_navigate_form_cb
  function do_ajax_form_maecte_mob_navigate_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scQuickSearchKeyUp('t', null);
    $('#SC_fast_search_t').blur();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_form_maecte_mob_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_form_maecte_mob_navigate_form_cb_after_alert

  function sc_hide_form_maecte_mob_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_form_maecte_mob_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "codcte01";
  ajax_field_list[1] = "tipo_cliente";
  ajax_field_list[2] = "id_nacionalidad";
  ajax_field_list[3] = "nomcte01";
  ajax_field_list[4] = "primer_nombre";
  ajax_field_list[5] = "segundo_nombre";
  ajax_field_list[6] = "primer_apellido";
  ajax_field_list[7] = "segundo_apellido";
  ajax_field_list[8] = "cv1cte01";
  ajax_field_list[9] = "cv2cte01";
  ajax_field_list[10] = "tipcte01";
  ajax_field_list[11] = "ofienccte01";
  ajax_field_list[12] = "vendcte01";
  ajax_field_list[13] = "cobrcte01";
  ajax_field_list[14] = "loccte01";
  ajax_field_list[15] = "dircte01";
  ajax_field_list[16] = "sector";
  ajax_field_list[17] = "calle_principal";
  ajax_field_list[18] = "no";
  ajax_field_list[19] = "calle_secundaria";
  ajax_field_list[20] = "id_pais";
  ajax_field_list[21] = "id_provincia";
  ajax_field_list[22] = "id_ciudad";
  ajax_field_list[23] = "id_canton";
  ajax_field_list[24] = "telcte01";
  ajax_field_list[25] = "cascte01";
  ajax_field_list[26] = "ci_conyuge";
  ajax_field_list[27] = "conyuge_tipo_identidad";
  ajax_field_list[28] = "conyuge_primer_nombre";
  ajax_field_list[29] = "conyuge_segundo_nombre";
  ajax_field_list[30] = "conyuge_primer_apellido";
  ajax_field_list[31] = "conyuge_segundo_apellido";
  ajax_field_list[32] = "conyuge_profesion";
  ajax_field_list[33] = "id_tipo_documento";
  ajax_field_list[34] = "repleg01";
  ajax_field_list[35] = "fecing01";
  ajax_field_list[36] = "condpag01";
  ajax_field_list[37] = "desctocte01";
  ajax_field_list[38] = "limcred01";
  ajax_field_list[39] = "desppar01";
  ajax_field_list[40] = "cheqpro01";
  ajax_field_list[41] = "sdoeje01";
  ajax_field_list[42] = "sdoant01";
  ajax_field_list[43] = "sdoact01";
  ajax_field_list[44] = "acudbm01";
  ajax_field_list[45] = "acucrm01";
  ajax_field_list[46] = "acudbe01";
  ajax_field_list[47] = "acucre01";
  ajax_field_list[48] = "comentcte01";
  ajax_field_list[49] = "statuscte01";
  ajax_field_list[50] = "identcte01";
  ajax_field_list[51] = "cordcte01";
  ajax_field_list[52] = "limcant01";
  ajax_field_list[53] = "pagleg01";
  ajax_field_list[54] = "telcte01b";
  ajax_field_list[55] = "telcte01c";
  ajax_field_list[56] = "emailcte01";
  ajax_field_list[57] = "calle_principal_exterior";
  ajax_field_list[58] = "no_exterior";
  ajax_field_list[59] = "calle_secundaria_exterior";
  ajax_field_list[60] = "id_pais_exterior";
  ajax_field_list[61] = "id_ciudad_exterior";
  ajax_field_list[62] = "codigo_postal_exterior";
  ajax_field_list[63] = "sector_exterior";
  ajax_field_list[64] = "telefono_exterior";
  ajax_field_list[65] = "celular_exterior";
  ajax_field_list[66] = "email_exterior";
  ajax_field_list[67] = "emailaltcte01";
  ajax_field_list[68] = "ctacgcte01";
  ajax_field_list[69] = "obsercte01";
  ajax_field_list[70] = "totexceso01";
  ajax_field_list[71] = "imagencte01";
  ajax_field_list[72] = "block";
  ajax_field_list[73] = "uid";
  ajax_field_list[74] = "ultimoacceso";
  ajax_field_list[75] = "idcli";
  ajax_field_list[76] = "catcte01";
  ajax_field_list[77] = "transferido";
  ajax_field_list[78] = "password";
  ajax_field_list[79] = "showroom";
  ajax_field_list[80] = "orden";
  ajax_field_list[81] = "website";
  ajax_field_list[82] = "longitud01";
  ajax_field_list[83] = "latitud01";
  ajax_field_list[84] = "zoom01";
  ajax_field_list[85] = "acceder";
  ajax_field_list[86] = "coniva01";
  ajax_field_list[87] = "idemp01";
  ajax_field_list[88] = "codprov01";
  ajax_field_list[89] = "celular01";
  ajax_field_list[90] = "dircliente01";
  ajax_field_list[91] = "razcte01";
  ajax_field_list[92] = "ruc01";
  ajax_field_list[93] = "timenegocio01";
  ajax_field_list[94] = "refbanc01";
  ajax_field_list[95] = "refcom01";
  ajax_field_list[96] = "tarjcred01";
  ajax_field_list[97] = "firmaut01";
  ajax_field_list[98] = "precte01";
  ajax_field_list[99] = "cuotasven01";
  ajax_field_list[100] = "diasven01";
  ajax_field_list[101] = "fechanace01";
  ajax_field_list[102] = "sexo01";
  ajax_field_list[103] = "estadocivil01";
  ajax_field_list[104] = "dirgestion01";
  ajax_field_list[105] = "numhijos01";
  ajax_field_list[106] = "estsop01";
  ajax_field_list[107] = "notick01";
  ajax_field_list[108] = "chequece";
  ajax_field_list[109] = "solcre";
  ajax_field_list[110] = "promocte01";
  ajax_field_list[111] = "pagare01";
  ajax_field_list[112] = "valorpagare01";
  ajax_field_list[113] = "garante01";
  ajax_field_list[114] = "fecvenp01";
  ajax_field_list[115] = "ctacgant01";
  ajax_field_list[116] = "dsn";
  ajax_field_list[117] = "residente";
  ajax_field_list[118] = "medio_contacto";
  ajax_field_list[119] = "separacion_bienes";
  ajax_field_list[120] = "disolucion_conyugal";
  ajax_field_list[121] = "capitulaciones";
  ajax_field_list[122] = "numero_carga_familiar";
  ajax_field_list[123] = "nivel_educacion";
  ajax_field_list[124] = "profesion";
  ajax_field_list[125] = "envio_correspondencia";
  ajax_field_list[126] = "nombre_arrendador";
  ajax_field_list[127] = "apellido_arrendador";
  ajax_field_list[128] = "id_vivienda";
  ajax_field_list[129] = "telefono_arrendador";
  ajax_field_list[130] = "nombres_referencia";
  ajax_field_list[131] = "apellidos_referencia";
  ajax_field_list[132] = "parentesco";
  ajax_field_list[133] = "celular_ref";
  ajax_field_list[134] = "telefono_convencional_ref";
  ajax_field_list[135] = "id_ocupacion";
  ajax_field_list[136] = "fecha_ingreso_empresa";
  ajax_field_list[137] = "nombre_empresa";
  ajax_field_list[138] = "ciudad_empresa";
  ajax_field_list[139] = "provincia_empresa";
  ajax_field_list[140] = "direccion_empresa";
  ajax_field_list[141] = "cargo_empresa";
  ajax_field_list[142] = "telefono_empresa";
  ajax_field_list[143] = "ext_empresa";
  ajax_field_list[144] = "id_tipo_contrato_actividad";
  ajax_field_list[145] = "empresa_jubilo_actividad";
  ajax_field_list[146] = "fecha_salida_empresa_actividad";
  ajax_field_list[147] = "cargo_salida_empresa_actividad";
  ajax_field_list[148] = "fecha_inicio_actividad";
  ajax_field_list[149] = "fecha_ingreso_empresa_actividad";
  ajax_field_list[150] = "nombre_empresa_actividad";
  ajax_field_list[151] = "institucion_actividad";
  ajax_field_list[152] = "ciudad_actividad";
  ajax_field_list[153] = "provincia_actividad";
  ajax_field_list[154] = "direccion_actividad";
  ajax_field_list[155] = "calle_principal_actividad";
  ajax_field_list[156] = "no_actividad";
  ajax_field_list[157] = "calle_secundaria_actividad";
  ajax_field_list[158] = "sector_actividad";
  ajax_field_list[159] = "pais_actividad";
  ajax_field_list[160] = "actividad";
  ajax_field_list[161] = "telefono_actividad";
  ajax_field_list[162] = "cargo_actividad";
  ajax_field_list[163] = "ext_actividad";
  ajax_field_list[164] = "fecha_ingreso_empresa_actividad2";
  ajax_field_list[165] = "nombre_empresa_actividad2";
  ajax_field_list[166] = "institucion_actividad2";
  ajax_field_list[167] = "ciudad_actividad2";
  ajax_field_list[168] = "provincia_actividad2";
  ajax_field_list[169] = "direccion_actividad2";
  ajax_field_list[170] = "calle_principal_actividad2";
  ajax_field_list[171] = "no_actividad2";
  ajax_field_list[172] = "calle_secundaria_actividad2";
  ajax_field_list[173] = "sector_actividad2";
  ajax_field_list[174] = "fecha_salida_empresa_actividad2";
  ajax_field_list[175] = "fecha_inicio_actividad2";
  ajax_field_list[176] = "actividad2";
  ajax_field_list[177] = "telefono_actividad2";
  ajax_field_list[178] = "ext_actividad2";
  ajax_field_list[179] = "cargo_actividad2";
  ajax_field_list[180] = "id_tipo_contrato_actividad2";
  ajax_field_list[181] = "empresa_jubilo_actividad2";
  ajax_field_list[182] = "sueldo";
  ajax_field_list[183] = "arriendos";
  ajax_field_list[184] = "dividendo_utilidades_ultimo_ano";
  ajax_field_list[185] = "id_otros_ingresos";
  ajax_field_list[186] = "arriendo_hipoteca";
  ajax_field_list[187] = "prestamos";
  ajax_field_list[188] = "tarjetas_creditos";
  ajax_field_list[189] = "gastos_familiares";
  ajax_field_list[190] = "id_otros_gastos";
  ajax_field_list[191] = "depositos_bancos";
  ajax_field_list[192] = "cuentas_documentos";
  ajax_field_list[193] = "mercaderias";
  ajax_field_list[194] = "maquinarias_vehiculos";
  ajax_field_list[195] = "terrenos_edificios";
  ajax_field_list[196] = "acciones_bonos_cedulas";
  ajax_field_list[197] = "id_otros_activos";
  ajax_field_list[198] = "cuentas_por_pagar";
  ajax_field_list[199] = "prestamos_banco_menos_ano";
  ajax_field_list[200] = "prestamos_banco_mas_ano";
  ajax_field_list[201] = "deudas_tarjetas_creditos";
  ajax_field_list[202] = "id_otras_obligaciones";
  ajax_field_list[203] = "deudor";
  ajax_field_list[204] = "monto";
  ajax_field_list[205] = "descripcion";
  ajax_field_list[206] = "placa";
  ajax_field_list[207] = "valor_maquinaria_vehiculo";
  ajax_field_list[208] = "a_nombre_de";
  ajax_field_list[209] = "ubicacion";
  ajax_field_list[210] = "valor_propiedad";
  ajax_field_list[211] = "empresa";
  ajax_field_list[212] = "valor_mercado";
  ajax_field_list[213] = "institucion_bancaria";
  ajax_field_list[214] = "monto_banco";
  ajax_field_list[215] = "institucion_finaciera";
  ajax_field_list[216] = "monto_institucion_finaciera";
  ajax_field_list[217] = "id_cliente_juridico";
  ajax_field_list[218] = "nombre_completo_empresa";
  ajax_field_list[219] = "es_empresa_extranjera";
  ajax_field_list[220] = "pais_empresa";
  ajax_field_list[221] = "fecha_constitucion_empresa";
  ajax_field_list[222] = "id_oficina";
  ajax_field_list[223] = "id_tipo_actividad";
  ajax_field_list[224] = "especifique_otros";
  ajax_field_list[225] = "direccion_correspondencia";
  ajax_field_list[226] = "calle_principal_correspondencia";
  ajax_field_list[227] = "no_correspondencia";
  ajax_field_list[228] = "calle_secundaria_correspondencia";
  ajax_field_list[229] = "id_ciudad_correspondencia";
  ajax_field_list[230] = "nombre_empresa_solicitante";
  ajax_field_list[231] = "cargo_empresa_solicitante";
  ajax_field_list[232] = "celular_empresa_solicitante";
  ajax_field_list[233] = "telefono_empresa_solicitante";
  ajax_field_list[234] = "mail_empresa_solicitante";
  ajax_field_list[235] = "saldo_empresa_solicitante";
  ajax_field_list[236] = "nombre_referencia_comerciales";
  ajax_field_list[237] = "fecha_compra";
  ajax_field_list[238] = "telefono_referencia_comerciales";
  ajax_field_list[239] = "ventas";
  ajax_field_list[240] = "comisiones";
  ajax_field_list[241] = "gastos_operativos";
  ajax_field_list[242] = "gastos_administrativos";
  ajax_field_list[243] = "pago_cuotas_prestamo";
  ajax_field_list[244] = "funcionario";
  ajax_field_list[245] = "funcionario_detalle";
  ajax_field_list[246] = "miembro_politico";
  ajax_field_list[247] = "miembro_politico_detalle";
  ajax_field_list[248] = "ejecutivo_gobierno";
  ajax_field_list[249] = "ejecutivo_gobierno_detalle";
  ajax_field_list[250] = "familiar_gobierno";
  ajax_field_list[251] = "familiar_gobierno_detalle";
  ajax_field_list[252] = "familiar_gobierno_detalle_quien";
  ajax_field_list[253] = "otros_ingresos";
  ajax_field_list[254] = "otros_gastos";
  ajax_field_list[255] = "otros_activos";
  ajax_field_list[256] = "otras_obligaciones";
  ajax_field_list[257] = "sector_direccion_empresa";
  ajax_field_list[258] = "sector_direccion_empresa_correo";
  ajax_field_list[259] = "extranjero_nombres_referencia";
  ajax_field_list[260] = "extranjero_apellidos_referencia";
  ajax_field_list[261] = "extranjero_parentesco";
  ajax_field_list[262] = "extranjero_celular_ref";
  ajax_field_list[263] = "extranjero_telefono_convencional_ref";
  ajax_field_list[264] = "cargo_representante_legal";
  ajax_field_list[265] = "direccion_extranjero";
  ajax_field_list[266] = "relacion_dependencia_principal";
  ajax_field_list[267] = "correo_corporativo_principal";
  ajax_field_list[268] = "relacion_dependencia_secundaria";
  ajax_field_list[269] = "correo_corporativo_secundario";
  ajax_field_list[270] = "actividad_secundaria";
  ajax_field_list[271] = "id_pais_empresa";
  ajax_field_list[272] = "id_provincia_empresa";
  ajax_field_list[273] = "id_pais_correo";
  ajax_field_list[274] = "id_provincia_correo";
  ajax_field_list[275] = "apellido_empresa_solicitante";
  ajax_field_list[276] = "pais_actividad2";
  ajax_field_list[277] = "id_provincia_exterior";
  ajax_field_list[278] = "pais_independiente";
  ajax_field_list[279] = "tipo_contrato_otros_actividad_principal";
  ajax_field_list[280] = "actividadeconomica";
  ajax_field_list[281] = "clasesujeto";
  ajax_field_list[282] = "provincia";
  ajax_field_list[283] = "parroquia";
  ajax_field_list[284] = "canton";
  ajax_field_list[285] = "demandajudicial";
  ajax_field_list[286] = "vdemandajudicial";
  ajax_field_list[287] = "carteracastigada";
  ajax_field_list[288] = "vcarteracastigada";
  ajax_field_list[289] = "accesoexterno01";
  ajax_field_list[290] = "referencia";
  ajax_field_list[291] = "id_pais_empleado_dir_desempeno";
  ajax_field_list[292] = "id_provincia_empleado_dir_desempeno";
  ajax_field_list[293] = "id_ciudad_empleado_dir_desempeno";
  ajax_field_list[294] = "razon_social";
  ajax_field_list[295] = "parterel01";
  ajax_field_list[296] = "origen_fondos";
  ajax_field_list[297] = "tipo_identificacion";
  ajax_field_list[298] = "id_actividad";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {
    "codcte01": {"label": "Codcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipo_cliente": {"label": "Tipo Cliente", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_nacionalidad": {"label": "Id Nacionalidad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nomcte01": {"label": "Nomcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "primer_nombre": {"label": "Primer Nombre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "segundo_nombre": {"label": "Segundo Nombre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "primer_apellido": {"label": "Primer Apellido", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "segundo_apellido": {"label": "Segundo Apellido", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cv1cte01": {"label": "Cv 1cte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cv2cte01": {"label": "Cv 2cte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipcte01": {"label": "Tipcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ofienccte01": {"label": "Ofienccte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "vendcte01": {"label": "Vendcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cobrcte01": {"label": "Cobrcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "loccte01": {"label": "Loccte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dircte01": {"label": "Dircte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sector": {"label": "Sector", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_principal": {"label": "Calle Principal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "no": {"label": "No", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_secundaria": {"label": "Calle Secundaria", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_pais": {"label": "Id Pais", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_provincia": {"label": "Id Provincia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_ciudad": {"label": "Id Ciudad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_canton": {"label": "Id Canton", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telcte01": {"label": "Telcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cascte01": {"label": "Cascte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ci_conyuge": {"label": "Ci Conyuge", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "conyuge_tipo_identidad": {"label": "Conyuge Tipo Identidad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "conyuge_primer_nombre": {"label": "Conyuge Primer Nombre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "conyuge_segundo_nombre": {"label": "Conyuge Segundo Nombre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "conyuge_primer_apellido": {"label": "Conyuge Primer Apellido", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "conyuge_segundo_apellido": {"label": "Conyuge Segundo Apellido", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "conyuge_profesion": {"label": "Conyuge Profesion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_tipo_documento": {"label": "Id Tipo Documento", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "repleg01": {"label": "Repleg 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecing01": {"label": "Fecing 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "condpag01": {"label": "Condpag 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "desctocte01": {"label": "Desctocte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "limcred01": {"label": "Limcred 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "desppar01": {"label": "Desppar 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cheqpro01": {"label": "Cheqpro 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sdoeje01": {"label": "Sdoeje 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sdoant01": {"label": "Sdoant 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sdoact01": {"label": "Sdoact 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "acudbm01": {"label": "Acudbm 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "acucrm01": {"label": "Acucrm 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "acudbe01": {"label": "Acudbe 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "acucre01": {"label": "Acucre 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "comentcte01": {"label": "Comentcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "statuscte01": {"label": "Statuscte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "identcte01": {"label": "Identcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cordcte01": {"label": "Cordcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "limcant01": {"label": "Limcant 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pagleg01": {"label": "Pagleg 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telcte01b": {"label": "Telcte 0 1b", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telcte01c": {"label": "Telcte 0 1c", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "emailcte01": {"label": "Emailcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_principal_exterior": {"label": "Calle Principal Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "no_exterior": {"label": "No Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_secundaria_exterior": {"label": "Calle Secundaria Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_pais_exterior": {"label": "Id Pais Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_ciudad_exterior": {"label": "Id Ciudad Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "codigo_postal_exterior": {"label": "Codigo Postal Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sector_exterior": {"label": "Sector Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefono_exterior": {"label": "Telefono Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "celular_exterior": {"label": "Celular Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "email_exterior": {"label": "Email Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "emailaltcte01": {"label": "Emailaltcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ctacgcte01": {"label": "Ctacgcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "obsercte01": {"label": "Obsercte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "totexceso01": {"label": "Totexceso 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "imagencte01": {"label": "Imagencte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "block": {"label": "Block", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "uid": {"label": "UID", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ultimoacceso": {"label": "Ultimoacceso", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "idcli": {"label": "Idcli", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "catcte01": {"label": "Catcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "transferido": {"label": "Transferido", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "password": {"label": "Password", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "showroom": {"label": "Showroom", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "orden": {"label": "Orden", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "website": {"label": "Website", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "longitud01": {"label": "Longitud 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "latitud01": {"label": "Latitud 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "zoom01": {"label": "Zoom 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "acceder": {"label": "Acceder", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "coniva01": {"label": "Coniva 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "idemp01": {"label": "Idemp 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "codprov01": {"label": "Codprov 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "celular01": {"label": "Celular 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dircliente01": {"label": "Dircliente 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "razcte01": {"label": "Razcte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ruc01": {"label": "Ruc 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "timenegocio01": {"label": "Timenegocio 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "refbanc01": {"label": "Refbanc 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "refcom01": {"label": "Refcom 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tarjcred01": {"label": "Tarjcred 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "firmaut01": {"label": "Firmaut 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "precte01": {"label": "Precte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cuotasven01": {"label": "Cuotasven 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "diasven01": {"label": "Diasven 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fechanace01": {"label": "Fechanace 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sexo01": {"label": "Sexo 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estadocivil01": {"label": "Estadocivil 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dirgestion01": {"label": "Dirgestion 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "numhijos01": {"label": "Numhijos 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estsop01": {"label": "Estsop 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "notick01": {"label": "Notick 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "chequece": {"label": "Chequece", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "solcre": {"label": "Solcre", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "promocte01": {"label": "Promocte 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pagare01": {"label": "Pagare 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valorpagare01": {"label": "Valorpagare 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "garante01": {"label": "Garante 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecvenp01": {"label": "Fecvenp 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ctacgant01": {"label": "Ctacgant 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dsn": {"label": "Dsn", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "residente": {"label": "Residente", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "medio_contacto": {"label": "Medio Contacto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "separacion_bienes": {"label": "Separacion Bienes", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "disolucion_conyugal": {"label": "Disolucion Conyugal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "capitulaciones": {"label": "Capitulaciones", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "numero_carga_familiar": {"label": "Numero Carga Familiar", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nivel_educacion": {"label": "Nivel Educacion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "profesion": {"label": "Profesion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "envio_correspondencia": {"label": "Envio Correspondencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_arrendador": {"label": "Nombre Arrendador", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "apellido_arrendador": {"label": "Apellido Arrendador", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_vivienda": {"label": "Id Vivienda", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefono_arrendador": {"label": "Telefono Arrendador", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombres_referencia": {"label": "Nombres Referencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "apellidos_referencia": {"label": "Apellidos Referencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "parentesco": {"label": "Parentesco", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "celular_ref": {"label": "Celular Ref", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefono_convencional_ref": {"label": "Telefono Convencional Ref", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_ocupacion": {"label": "Id Ocupacion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_ingreso_empresa": {"label": "Fecha Ingreso Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_empresa": {"label": "Nombre Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ciudad_empresa": {"label": "Ciudad Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "provincia_empresa": {"label": "Provincia Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "direccion_empresa": {"label": "Direccion Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cargo_empresa": {"label": "Cargo Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefono_empresa": {"label": "Telefono Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ext_empresa": {"label": "Ext Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_tipo_contrato_actividad": {"label": "Id Tipo Contrato Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "empresa_jubilo_actividad": {"label": "Empresa Jubilo Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_salida_empresa_actividad": {"label": "Fecha Salida Empresa Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cargo_salida_empresa_actividad": {"label": "Cargo Salida Empresa Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_inicio_actividad": {"label": "Fecha Inicio Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_ingreso_empresa_actividad": {"label": "Fecha Ingreso Empresa Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_empresa_actividad": {"label": "Nombre Empresa Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "institucion_actividad": {"label": "Institucion Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ciudad_actividad": {"label": "Ciudad Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "provincia_actividad": {"label": "Provincia Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "direccion_actividad": {"label": "Direccion Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_principal_actividad": {"label": "Calle Principal Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "no_actividad": {"label": "No Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_secundaria_actividad": {"label": "Calle Secundaria Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sector_actividad": {"label": "Sector Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pais_actividad": {"label": "Pais Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "actividad": {"label": "Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefono_actividad": {"label": "Telefono Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cargo_actividad": {"label": "Cargo Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ext_actividad": {"label": "Ext Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_ingreso_empresa_actividad2": {"label": "Fecha Ingreso Empresa Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_empresa_actividad2": {"label": "Nombre Empresa Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "institucion_actividad2": {"label": "Institucion Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ciudad_actividad2": {"label": "Ciudad Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "provincia_actividad2": {"label": "Provincia Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "direccion_actividad2": {"label": "Direccion Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_principal_actividad2": {"label": "Calle Principal Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "no_actividad2": {"label": "No Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_secundaria_actividad2": {"label": "Calle Secundaria Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sector_actividad2": {"label": "Sector Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_salida_empresa_actividad2": {"label": "Fecha Salida Empresa Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_inicio_actividad2": {"label": "Fecha Inicio Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "actividad2": {"label": "Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefono_actividad2": {"label": "Telefono Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ext_actividad2": {"label": "Ext Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cargo_actividad2": {"label": "Cargo Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_tipo_contrato_actividad2": {"label": "Id Tipo Contrato Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "empresa_jubilo_actividad2": {"label": "Empresa Jubilo Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sueldo": {"label": "Sueldo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "arriendos": {"label": "Arriendos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "dividendo_utilidades_ultimo_ano": {"label": "Dividendo Utilidades Ultimo Ano", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_otros_ingresos": {"label": "Id Otros Ingresos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "arriendo_hipoteca": {"label": "Arriendo Hipoteca", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "prestamos": {"label": "Prestamos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tarjetas_creditos": {"label": "Tarjetas Creditos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "gastos_familiares": {"label": "Gastos Familiares", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_otros_gastos": {"label": "Id Otros Gastos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "depositos_bancos": {"label": "Depositos Bancos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cuentas_documentos": {"label": "Cuentas Documentos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "mercaderias": {"label": "Mercaderias", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "maquinarias_vehiculos": {"label": "Maquinarias Vehiculos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "terrenos_edificios": {"label": "Terrenos Edificios", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "acciones_bonos_cedulas": {"label": "Acciones Bonos Cedulas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_otros_activos": {"label": "Id Otros Activos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cuentas_por_pagar": {"label": "Cuentas Por Pagar", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "prestamos_banco_menos_ano": {"label": "Prestamos Banco Menos Ano", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "prestamos_banco_mas_ano": {"label": "Prestamos Banco Mas Ano", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "deudas_tarjetas_creditos": {"label": "Deudas Tarjetas Creditos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_otras_obligaciones": {"label": "Id Otras Obligaciones", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "deudor": {"label": "Deudor", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "monto": {"label": "Monto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "descripcion": {"label": "Descripcion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "placa": {"label": "Placa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valor_maquinaria_vehiculo": {"label": "Valor Maquinaria Vehiculo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "a_nombre_de": {"label": "A Nombre De", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ubicacion": {"label": "Ubicacion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valor_propiedad": {"label": "Valor Propiedad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "empresa": {"label": "Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "valor_mercado": {"label": "Valor Mercado", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "institucion_bancaria": {"label": "Institucion Bancaria", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "monto_banco": {"label": "Monto Banco", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "institucion_finaciera": {"label": "Institucion Finaciera", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "monto_institucion_finaciera": {"label": "Monto Institucion Finaciera", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_cliente_juridico": {"label": "Id Cliente Juridico", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_completo_empresa": {"label": "Nombre Completo Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "es_empresa_extranjera": {"label": "Es Empresa Extranjera", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pais_empresa": {"label": "Pais Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_constitucion_empresa": {"label": "Fecha Constitucion Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_oficina": {"label": "Id Oficina", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_tipo_actividad": {"label": "Id Tipo Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "especifique_otros": {"label": "Especifique Otros", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "direccion_correspondencia": {"label": "Direccion Correspondencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_principal_correspondencia": {"label": "Calle Principal Correspondencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "no_correspondencia": {"label": "No Correspondencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "calle_secundaria_correspondencia": {"label": "Calle Secundaria Correspondencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_ciudad_correspondencia": {"label": "Id Ciudad Correspondencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_empresa_solicitante": {"label": "Nombre Empresa Solicitante", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cargo_empresa_solicitante": {"label": "Cargo Empresa Solicitante", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "celular_empresa_solicitante": {"label": "Celular Empresa Solicitante", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefono_empresa_solicitante": {"label": "Telefono Empresa Solicitante", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "mail_empresa_solicitante": {"label": "Mail Empresa Solicitante", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "saldo_empresa_solicitante": {"label": "Saldo Empresa Solicitante", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "nombre_referencia_comerciales": {"label": "Nombre Referencia Comerciales", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "fecha_compra": {"label": "Fecha Compra", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "telefono_referencia_comerciales": {"label": "Telefono Referencia Comerciales", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ventas": {"label": "Ventas", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "comisiones": {"label": "Comisiones", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "gastos_operativos": {"label": "Gastos Operativos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "gastos_administrativos": {"label": "Gastos Administrativos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pago_cuotas_prestamo": {"label": "Pago Cuotas Prestamo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "funcionario": {"label": "Funcionario", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "funcionario_detalle": {"label": "Funcionario Detalle", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "miembro_politico": {"label": "Miembro Politico", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "miembro_politico_detalle": {"label": "Miembro Politico Detalle", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ejecutivo_gobierno": {"label": "Ejecutivo Gobierno", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "ejecutivo_gobierno_detalle": {"label": "Ejecutivo Gobierno Detalle", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "familiar_gobierno": {"label": "Familiar Gobierno", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "familiar_gobierno_detalle": {"label": "Familiar Gobierno Detalle", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "familiar_gobierno_detalle_quien": {"label": "Familiar Gobierno Detalle Quien", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "otros_ingresos": {"label": "Otros Ingresos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "otros_gastos": {"label": "Otros Gastos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "otros_activos": {"label": "Otros Activos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "otras_obligaciones": {"label": "Otras Obligaciones", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sector_direccion_empresa": {"label": "Sector Direccion Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "sector_direccion_empresa_correo": {"label": "Sector Direccion Empresa Correo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "extranjero_nombres_referencia": {"label": "Extranjero Nombres Referencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "extranjero_apellidos_referencia": {"label": "Extranjero Apellidos Referencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "extranjero_parentesco": {"label": "Extranjero Parentesco", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "extranjero_celular_ref": {"label": "Extranjero Celular Ref", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "extranjero_telefono_convencional_ref": {"label": "Extranjero Telefono Convencional Ref", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "cargo_representante_legal": {"label": "Cargo Representante Legal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "direccion_extranjero": {"label": "Direccion Extranjero", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "relacion_dependencia_principal": {"label": "Relacion Dependencia Principal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "correo_corporativo_principal": {"label": "Correo Corporativo Principal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "relacion_dependencia_secundaria": {"label": "Relacion Dependencia Secundaria", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "correo_corporativo_secundario": {"label": "Correo Corporativo Secundario", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "actividad_secundaria": {"label": "Actividad Secundaria", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_pais_empresa": {"label": "Id Pais Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_provincia_empresa": {"label": "Id Provincia Empresa", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_pais_correo": {"label": "Id Pais Correo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_provincia_correo": {"label": "Id Provincia Correo", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "apellido_empresa_solicitante": {"label": "Apellido Empresa Solicitante", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pais_actividad2": {"label": "Pais Actividad 2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_provincia_exterior": {"label": "Id Provincia Exterior", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "pais_independiente": {"label": "Pais Independiente", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipo_contrato_otros_actividad_principal": {"label": "Tipo Contrato Otros Actividad Principal", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "actividadeconomica": {"label": "Actividad Economica", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "clasesujeto": {"label": "Clase Sujeto", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "provincia": {"label": "Provincia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "parroquia": {"label": "Parroquia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "canton": {"label": "Canton", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "demandajudicial": {"label": "Demanda Judicial", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "vdemandajudicial": {"label": "V Demanda Judicial", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "carteracastigada": {"label": "Cartera Castigada", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "vcarteracastigada": {"label": "V Cartera Castigada", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "accesoexterno01": {"label": "Acceso Externo 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "referencia": {"label": "Referencia", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_pais_empleado_dir_desempeno": {"label": "Id Pais Empleado Dir Desempeno", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_provincia_empleado_dir_desempeno": {"label": "Id Provincia Empleado Dir Desempeno", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_ciudad_empleado_dir_desempeno": {"label": "Id Ciudad Empleado Dir Desempeno", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "razon_social": {"label": "Razon Social", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "parterel01": {"label": "Parte Rel 01", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "origen_fondos": {"label": "Origen Fondos", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "tipo_identificacion": {"label": "Tipo Identificacion", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "id_actividad": {"label": "Id Actividad", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
  };
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "codcte01": new Array(),
    "tipo_cliente": new Array(),
    "id_nacionalidad": new Array(),
    "nomcte01": new Array(),
    "primer_nombre": new Array(),
    "segundo_nombre": new Array(),
    "primer_apellido": new Array(),
    "segundo_apellido": new Array(),
    "cv1cte01": new Array(),
    "cv2cte01": new Array(),
    "tipcte01": new Array(),
    "ofienccte01": new Array(),
    "vendcte01": new Array(),
    "cobrcte01": new Array(),
    "loccte01": new Array(),
    "dircte01": new Array(),
    "sector": new Array(),
    "calle_principal": new Array(),
    "no": new Array(),
    "calle_secundaria": new Array(),
    "id_pais": new Array(),
    "id_provincia": new Array(),
    "id_ciudad": new Array(),
    "id_canton": new Array(),
    "telcte01": new Array(),
    "cascte01": new Array(),
    "ci_conyuge": new Array(),
    "conyuge_tipo_identidad": new Array(),
    "conyuge_primer_nombre": new Array(),
    "conyuge_segundo_nombre": new Array(),
    "conyuge_primer_apellido": new Array(),
    "conyuge_segundo_apellido": new Array(),
    "conyuge_profesion": new Array(),
    "id_tipo_documento": new Array(),
    "repleg01": new Array(),
    "fecing01": new Array(),
    "condpag01": new Array(),
    "desctocte01": new Array(),
    "limcred01": new Array(),
    "desppar01": new Array(),
    "cheqpro01": new Array(),
    "sdoeje01": new Array(),
    "sdoant01": new Array(),
    "sdoact01": new Array(),
    "acudbm01": new Array(),
    "acucrm01": new Array(),
    "acudbe01": new Array(),
    "acucre01": new Array(),
    "comentcte01": new Array(),
    "statuscte01": new Array(),
    "identcte01": new Array(),
    "cordcte01": new Array(),
    "limcant01": new Array(),
    "pagleg01": new Array(),
    "telcte01b": new Array(),
    "telcte01c": new Array(),
    "emailcte01": new Array(),
    "calle_principal_exterior": new Array(),
    "no_exterior": new Array(),
    "calle_secundaria_exterior": new Array(),
    "id_pais_exterior": new Array(),
    "id_ciudad_exterior": new Array(),
    "codigo_postal_exterior": new Array(),
    "sector_exterior": new Array(),
    "telefono_exterior": new Array(),
    "celular_exterior": new Array(),
    "email_exterior": new Array(),
    "emailaltcte01": new Array(),
    "ctacgcte01": new Array(),
    "obsercte01": new Array(),
    "totexceso01": new Array(),
    "imagencte01": new Array(),
    "block": new Array(),
    "uid": new Array(),
    "ultimoacceso": new Array(),
    "idcli": new Array(),
    "catcte01": new Array(),
    "transferido": new Array(),
    "password": new Array(),
    "showroom": new Array(),
    "orden": new Array(),
    "website": new Array(),
    "longitud01": new Array(),
    "latitud01": new Array(),
    "zoom01": new Array(),
    "acceder": new Array(),
    "coniva01": new Array(),
    "idemp01": new Array(),
    "codprov01": new Array(),
    "celular01": new Array(),
    "dircliente01": new Array(),
    "razcte01": new Array(),
    "ruc01": new Array(),
    "timenegocio01": new Array(),
    "refbanc01": new Array(),
    "refcom01": new Array(),
    "tarjcred01": new Array(),
    "firmaut01": new Array(),
    "precte01": new Array(),
    "cuotasven01": new Array(),
    "diasven01": new Array(),
    "fechanace01": new Array(),
    "sexo01": new Array(),
    "estadocivil01": new Array(),
    "dirgestion01": new Array(),
    "numhijos01": new Array(),
    "estsop01": new Array(),
    "notick01": new Array(),
    "chequece": new Array(),
    "solcre": new Array(),
    "promocte01": new Array(),
    "pagare01": new Array(),
    "valorpagare01": new Array(),
    "garante01": new Array(),
    "fecvenp01": new Array(),
    "ctacgant01": new Array(),
    "dsn": new Array(),
    "residente": new Array(),
    "medio_contacto": new Array(),
    "separacion_bienes": new Array(),
    "disolucion_conyugal": new Array(),
    "capitulaciones": new Array(),
    "numero_carga_familiar": new Array(),
    "nivel_educacion": new Array(),
    "profesion": new Array(),
    "envio_correspondencia": new Array(),
    "nombre_arrendador": new Array(),
    "apellido_arrendador": new Array(),
    "id_vivienda": new Array(),
    "telefono_arrendador": new Array(),
    "nombres_referencia": new Array(),
    "apellidos_referencia": new Array(),
    "parentesco": new Array(),
    "celular_ref": new Array(),
    "telefono_convencional_ref": new Array(),
    "id_ocupacion": new Array(),
    "fecha_ingreso_empresa": new Array(),
    "nombre_empresa": new Array(),
    "ciudad_empresa": new Array(),
    "provincia_empresa": new Array(),
    "direccion_empresa": new Array(),
    "cargo_empresa": new Array(),
    "telefono_empresa": new Array(),
    "ext_empresa": new Array(),
    "id_tipo_contrato_actividad": new Array(),
    "empresa_jubilo_actividad": new Array(),
    "fecha_salida_empresa_actividad": new Array(),
    "cargo_salida_empresa_actividad": new Array(),
    "fecha_inicio_actividad": new Array(),
    "fecha_ingreso_empresa_actividad": new Array(),
    "nombre_empresa_actividad": new Array(),
    "institucion_actividad": new Array(),
    "ciudad_actividad": new Array(),
    "provincia_actividad": new Array(),
    "direccion_actividad": new Array(),
    "calle_principal_actividad": new Array(),
    "no_actividad": new Array(),
    "calle_secundaria_actividad": new Array(),
    "sector_actividad": new Array(),
    "pais_actividad": new Array(),
    "actividad": new Array(),
    "telefono_actividad": new Array(),
    "cargo_actividad": new Array(),
    "ext_actividad": new Array(),
    "fecha_ingreso_empresa_actividad2": new Array(),
    "nombre_empresa_actividad2": new Array(),
    "institucion_actividad2": new Array(),
    "ciudad_actividad2": new Array(),
    "provincia_actividad2": new Array(),
    "direccion_actividad2": new Array(),
    "calle_principal_actividad2": new Array(),
    "no_actividad2": new Array(),
    "calle_secundaria_actividad2": new Array(),
    "sector_actividad2": new Array(),
    "fecha_salida_empresa_actividad2": new Array(),
    "fecha_inicio_actividad2": new Array(),
    "actividad2": new Array(),
    "telefono_actividad2": new Array(),
    "ext_actividad2": new Array(),
    "cargo_actividad2": new Array(),
    "id_tipo_contrato_actividad2": new Array(),
    "empresa_jubilo_actividad2": new Array(),
    "sueldo": new Array(),
    "arriendos": new Array(),
    "dividendo_utilidades_ultimo_ano": new Array(),
    "id_otros_ingresos": new Array(),
    "arriendo_hipoteca": new Array(),
    "prestamos": new Array(),
    "tarjetas_creditos": new Array(),
    "gastos_familiares": new Array(),
    "id_otros_gastos": new Array(),
    "depositos_bancos": new Array(),
    "cuentas_documentos": new Array(),
    "mercaderias": new Array(),
    "maquinarias_vehiculos": new Array(),
    "terrenos_edificios": new Array(),
    "acciones_bonos_cedulas": new Array(),
    "id_otros_activos": new Array(),
    "cuentas_por_pagar": new Array(),
    "prestamos_banco_menos_ano": new Array(),
    "prestamos_banco_mas_ano": new Array(),
    "deudas_tarjetas_creditos": new Array(),
    "id_otras_obligaciones": new Array(),
    "deudor": new Array(),
    "monto": new Array(),
    "descripcion": new Array(),
    "placa": new Array(),
    "valor_maquinaria_vehiculo": new Array(),
    "a_nombre_de": new Array(),
    "ubicacion": new Array(),
    "valor_propiedad": new Array(),
    "empresa": new Array(),
    "valor_mercado": new Array(),
    "institucion_bancaria": new Array(),
    "monto_banco": new Array(),
    "institucion_finaciera": new Array(),
    "monto_institucion_finaciera": new Array(),
    "id_cliente_juridico": new Array(),
    "nombre_completo_empresa": new Array(),
    "es_empresa_extranjera": new Array(),
    "pais_empresa": new Array(),
    "fecha_constitucion_empresa": new Array(),
    "id_oficina": new Array(),
    "id_tipo_actividad": new Array(),
    "especifique_otros": new Array(),
    "direccion_correspondencia": new Array(),
    "calle_principal_correspondencia": new Array(),
    "no_correspondencia": new Array(),
    "calle_secundaria_correspondencia": new Array(),
    "id_ciudad_correspondencia": new Array(),
    "nombre_empresa_solicitante": new Array(),
    "cargo_empresa_solicitante": new Array(),
    "celular_empresa_solicitante": new Array(),
    "telefono_empresa_solicitante": new Array(),
    "mail_empresa_solicitante": new Array(),
    "saldo_empresa_solicitante": new Array(),
    "nombre_referencia_comerciales": new Array(),
    "fecha_compra": new Array(),
    "telefono_referencia_comerciales": new Array(),
    "ventas": new Array(),
    "comisiones": new Array(),
    "gastos_operativos": new Array(),
    "gastos_administrativos": new Array(),
    "pago_cuotas_prestamo": new Array(),
    "funcionario": new Array(),
    "funcionario_detalle": new Array(),
    "miembro_politico": new Array(),
    "miembro_politico_detalle": new Array(),
    "ejecutivo_gobierno": new Array(),
    "ejecutivo_gobierno_detalle": new Array(),
    "familiar_gobierno": new Array(),
    "familiar_gobierno_detalle": new Array(),
    "familiar_gobierno_detalle_quien": new Array(),
    "otros_ingresos": new Array(),
    "otros_gastos": new Array(),
    "otros_activos": new Array(),
    "otras_obligaciones": new Array(),
    "sector_direccion_empresa": new Array(),
    "sector_direccion_empresa_correo": new Array(),
    "extranjero_nombres_referencia": new Array(),
    "extranjero_apellidos_referencia": new Array(),
    "extranjero_parentesco": new Array(),
    "extranjero_celular_ref": new Array(),
    "extranjero_telefono_convencional_ref": new Array(),
    "cargo_representante_legal": new Array(),
    "direccion_extranjero": new Array(),
    "relacion_dependencia_principal": new Array(),
    "correo_corporativo_principal": new Array(),
    "relacion_dependencia_secundaria": new Array(),
    "correo_corporativo_secundario": new Array(),
    "actividad_secundaria": new Array(),
    "id_pais_empresa": new Array(),
    "id_provincia_empresa": new Array(),
    "id_pais_correo": new Array(),
    "id_provincia_correo": new Array(),
    "apellido_empresa_solicitante": new Array(),
    "pais_actividad2": new Array(),
    "id_provincia_exterior": new Array(),
    "pais_independiente": new Array(),
    "tipo_contrato_otros_actividad_principal": new Array(),
    "actividadeconomica": new Array(),
    "clasesujeto": new Array(),
    "provincia": new Array(),
    "parroquia": new Array(),
    "canton": new Array(),
    "demandajudicial": new Array(),
    "vdemandajudicial": new Array(),
    "carteracastigada": new Array(),
    "vcarteracastigada": new Array(),
    "accesoexterno01": new Array(),
    "referencia": new Array(),
    "id_pais_empleado_dir_desempeno": new Array(),
    "id_provincia_empleado_dir_desempeno": new Array(),
    "id_ciudad_empleado_dir_desempeno": new Array(),
    "razon_social": new Array(),
    "parterel01": new Array(),
    "origen_fondos": new Array(),
    "tipo_identificacion": new Array(),
    "id_actividad": new Array()
  };
  ajax_field_mult["codcte01"][1] = "codcte01";
  ajax_field_mult["tipo_cliente"][1] = "tipo_cliente";
  ajax_field_mult["id_nacionalidad"][1] = "id_nacionalidad";
  ajax_field_mult["nomcte01"][1] = "nomcte01";
  ajax_field_mult["primer_nombre"][1] = "primer_nombre";
  ajax_field_mult["segundo_nombre"][1] = "segundo_nombre";
  ajax_field_mult["primer_apellido"][1] = "primer_apellido";
  ajax_field_mult["segundo_apellido"][1] = "segundo_apellido";
  ajax_field_mult["cv1cte01"][1] = "cv1cte01";
  ajax_field_mult["cv2cte01"][1] = "cv2cte01";
  ajax_field_mult["tipcte01"][1] = "tipcte01";
  ajax_field_mult["ofienccte01"][1] = "ofienccte01";
  ajax_field_mult["vendcte01"][1] = "vendcte01";
  ajax_field_mult["cobrcte01"][1] = "cobrcte01";
  ajax_field_mult["loccte01"][1] = "loccte01";
  ajax_field_mult["dircte01"][1] = "dircte01";
  ajax_field_mult["sector"][1] = "sector";
  ajax_field_mult["calle_principal"][1] = "calle_principal";
  ajax_field_mult["no"][1] = "no";
  ajax_field_mult["calle_secundaria"][1] = "calle_secundaria";
  ajax_field_mult["id_pais"][1] = "id_pais";
  ajax_field_mult["id_provincia"][1] = "id_provincia";
  ajax_field_mult["id_ciudad"][1] = "id_ciudad";
  ajax_field_mult["id_canton"][1] = "id_canton";
  ajax_field_mult["telcte01"][1] = "telcte01";
  ajax_field_mult["cascte01"][1] = "cascte01";
  ajax_field_mult["ci_conyuge"][1] = "ci_conyuge";
  ajax_field_mult["conyuge_tipo_identidad"][1] = "conyuge_tipo_identidad";
  ajax_field_mult["conyuge_primer_nombre"][1] = "conyuge_primer_nombre";
  ajax_field_mult["conyuge_segundo_nombre"][1] = "conyuge_segundo_nombre";
  ajax_field_mult["conyuge_primer_apellido"][1] = "conyuge_primer_apellido";
  ajax_field_mult["conyuge_segundo_apellido"][1] = "conyuge_segundo_apellido";
  ajax_field_mult["conyuge_profesion"][1] = "conyuge_profesion";
  ajax_field_mult["id_tipo_documento"][1] = "id_tipo_documento";
  ajax_field_mult["repleg01"][1] = "repleg01";
  ajax_field_mult["fecing01"][1] = "fecing01";
  ajax_field_mult["condpag01"][1] = "condpag01";
  ajax_field_mult["desctocte01"][1] = "desctocte01";
  ajax_field_mult["limcred01"][1] = "limcred01";
  ajax_field_mult["desppar01"][1] = "desppar01";
  ajax_field_mult["cheqpro01"][1] = "cheqpro01";
  ajax_field_mult["sdoeje01"][1] = "sdoeje01";
  ajax_field_mult["sdoant01"][1] = "sdoant01";
  ajax_field_mult["sdoact01"][1] = "sdoact01";
  ajax_field_mult["acudbm01"][1] = "acudbm01";
  ajax_field_mult["acucrm01"][1] = "acucrm01";
  ajax_field_mult["acudbe01"][1] = "acudbe01";
  ajax_field_mult["acucre01"][1] = "acucre01";
  ajax_field_mult["comentcte01"][1] = "comentcte01";
  ajax_field_mult["statuscte01"][1] = "statuscte01";
  ajax_field_mult["identcte01"][1] = "identcte01";
  ajax_field_mult["cordcte01"][1] = "cordcte01";
  ajax_field_mult["limcant01"][1] = "limcant01";
  ajax_field_mult["pagleg01"][1] = "pagleg01";
  ajax_field_mult["telcte01b"][1] = "telcte01b";
  ajax_field_mult["telcte01c"][1] = "telcte01c";
  ajax_field_mult["emailcte01"][1] = "emailcte01";
  ajax_field_mult["calle_principal_exterior"][1] = "calle_principal_exterior";
  ajax_field_mult["no_exterior"][1] = "no_exterior";
  ajax_field_mult["calle_secundaria_exterior"][1] = "calle_secundaria_exterior";
  ajax_field_mult["id_pais_exterior"][1] = "id_pais_exterior";
  ajax_field_mult["id_ciudad_exterior"][1] = "id_ciudad_exterior";
  ajax_field_mult["codigo_postal_exterior"][1] = "codigo_postal_exterior";
  ajax_field_mult["sector_exterior"][1] = "sector_exterior";
  ajax_field_mult["telefono_exterior"][1] = "telefono_exterior";
  ajax_field_mult["celular_exterior"][1] = "celular_exterior";
  ajax_field_mult["email_exterior"][1] = "email_exterior";
  ajax_field_mult["emailaltcte01"][1] = "emailaltcte01";
  ajax_field_mult["ctacgcte01"][1] = "ctacgcte01";
  ajax_field_mult["obsercte01"][1] = "obsercte01";
  ajax_field_mult["totexceso01"][1] = "totexceso01";
  ajax_field_mult["imagencte01"][1] = "imagencte01";
  ajax_field_mult["block"][1] = "block";
  ajax_field_mult["uid"][1] = "uid";
  ajax_field_mult["ultimoacceso"][1] = "ultimoacceso";
  ajax_field_mult["idcli"][1] = "idcli";
  ajax_field_mult["catcte01"][1] = "catcte01";
  ajax_field_mult["transferido"][1] = "transferido";
  ajax_field_mult["password"][1] = "password";
  ajax_field_mult["showroom"][1] = "showroom";
  ajax_field_mult["orden"][1] = "orden";
  ajax_field_mult["website"][1] = "website";
  ajax_field_mult["longitud01"][1] = "longitud01";
  ajax_field_mult["latitud01"][1] = "latitud01";
  ajax_field_mult["zoom01"][1] = "zoom01";
  ajax_field_mult["acceder"][1] = "acceder";
  ajax_field_mult["coniva01"][1] = "coniva01";
  ajax_field_mult["idemp01"][1] = "idemp01";
  ajax_field_mult["codprov01"][1] = "codprov01";
  ajax_field_mult["celular01"][1] = "celular01";
  ajax_field_mult["dircliente01"][1] = "dircliente01";
  ajax_field_mult["razcte01"][1] = "razcte01";
  ajax_field_mult["ruc01"][1] = "ruc01";
  ajax_field_mult["timenegocio01"][1] = "timenegocio01";
  ajax_field_mult["refbanc01"][1] = "refbanc01";
  ajax_field_mult["refcom01"][1] = "refcom01";
  ajax_field_mult["tarjcred01"][1] = "tarjcred01";
  ajax_field_mult["firmaut01"][1] = "firmaut01";
  ajax_field_mult["precte01"][1] = "precte01";
  ajax_field_mult["cuotasven01"][1] = "cuotasven01";
  ajax_field_mult["diasven01"][1] = "diasven01";
  ajax_field_mult["fechanace01"][1] = "fechanace01";
  ajax_field_mult["sexo01"][1] = "sexo01";
  ajax_field_mult["estadocivil01"][1] = "estadocivil01";
  ajax_field_mult["dirgestion01"][1] = "dirgestion01";
  ajax_field_mult["numhijos01"][1] = "numhijos01";
  ajax_field_mult["estsop01"][1] = "estsop01";
  ajax_field_mult["notick01"][1] = "notick01";
  ajax_field_mult["chequece"][1] = "chequece";
  ajax_field_mult["solcre"][1] = "solcre";
  ajax_field_mult["promocte01"][1] = "promocte01";
  ajax_field_mult["pagare01"][1] = "pagare01";
  ajax_field_mult["valorpagare01"][1] = "valorpagare01";
  ajax_field_mult["garante01"][1] = "garante01";
  ajax_field_mult["fecvenp01"][1] = "fecvenp01";
  ajax_field_mult["ctacgant01"][1] = "ctacgant01";
  ajax_field_mult["dsn"][1] = "dsn";
  ajax_field_mult["residente"][1] = "residente";
  ajax_field_mult["medio_contacto"][1] = "medio_contacto";
  ajax_field_mult["separacion_bienes"][1] = "separacion_bienes";
  ajax_field_mult["disolucion_conyugal"][1] = "disolucion_conyugal";
  ajax_field_mult["capitulaciones"][1] = "capitulaciones";
  ajax_field_mult["numero_carga_familiar"][1] = "numero_carga_familiar";
  ajax_field_mult["nivel_educacion"][1] = "nivel_educacion";
  ajax_field_mult["profesion"][1] = "profesion";
  ajax_field_mult["envio_correspondencia"][1] = "envio_correspondencia";
  ajax_field_mult["nombre_arrendador"][1] = "nombre_arrendador";
  ajax_field_mult["apellido_arrendador"][1] = "apellido_arrendador";
  ajax_field_mult["id_vivienda"][1] = "id_vivienda";
  ajax_field_mult["telefono_arrendador"][1] = "telefono_arrendador";
  ajax_field_mult["nombres_referencia"][1] = "nombres_referencia";
  ajax_field_mult["apellidos_referencia"][1] = "apellidos_referencia";
  ajax_field_mult["parentesco"][1] = "parentesco";
  ajax_field_mult["celular_ref"][1] = "celular_ref";
  ajax_field_mult["telefono_convencional_ref"][1] = "telefono_convencional_ref";
  ajax_field_mult["id_ocupacion"][1] = "id_ocupacion";
  ajax_field_mult["fecha_ingreso_empresa"][1] = "fecha_ingreso_empresa";
  ajax_field_mult["nombre_empresa"][1] = "nombre_empresa";
  ajax_field_mult["ciudad_empresa"][1] = "ciudad_empresa";
  ajax_field_mult["provincia_empresa"][1] = "provincia_empresa";
  ajax_field_mult["direccion_empresa"][1] = "direccion_empresa";
  ajax_field_mult["cargo_empresa"][1] = "cargo_empresa";
  ajax_field_mult["telefono_empresa"][1] = "telefono_empresa";
  ajax_field_mult["ext_empresa"][1] = "ext_empresa";
  ajax_field_mult["id_tipo_contrato_actividad"][1] = "id_tipo_contrato_actividad";
  ajax_field_mult["empresa_jubilo_actividad"][1] = "empresa_jubilo_actividad";
  ajax_field_mult["fecha_salida_empresa_actividad"][1] = "fecha_salida_empresa_actividad";
  ajax_field_mult["cargo_salida_empresa_actividad"][1] = "cargo_salida_empresa_actividad";
  ajax_field_mult["fecha_inicio_actividad"][1] = "fecha_inicio_actividad";
  ajax_field_mult["fecha_ingreso_empresa_actividad"][1] = "fecha_ingreso_empresa_actividad";
  ajax_field_mult["nombre_empresa_actividad"][1] = "nombre_empresa_actividad";
  ajax_field_mult["institucion_actividad"][1] = "institucion_actividad";
  ajax_field_mult["ciudad_actividad"][1] = "ciudad_actividad";
  ajax_field_mult["provincia_actividad"][1] = "provincia_actividad";
  ajax_field_mult["direccion_actividad"][1] = "direccion_actividad";
  ajax_field_mult["calle_principal_actividad"][1] = "calle_principal_actividad";
  ajax_field_mult["no_actividad"][1] = "no_actividad";
  ajax_field_mult["calle_secundaria_actividad"][1] = "calle_secundaria_actividad";
  ajax_field_mult["sector_actividad"][1] = "sector_actividad";
  ajax_field_mult["pais_actividad"][1] = "pais_actividad";
  ajax_field_mult["actividad"][1] = "actividad";
  ajax_field_mult["telefono_actividad"][1] = "telefono_actividad";
  ajax_field_mult["cargo_actividad"][1] = "cargo_actividad";
  ajax_field_mult["ext_actividad"][1] = "ext_actividad";
  ajax_field_mult["fecha_ingreso_empresa_actividad2"][1] = "fecha_ingreso_empresa_actividad2";
  ajax_field_mult["nombre_empresa_actividad2"][1] = "nombre_empresa_actividad2";
  ajax_field_mult["institucion_actividad2"][1] = "institucion_actividad2";
  ajax_field_mult["ciudad_actividad2"][1] = "ciudad_actividad2";
  ajax_field_mult["provincia_actividad2"][1] = "provincia_actividad2";
  ajax_field_mult["direccion_actividad2"][1] = "direccion_actividad2";
  ajax_field_mult["calle_principal_actividad2"][1] = "calle_principal_actividad2";
  ajax_field_mult["no_actividad2"][1] = "no_actividad2";
  ajax_field_mult["calle_secundaria_actividad2"][1] = "calle_secundaria_actividad2";
  ajax_field_mult["sector_actividad2"][1] = "sector_actividad2";
  ajax_field_mult["fecha_salida_empresa_actividad2"][1] = "fecha_salida_empresa_actividad2";
  ajax_field_mult["fecha_inicio_actividad2"][1] = "fecha_inicio_actividad2";
  ajax_field_mult["actividad2"][1] = "actividad2";
  ajax_field_mult["telefono_actividad2"][1] = "telefono_actividad2";
  ajax_field_mult["ext_actividad2"][1] = "ext_actividad2";
  ajax_field_mult["cargo_actividad2"][1] = "cargo_actividad2";
  ajax_field_mult["id_tipo_contrato_actividad2"][1] = "id_tipo_contrato_actividad2";
  ajax_field_mult["empresa_jubilo_actividad2"][1] = "empresa_jubilo_actividad2";
  ajax_field_mult["sueldo"][1] = "sueldo";
  ajax_field_mult["arriendos"][1] = "arriendos";
  ajax_field_mult["dividendo_utilidades_ultimo_ano"][1] = "dividendo_utilidades_ultimo_ano";
  ajax_field_mult["id_otros_ingresos"][1] = "id_otros_ingresos";
  ajax_field_mult["arriendo_hipoteca"][1] = "arriendo_hipoteca";
  ajax_field_mult["prestamos"][1] = "prestamos";
  ajax_field_mult["tarjetas_creditos"][1] = "tarjetas_creditos";
  ajax_field_mult["gastos_familiares"][1] = "gastos_familiares";
  ajax_field_mult["id_otros_gastos"][1] = "id_otros_gastos";
  ajax_field_mult["depositos_bancos"][1] = "depositos_bancos";
  ajax_field_mult["cuentas_documentos"][1] = "cuentas_documentos";
  ajax_field_mult["mercaderias"][1] = "mercaderias";
  ajax_field_mult["maquinarias_vehiculos"][1] = "maquinarias_vehiculos";
  ajax_field_mult["terrenos_edificios"][1] = "terrenos_edificios";
  ajax_field_mult["acciones_bonos_cedulas"][1] = "acciones_bonos_cedulas";
  ajax_field_mult["id_otros_activos"][1] = "id_otros_activos";
  ajax_field_mult["cuentas_por_pagar"][1] = "cuentas_por_pagar";
  ajax_field_mult["prestamos_banco_menos_ano"][1] = "prestamos_banco_menos_ano";
  ajax_field_mult["prestamos_banco_mas_ano"][1] = "prestamos_banco_mas_ano";
  ajax_field_mult["deudas_tarjetas_creditos"][1] = "deudas_tarjetas_creditos";
  ajax_field_mult["id_otras_obligaciones"][1] = "id_otras_obligaciones";
  ajax_field_mult["deudor"][1] = "deudor";
  ajax_field_mult["monto"][1] = "monto";
  ajax_field_mult["descripcion"][1] = "descripcion";
  ajax_field_mult["placa"][1] = "placa";
  ajax_field_mult["valor_maquinaria_vehiculo"][1] = "valor_maquinaria_vehiculo";
  ajax_field_mult["a_nombre_de"][1] = "a_nombre_de";
  ajax_field_mult["ubicacion"][1] = "ubicacion";
  ajax_field_mult["valor_propiedad"][1] = "valor_propiedad";
  ajax_field_mult["empresa"][1] = "empresa";
  ajax_field_mult["valor_mercado"][1] = "valor_mercado";
  ajax_field_mult["institucion_bancaria"][1] = "institucion_bancaria";
  ajax_field_mult["monto_banco"][1] = "monto_banco";
  ajax_field_mult["institucion_finaciera"][1] = "institucion_finaciera";
  ajax_field_mult["monto_institucion_finaciera"][1] = "monto_institucion_finaciera";
  ajax_field_mult["id_cliente_juridico"][1] = "id_cliente_juridico";
  ajax_field_mult["nombre_completo_empresa"][1] = "nombre_completo_empresa";
  ajax_field_mult["es_empresa_extranjera"][1] = "es_empresa_extranjera";
  ajax_field_mult["pais_empresa"][1] = "pais_empresa";
  ajax_field_mult["fecha_constitucion_empresa"][1] = "fecha_constitucion_empresa";
  ajax_field_mult["id_oficina"][1] = "id_oficina";
  ajax_field_mult["id_tipo_actividad"][1] = "id_tipo_actividad";
  ajax_field_mult["especifique_otros"][1] = "especifique_otros";
  ajax_field_mult["direccion_correspondencia"][1] = "direccion_correspondencia";
  ajax_field_mult["calle_principal_correspondencia"][1] = "calle_principal_correspondencia";
  ajax_field_mult["no_correspondencia"][1] = "no_correspondencia";
  ajax_field_mult["calle_secundaria_correspondencia"][1] = "calle_secundaria_correspondencia";
  ajax_field_mult["id_ciudad_correspondencia"][1] = "id_ciudad_correspondencia";
  ajax_field_mult["nombre_empresa_solicitante"][1] = "nombre_empresa_solicitante";
  ajax_field_mult["cargo_empresa_solicitante"][1] = "cargo_empresa_solicitante";
  ajax_field_mult["celular_empresa_solicitante"][1] = "celular_empresa_solicitante";
  ajax_field_mult["telefono_empresa_solicitante"][1] = "telefono_empresa_solicitante";
  ajax_field_mult["mail_empresa_solicitante"][1] = "mail_empresa_solicitante";
  ajax_field_mult["saldo_empresa_solicitante"][1] = "saldo_empresa_solicitante";
  ajax_field_mult["nombre_referencia_comerciales"][1] = "nombre_referencia_comerciales";
  ajax_field_mult["fecha_compra"][1] = "fecha_compra";
  ajax_field_mult["telefono_referencia_comerciales"][1] = "telefono_referencia_comerciales";
  ajax_field_mult["ventas"][1] = "ventas";
  ajax_field_mult["comisiones"][1] = "comisiones";
  ajax_field_mult["gastos_operativos"][1] = "gastos_operativos";
  ajax_field_mult["gastos_administrativos"][1] = "gastos_administrativos";
  ajax_field_mult["pago_cuotas_prestamo"][1] = "pago_cuotas_prestamo";
  ajax_field_mult["funcionario"][1] = "funcionario";
  ajax_field_mult["funcionario_detalle"][1] = "funcionario_detalle";
  ajax_field_mult["miembro_politico"][1] = "miembro_politico";
  ajax_field_mult["miembro_politico_detalle"][1] = "miembro_politico_detalle";
  ajax_field_mult["ejecutivo_gobierno"][1] = "ejecutivo_gobierno";
  ajax_field_mult["ejecutivo_gobierno_detalle"][1] = "ejecutivo_gobierno_detalle";
  ajax_field_mult["familiar_gobierno"][1] = "familiar_gobierno";
  ajax_field_mult["familiar_gobierno_detalle"][1] = "familiar_gobierno_detalle";
  ajax_field_mult["familiar_gobierno_detalle_quien"][1] = "familiar_gobierno_detalle_quien";
  ajax_field_mult["otros_ingresos"][1] = "otros_ingresos";
  ajax_field_mult["otros_gastos"][1] = "otros_gastos";
  ajax_field_mult["otros_activos"][1] = "otros_activos";
  ajax_field_mult["otras_obligaciones"][1] = "otras_obligaciones";
  ajax_field_mult["sector_direccion_empresa"][1] = "sector_direccion_empresa";
  ajax_field_mult["sector_direccion_empresa_correo"][1] = "sector_direccion_empresa_correo";
  ajax_field_mult["extranjero_nombres_referencia"][1] = "extranjero_nombres_referencia";
  ajax_field_mult["extranjero_apellidos_referencia"][1] = "extranjero_apellidos_referencia";
  ajax_field_mult["extranjero_parentesco"][1] = "extranjero_parentesco";
  ajax_field_mult["extranjero_celular_ref"][1] = "extranjero_celular_ref";
  ajax_field_mult["extranjero_telefono_convencional_ref"][1] = "extranjero_telefono_convencional_ref";
  ajax_field_mult["cargo_representante_legal"][1] = "cargo_representante_legal";
  ajax_field_mult["direccion_extranjero"][1] = "direccion_extranjero";
  ajax_field_mult["relacion_dependencia_principal"][1] = "relacion_dependencia_principal";
  ajax_field_mult["correo_corporativo_principal"][1] = "correo_corporativo_principal";
  ajax_field_mult["relacion_dependencia_secundaria"][1] = "relacion_dependencia_secundaria";
  ajax_field_mult["correo_corporativo_secundario"][1] = "correo_corporativo_secundario";
  ajax_field_mult["actividad_secundaria"][1] = "actividad_secundaria";
  ajax_field_mult["id_pais_empresa"][1] = "id_pais_empresa";
  ajax_field_mult["id_provincia_empresa"][1] = "id_provincia_empresa";
  ajax_field_mult["id_pais_correo"][1] = "id_pais_correo";
  ajax_field_mult["id_provincia_correo"][1] = "id_provincia_correo";
  ajax_field_mult["apellido_empresa_solicitante"][1] = "apellido_empresa_solicitante";
  ajax_field_mult["pais_actividad2"][1] = "pais_actividad2";
  ajax_field_mult["id_provincia_exterior"][1] = "id_provincia_exterior";
  ajax_field_mult["pais_independiente"][1] = "pais_independiente";
  ajax_field_mult["tipo_contrato_otros_actividad_principal"][1] = "tipo_contrato_otros_actividad_principal";
  ajax_field_mult["actividadeconomica"][1] = "actividadeconomica";
  ajax_field_mult["clasesujeto"][1] = "clasesujeto";
  ajax_field_mult["provincia"][1] = "provincia";
  ajax_field_mult["parroquia"][1] = "parroquia";
  ajax_field_mult["canton"][1] = "canton";
  ajax_field_mult["demandajudicial"][1] = "demandajudicial";
  ajax_field_mult["vdemandajudicial"][1] = "vdemandajudicial";
  ajax_field_mult["carteracastigada"][1] = "carteracastigada";
  ajax_field_mult["vcarteracastigada"][1] = "vcarteracastigada";
  ajax_field_mult["accesoexterno01"][1] = "accesoexterno01";
  ajax_field_mult["referencia"][1] = "referencia";
  ajax_field_mult["id_pais_empleado_dir_desempeno"][1] = "id_pais_empleado_dir_desempeno";
  ajax_field_mult["id_provincia_empleado_dir_desempeno"][1] = "id_provincia_empleado_dir_desempeno";
  ajax_field_mult["id_ciudad_empleado_dir_desempeno"][1] = "id_ciudad_empleado_dir_desempeno";
  ajax_field_mult["razon_social"][1] = "razon_social";
  ajax_field_mult["parterel01"][1] = "parterel01";
  ajax_field_mult["origen_fondos"][1] = "origen_fondos";
  ajax_field_mult["tipo_identificacion"][1] = "tipo_identificacion";
  ajax_field_mult["id_actividad"][1] = "id_actividad";

  var ajax_field_id = {
    "codcte01": new Array("hidden_field_label_codcte01", "hidden_field_data_codcte01"),
    "tipo_cliente": new Array("hidden_field_label_tipo_cliente", "hidden_field_data_tipo_cliente"),
    "id_nacionalidad": new Array("hidden_field_label_id_nacionalidad", "hidden_field_data_id_nacionalidad"),
    "nomcte01": new Array("hidden_field_label_nomcte01", "hidden_field_data_nomcte01"),
    "primer_nombre": new Array("hidden_field_label_primer_nombre", "hidden_field_data_primer_nombre"),
    "segundo_nombre": new Array("hidden_field_label_segundo_nombre", "hidden_field_data_segundo_nombre"),
    "primer_apellido": new Array("hidden_field_label_primer_apellido", "hidden_field_data_primer_apellido"),
    "segundo_apellido": new Array("hidden_field_label_segundo_apellido", "hidden_field_data_segundo_apellido"),
    "cv1cte01": new Array("hidden_field_label_cv1cte01", "hidden_field_data_cv1cte01"),
    "cv2cte01": new Array("hidden_field_label_cv2cte01", "hidden_field_data_cv2cte01"),
    "tipcte01": new Array("hidden_field_label_tipcte01", "hidden_field_data_tipcte01"),
    "ofienccte01": new Array("hidden_field_label_ofienccte01", "hidden_field_data_ofienccte01"),
    "vendcte01": new Array("hidden_field_label_vendcte01", "hidden_field_data_vendcte01"),
    "cobrcte01": new Array("hidden_field_label_cobrcte01", "hidden_field_data_cobrcte01"),
    "loccte01": new Array("hidden_field_label_loccte01", "hidden_field_data_loccte01"),
    "dircte01": new Array("hidden_field_label_dircte01", "hidden_field_data_dircte01"),
    "sector": new Array("hidden_field_label_sector", "hidden_field_data_sector"),
    "calle_principal": new Array("hidden_field_label_calle_principal", "hidden_field_data_calle_principal"),
    "no": new Array("hidden_field_label_no", "hidden_field_data_no"),
    "calle_secundaria": new Array("hidden_field_label_calle_secundaria", "hidden_field_data_calle_secundaria"),
    "id_pais": new Array("hidden_field_label_id_pais", "hidden_field_data_id_pais"),
    "id_provincia": new Array("hidden_field_label_id_provincia", "hidden_field_data_id_provincia"),
    "id_ciudad": new Array("hidden_field_label_id_ciudad", "hidden_field_data_id_ciudad"),
    "id_canton": new Array("hidden_field_label_id_canton", "hidden_field_data_id_canton"),
    "telcte01": new Array("hidden_field_label_telcte01", "hidden_field_data_telcte01"),
    "cascte01": new Array("hidden_field_label_cascte01", "hidden_field_data_cascte01"),
    "ci_conyuge": new Array("hidden_field_label_ci_conyuge", "hidden_field_data_ci_conyuge"),
    "conyuge_tipo_identidad": new Array("hidden_field_label_conyuge_tipo_identidad", "hidden_field_data_conyuge_tipo_identidad"),
    "conyuge_primer_nombre": new Array("hidden_field_label_conyuge_primer_nombre", "hidden_field_data_conyuge_primer_nombre"),
    "conyuge_segundo_nombre": new Array("hidden_field_label_conyuge_segundo_nombre", "hidden_field_data_conyuge_segundo_nombre"),
    "conyuge_primer_apellido": new Array("hidden_field_label_conyuge_primer_apellido", "hidden_field_data_conyuge_primer_apellido"),
    "conyuge_segundo_apellido": new Array("hidden_field_label_conyuge_segundo_apellido", "hidden_field_data_conyuge_segundo_apellido"),
    "conyuge_profesion": new Array("hidden_field_label_conyuge_profesion", "hidden_field_data_conyuge_profesion"),
    "id_tipo_documento": new Array("hidden_field_label_id_tipo_documento", "hidden_field_data_id_tipo_documento"),
    "repleg01": new Array("hidden_field_label_repleg01", "hidden_field_data_repleg01"),
    "fecing01": new Array("hidden_field_label_fecing01", "hidden_field_data_fecing01"),
    "condpag01": new Array("hidden_field_label_condpag01", "hidden_field_data_condpag01"),
    "desctocte01": new Array("hidden_field_label_desctocte01", "hidden_field_data_desctocte01"),
    "limcred01": new Array("hidden_field_label_limcred01", "hidden_field_data_limcred01"),
    "desppar01": new Array("hidden_field_label_desppar01", "hidden_field_data_desppar01"),
    "cheqpro01": new Array("hidden_field_label_cheqpro01", "hidden_field_data_cheqpro01"),
    "sdoeje01": new Array("hidden_field_label_sdoeje01", "hidden_field_data_sdoeje01"),
    "sdoant01": new Array("hidden_field_label_sdoant01", "hidden_field_data_sdoant01"),
    "sdoact01": new Array("hidden_field_label_sdoact01", "hidden_field_data_sdoact01"),
    "acudbm01": new Array("hidden_field_label_acudbm01", "hidden_field_data_acudbm01"),
    "acucrm01": new Array("hidden_field_label_acucrm01", "hidden_field_data_acucrm01"),
    "acudbe01": new Array("hidden_field_label_acudbe01", "hidden_field_data_acudbe01"),
    "acucre01": new Array("hidden_field_label_acucre01", "hidden_field_data_acucre01"),
    "comentcte01": new Array("hidden_field_label_comentcte01", "hidden_field_data_comentcte01"),
    "statuscte01": new Array("hidden_field_label_statuscte01", "hidden_field_data_statuscte01"),
    "identcte01": new Array("hidden_field_label_identcte01", "hidden_field_data_identcte01"),
    "cordcte01": new Array("hidden_field_label_cordcte01", "hidden_field_data_cordcte01"),
    "limcant01": new Array("hidden_field_label_limcant01", "hidden_field_data_limcant01"),
    "pagleg01": new Array("hidden_field_label_pagleg01", "hidden_field_data_pagleg01"),
    "telcte01b": new Array("hidden_field_label_telcte01b", "hidden_field_data_telcte01b"),
    "telcte01c": new Array("hidden_field_label_telcte01c", "hidden_field_data_telcte01c"),
    "emailcte01": new Array("hidden_field_label_emailcte01", "hidden_field_data_emailcte01"),
    "calle_principal_exterior": new Array("hidden_field_label_calle_principal_exterior", "hidden_field_data_calle_principal_exterior"),
    "no_exterior": new Array("hidden_field_label_no_exterior", "hidden_field_data_no_exterior"),
    "calle_secundaria_exterior": new Array("hidden_field_label_calle_secundaria_exterior", "hidden_field_data_calle_secundaria_exterior"),
    "id_pais_exterior": new Array("hidden_field_label_id_pais_exterior", "hidden_field_data_id_pais_exterior"),
    "id_ciudad_exterior": new Array("hidden_field_label_id_ciudad_exterior", "hidden_field_data_id_ciudad_exterior"),
    "codigo_postal_exterior": new Array("hidden_field_label_codigo_postal_exterior", "hidden_field_data_codigo_postal_exterior"),
    "sector_exterior": new Array("hidden_field_label_sector_exterior", "hidden_field_data_sector_exterior"),
    "telefono_exterior": new Array("hidden_field_label_telefono_exterior", "hidden_field_data_telefono_exterior"),
    "celular_exterior": new Array("hidden_field_label_celular_exterior", "hidden_field_data_celular_exterior"),
    "email_exterior": new Array("hidden_field_label_email_exterior", "hidden_field_data_email_exterior"),
    "emailaltcte01": new Array("hidden_field_label_emailaltcte01", "hidden_field_data_emailaltcte01"),
    "ctacgcte01": new Array("hidden_field_label_ctacgcte01", "hidden_field_data_ctacgcte01"),
    "obsercte01": new Array("hidden_field_label_obsercte01", "hidden_field_data_obsercte01"),
    "totexceso01": new Array("hidden_field_label_totexceso01", "hidden_field_data_totexceso01"),
    "imagencte01": new Array("hidden_field_label_imagencte01", "hidden_field_data_imagencte01"),
    "block": new Array("hidden_field_label_block", "hidden_field_data_block"),
    "uid": new Array("hidden_field_label_uid", "hidden_field_data_uid"),
    "ultimoacceso": new Array("hidden_field_label_ultimoacceso", "hidden_field_data_ultimoacceso"),
    "idcli": new Array("hidden_field_label_idcli", "hidden_field_data_idcli"),
    "catcte01": new Array("hidden_field_label_catcte01", "hidden_field_data_catcte01"),
    "transferido": new Array("hidden_field_label_transferido", "hidden_field_data_transferido"),
    "password": new Array("hidden_field_label_password", "hidden_field_data_password"),
    "showroom": new Array("hidden_field_label_showroom", "hidden_field_data_showroom"),
    "orden": new Array("hidden_field_label_orden", "hidden_field_data_orden"),
    "website": new Array("hidden_field_label_website", "hidden_field_data_website"),
    "longitud01": new Array("hidden_field_label_longitud01", "hidden_field_data_longitud01"),
    "latitud01": new Array("hidden_field_label_latitud01", "hidden_field_data_latitud01"),
    "zoom01": new Array("hidden_field_label_zoom01", "hidden_field_data_zoom01"),
    "acceder": new Array("hidden_field_label_acceder", "hidden_field_data_acceder"),
    "coniva01": new Array("hidden_field_label_coniva01", "hidden_field_data_coniva01"),
    "idemp01": new Array("hidden_field_label_idemp01", "hidden_field_data_idemp01"),
    "codprov01": new Array("hidden_field_label_codprov01", "hidden_field_data_codprov01"),
    "celular01": new Array("hidden_field_label_celular01", "hidden_field_data_celular01"),
    "dircliente01": new Array("hidden_field_label_dircliente01", "hidden_field_data_dircliente01"),
    "razcte01": new Array("hidden_field_label_razcte01", "hidden_field_data_razcte01"),
    "ruc01": new Array("hidden_field_label_ruc01", "hidden_field_data_ruc01"),
    "timenegocio01": new Array("hidden_field_label_timenegocio01", "hidden_field_data_timenegocio01"),
    "refbanc01": new Array("hidden_field_label_refbanc01", "hidden_field_data_refbanc01"),
    "refcom01": new Array("hidden_field_label_refcom01", "hidden_field_data_refcom01"),
    "tarjcred01": new Array("hidden_field_label_tarjcred01", "hidden_field_data_tarjcred01"),
    "firmaut01": new Array("hidden_field_label_firmaut01", "hidden_field_data_firmaut01"),
    "precte01": new Array("hidden_field_label_precte01", "hidden_field_data_precte01"),
    "cuotasven01": new Array("hidden_field_label_cuotasven01", "hidden_field_data_cuotasven01"),
    "diasven01": new Array("hidden_field_label_diasven01", "hidden_field_data_diasven01"),
    "fechanace01": new Array("hidden_field_label_fechanace01", "hidden_field_data_fechanace01"),
    "sexo01": new Array("hidden_field_label_sexo01", "hidden_field_data_sexo01"),
    "estadocivil01": new Array("hidden_field_label_estadocivil01", "hidden_field_data_estadocivil01"),
    "dirgestion01": new Array("hidden_field_label_dirgestion01", "hidden_field_data_dirgestion01"),
    "numhijos01": new Array("hidden_field_label_numhijos01", "hidden_field_data_numhijos01"),
    "estsop01": new Array("hidden_field_label_estsop01", "hidden_field_data_estsop01"),
    "notick01": new Array("hidden_field_label_notick01", "hidden_field_data_notick01"),
    "chequece": new Array("hidden_field_label_chequece", "hidden_field_data_chequece"),
    "solcre": new Array("hidden_field_label_solcre", "hidden_field_data_solcre"),
    "promocte01": new Array("hidden_field_label_promocte01", "hidden_field_data_promocte01"),
    "pagare01": new Array("hidden_field_label_pagare01", "hidden_field_data_pagare01"),
    "valorpagare01": new Array("hidden_field_label_valorpagare01", "hidden_field_data_valorpagare01"),
    "garante01": new Array("hidden_field_label_garante01", "hidden_field_data_garante01"),
    "fecvenp01": new Array("hidden_field_label_fecvenp01", "hidden_field_data_fecvenp01"),
    "ctacgant01": new Array("hidden_field_label_ctacgant01", "hidden_field_data_ctacgant01"),
    "dsn": new Array("hidden_field_label_dsn", "hidden_field_data_dsn"),
    "residente": new Array("hidden_field_label_residente", "hidden_field_data_residente"),
    "medio_contacto": new Array("hidden_field_label_medio_contacto", "hidden_field_data_medio_contacto"),
    "separacion_bienes": new Array("hidden_field_label_separacion_bienes", "hidden_field_data_separacion_bienes"),
    "disolucion_conyugal": new Array("hidden_field_label_disolucion_conyugal", "hidden_field_data_disolucion_conyugal"),
    "capitulaciones": new Array("hidden_field_label_capitulaciones", "hidden_field_data_capitulaciones"),
    "numero_carga_familiar": new Array("hidden_field_label_numero_carga_familiar", "hidden_field_data_numero_carga_familiar"),
    "nivel_educacion": new Array("hidden_field_label_nivel_educacion", "hidden_field_data_nivel_educacion"),
    "profesion": new Array("hidden_field_label_profesion", "hidden_field_data_profesion"),
    "envio_correspondencia": new Array("hidden_field_label_envio_correspondencia", "hidden_field_data_envio_correspondencia"),
    "nombre_arrendador": new Array("hidden_field_label_nombre_arrendador", "hidden_field_data_nombre_arrendador"),
    "apellido_arrendador": new Array("hidden_field_label_apellido_arrendador", "hidden_field_data_apellido_arrendador"),
    "id_vivienda": new Array("hidden_field_label_id_vivienda", "hidden_field_data_id_vivienda"),
    "telefono_arrendador": new Array("hidden_field_label_telefono_arrendador", "hidden_field_data_telefono_arrendador"),
    "nombres_referencia": new Array("hidden_field_label_nombres_referencia", "hidden_field_data_nombres_referencia"),
    "apellidos_referencia": new Array("hidden_field_label_apellidos_referencia", "hidden_field_data_apellidos_referencia"),
    "parentesco": new Array("hidden_field_label_parentesco", "hidden_field_data_parentesco"),
    "celular_ref": new Array("hidden_field_label_celular_ref", "hidden_field_data_celular_ref"),
    "telefono_convencional_ref": new Array("hidden_field_label_telefono_convencional_ref", "hidden_field_data_telefono_convencional_ref"),
    "id_ocupacion": new Array("hidden_field_label_id_ocupacion", "hidden_field_data_id_ocupacion"),
    "fecha_ingreso_empresa": new Array("hidden_field_label_fecha_ingreso_empresa", "hidden_field_data_fecha_ingreso_empresa"),
    "nombre_empresa": new Array("hidden_field_label_nombre_empresa", "hidden_field_data_nombre_empresa"),
    "ciudad_empresa": new Array("hidden_field_label_ciudad_empresa", "hidden_field_data_ciudad_empresa"),
    "provincia_empresa": new Array("hidden_field_label_provincia_empresa", "hidden_field_data_provincia_empresa"),
    "direccion_empresa": new Array("hidden_field_label_direccion_empresa", "hidden_field_data_direccion_empresa"),
    "cargo_empresa": new Array("hidden_field_label_cargo_empresa", "hidden_field_data_cargo_empresa"),
    "telefono_empresa": new Array("hidden_field_label_telefono_empresa", "hidden_field_data_telefono_empresa"),
    "ext_empresa": new Array("hidden_field_label_ext_empresa", "hidden_field_data_ext_empresa"),
    "id_tipo_contrato_actividad": new Array("hidden_field_label_id_tipo_contrato_actividad", "hidden_field_data_id_tipo_contrato_actividad"),
    "empresa_jubilo_actividad": new Array("hidden_field_label_empresa_jubilo_actividad", "hidden_field_data_empresa_jubilo_actividad"),
    "fecha_salida_empresa_actividad": new Array("hidden_field_label_fecha_salida_empresa_actividad", "hidden_field_data_fecha_salida_empresa_actividad"),
    "cargo_salida_empresa_actividad": new Array("hidden_field_label_cargo_salida_empresa_actividad", "hidden_field_data_cargo_salida_empresa_actividad"),
    "fecha_inicio_actividad": new Array("hidden_field_label_fecha_inicio_actividad", "hidden_field_data_fecha_inicio_actividad"),
    "fecha_ingreso_empresa_actividad": new Array("hidden_field_label_fecha_ingreso_empresa_actividad", "hidden_field_data_fecha_ingreso_empresa_actividad"),
    "nombre_empresa_actividad": new Array("hidden_field_label_nombre_empresa_actividad", "hidden_field_data_nombre_empresa_actividad"),
    "institucion_actividad": new Array("hidden_field_label_institucion_actividad", "hidden_field_data_institucion_actividad"),
    "ciudad_actividad": new Array("hidden_field_label_ciudad_actividad", "hidden_field_data_ciudad_actividad"),
    "provincia_actividad": new Array("hidden_field_label_provincia_actividad", "hidden_field_data_provincia_actividad"),
    "direccion_actividad": new Array("hidden_field_label_direccion_actividad", "hidden_field_data_direccion_actividad"),
    "calle_principal_actividad": new Array("hidden_field_label_calle_principal_actividad", "hidden_field_data_calle_principal_actividad"),
    "no_actividad": new Array("hidden_field_label_no_actividad", "hidden_field_data_no_actividad"),
    "calle_secundaria_actividad": new Array("hidden_field_label_calle_secundaria_actividad", "hidden_field_data_calle_secundaria_actividad"),
    "sector_actividad": new Array("hidden_field_label_sector_actividad", "hidden_field_data_sector_actividad"),
    "pais_actividad": new Array("hidden_field_label_pais_actividad", "hidden_field_data_pais_actividad"),
    "actividad": new Array("hidden_field_label_actividad", "hidden_field_data_actividad"),
    "telefono_actividad": new Array("hidden_field_label_telefono_actividad", "hidden_field_data_telefono_actividad"),
    "cargo_actividad": new Array("hidden_field_label_cargo_actividad", "hidden_field_data_cargo_actividad"),
    "ext_actividad": new Array("hidden_field_label_ext_actividad", "hidden_field_data_ext_actividad"),
    "fecha_ingreso_empresa_actividad2": new Array("hidden_field_label_fecha_ingreso_empresa_actividad2", "hidden_field_data_fecha_ingreso_empresa_actividad2"),
    "nombre_empresa_actividad2": new Array("hidden_field_label_nombre_empresa_actividad2", "hidden_field_data_nombre_empresa_actividad2"),
    "institucion_actividad2": new Array("hidden_field_label_institucion_actividad2", "hidden_field_data_institucion_actividad2"),
    "ciudad_actividad2": new Array("hidden_field_label_ciudad_actividad2", "hidden_field_data_ciudad_actividad2"),
    "provincia_actividad2": new Array("hidden_field_label_provincia_actividad2", "hidden_field_data_provincia_actividad2"),
    "direccion_actividad2": new Array("hidden_field_label_direccion_actividad2", "hidden_field_data_direccion_actividad2"),
    "calle_principal_actividad2": new Array("hidden_field_label_calle_principal_actividad2", "hidden_field_data_calle_principal_actividad2"),
    "no_actividad2": new Array("hidden_field_label_no_actividad2", "hidden_field_data_no_actividad2"),
    "calle_secundaria_actividad2": new Array("hidden_field_label_calle_secundaria_actividad2", "hidden_field_data_calle_secundaria_actividad2"),
    "sector_actividad2": new Array("hidden_field_label_sector_actividad2", "hidden_field_data_sector_actividad2"),
    "fecha_salida_empresa_actividad2": new Array("hidden_field_label_fecha_salida_empresa_actividad2", "hidden_field_data_fecha_salida_empresa_actividad2"),
    "fecha_inicio_actividad2": new Array("hidden_field_label_fecha_inicio_actividad2", "hidden_field_data_fecha_inicio_actividad2"),
    "actividad2": new Array("hidden_field_label_actividad2", "hidden_field_data_actividad2"),
    "telefono_actividad2": new Array("hidden_field_label_telefono_actividad2", "hidden_field_data_telefono_actividad2"),
    "ext_actividad2": new Array("hidden_field_label_ext_actividad2", "hidden_field_data_ext_actividad2"),
    "cargo_actividad2": new Array("hidden_field_label_cargo_actividad2", "hidden_field_data_cargo_actividad2"),
    "id_tipo_contrato_actividad2": new Array("hidden_field_label_id_tipo_contrato_actividad2", "hidden_field_data_id_tipo_contrato_actividad2"),
    "empresa_jubilo_actividad2": new Array("hidden_field_label_empresa_jubilo_actividad2", "hidden_field_data_empresa_jubilo_actividad2"),
    "sueldo": new Array("hidden_field_label_sueldo", "hidden_field_data_sueldo"),
    "arriendos": new Array("hidden_field_label_arriendos", "hidden_field_data_arriendos"),
    "dividendo_utilidades_ultimo_ano": new Array("hidden_field_label_dividendo_utilidades_ultimo_ano", "hidden_field_data_dividendo_utilidades_ultimo_ano"),
    "id_otros_ingresos": new Array("hidden_field_label_id_otros_ingresos", "hidden_field_data_id_otros_ingresos"),
    "arriendo_hipoteca": new Array("hidden_field_label_arriendo_hipoteca", "hidden_field_data_arriendo_hipoteca"),
    "prestamos": new Array("hidden_field_label_prestamos", "hidden_field_data_prestamos"),
    "tarjetas_creditos": new Array("hidden_field_label_tarjetas_creditos", "hidden_field_data_tarjetas_creditos"),
    "gastos_familiares": new Array("hidden_field_label_gastos_familiares", "hidden_field_data_gastos_familiares"),
    "id_otros_gastos": new Array("hidden_field_label_id_otros_gastos", "hidden_field_data_id_otros_gastos"),
    "depositos_bancos": new Array("hidden_field_label_depositos_bancos", "hidden_field_data_depositos_bancos"),
    "cuentas_documentos": new Array("hidden_field_label_cuentas_documentos", "hidden_field_data_cuentas_documentos"),
    "mercaderias": new Array("hidden_field_label_mercaderias", "hidden_field_data_mercaderias"),
    "maquinarias_vehiculos": new Array("hidden_field_label_maquinarias_vehiculos", "hidden_field_data_maquinarias_vehiculos"),
    "terrenos_edificios": new Array("hidden_field_label_terrenos_edificios", "hidden_field_data_terrenos_edificios"),
    "acciones_bonos_cedulas": new Array("hidden_field_label_acciones_bonos_cedulas", "hidden_field_data_acciones_bonos_cedulas"),
    "id_otros_activos": new Array("hidden_field_label_id_otros_activos", "hidden_field_data_id_otros_activos"),
    "cuentas_por_pagar": new Array("hidden_field_label_cuentas_por_pagar", "hidden_field_data_cuentas_por_pagar"),
    "prestamos_banco_menos_ano": new Array("hidden_field_label_prestamos_banco_menos_ano", "hidden_field_data_prestamos_banco_menos_ano"),
    "prestamos_banco_mas_ano": new Array("hidden_field_label_prestamos_banco_mas_ano", "hidden_field_data_prestamos_banco_mas_ano"),
    "deudas_tarjetas_creditos": new Array("hidden_field_label_deudas_tarjetas_creditos", "hidden_field_data_deudas_tarjetas_creditos"),
    "id_otras_obligaciones": new Array("hidden_field_label_id_otras_obligaciones", "hidden_field_data_id_otras_obligaciones"),
    "deudor": new Array("hidden_field_label_deudor", "hidden_field_data_deudor"),
    "monto": new Array("hidden_field_label_monto", "hidden_field_data_monto"),
    "descripcion": new Array("hidden_field_label_descripcion", "hidden_field_data_descripcion"),
    "placa": new Array("hidden_field_label_placa", "hidden_field_data_placa"),
    "valor_maquinaria_vehiculo": new Array("hidden_field_label_valor_maquinaria_vehiculo", "hidden_field_data_valor_maquinaria_vehiculo"),
    "a_nombre_de": new Array("hidden_field_label_a_nombre_de", "hidden_field_data_a_nombre_de"),
    "ubicacion": new Array("hidden_field_label_ubicacion", "hidden_field_data_ubicacion"),
    "valor_propiedad": new Array("hidden_field_label_valor_propiedad", "hidden_field_data_valor_propiedad"),
    "empresa": new Array("hidden_field_label_empresa", "hidden_field_data_empresa"),
    "valor_mercado": new Array("hidden_field_label_valor_mercado", "hidden_field_data_valor_mercado"),
    "institucion_bancaria": new Array("hidden_field_label_institucion_bancaria", "hidden_field_data_institucion_bancaria"),
    "monto_banco": new Array("hidden_field_label_monto_banco", "hidden_field_data_monto_banco"),
    "institucion_finaciera": new Array("hidden_field_label_institucion_finaciera", "hidden_field_data_institucion_finaciera"),
    "monto_institucion_finaciera": new Array("hidden_field_label_monto_institucion_finaciera", "hidden_field_data_monto_institucion_finaciera"),
    "id_cliente_juridico": new Array("hidden_field_label_id_cliente_juridico", "hidden_field_data_id_cliente_juridico"),
    "nombre_completo_empresa": new Array("hidden_field_label_nombre_completo_empresa", "hidden_field_data_nombre_completo_empresa"),
    "es_empresa_extranjera": new Array("hidden_field_label_es_empresa_extranjera", "hidden_field_data_es_empresa_extranjera"),
    "pais_empresa": new Array("hidden_field_label_pais_empresa", "hidden_field_data_pais_empresa"),
    "fecha_constitucion_empresa": new Array("hidden_field_label_fecha_constitucion_empresa", "hidden_field_data_fecha_constitucion_empresa"),
    "id_oficina": new Array("hidden_field_label_id_oficina", "hidden_field_data_id_oficina"),
    "id_tipo_actividad": new Array("hidden_field_label_id_tipo_actividad", "hidden_field_data_id_tipo_actividad"),
    "especifique_otros": new Array("hidden_field_label_especifique_otros", "hidden_field_data_especifique_otros"),
    "direccion_correspondencia": new Array("hidden_field_label_direccion_correspondencia", "hidden_field_data_direccion_correspondencia"),
    "calle_principal_correspondencia": new Array("hidden_field_label_calle_principal_correspondencia", "hidden_field_data_calle_principal_correspondencia"),
    "no_correspondencia": new Array("hidden_field_label_no_correspondencia", "hidden_field_data_no_correspondencia"),
    "calle_secundaria_correspondencia": new Array("hidden_field_label_calle_secundaria_correspondencia", "hidden_field_data_calle_secundaria_correspondencia"),
    "id_ciudad_correspondencia": new Array("hidden_field_label_id_ciudad_correspondencia", "hidden_field_data_id_ciudad_correspondencia"),
    "nombre_empresa_solicitante": new Array("hidden_field_label_nombre_empresa_solicitante", "hidden_field_data_nombre_empresa_solicitante"),
    "cargo_empresa_solicitante": new Array("hidden_field_label_cargo_empresa_solicitante", "hidden_field_data_cargo_empresa_solicitante"),
    "celular_empresa_solicitante": new Array("hidden_field_label_celular_empresa_solicitante", "hidden_field_data_celular_empresa_solicitante"),
    "telefono_empresa_solicitante": new Array("hidden_field_label_telefono_empresa_solicitante", "hidden_field_data_telefono_empresa_solicitante"),
    "mail_empresa_solicitante": new Array("hidden_field_label_mail_empresa_solicitante", "hidden_field_data_mail_empresa_solicitante"),
    "saldo_empresa_solicitante": new Array("hidden_field_label_saldo_empresa_solicitante", "hidden_field_data_saldo_empresa_solicitante"),
    "nombre_referencia_comerciales": new Array("hidden_field_label_nombre_referencia_comerciales", "hidden_field_data_nombre_referencia_comerciales"),
    "fecha_compra": new Array("hidden_field_label_fecha_compra", "hidden_field_data_fecha_compra"),
    "telefono_referencia_comerciales": new Array("hidden_field_label_telefono_referencia_comerciales", "hidden_field_data_telefono_referencia_comerciales"),
    "ventas": new Array("hidden_field_label_ventas", "hidden_field_data_ventas"),
    "comisiones": new Array("hidden_field_label_comisiones", "hidden_field_data_comisiones"),
    "gastos_operativos": new Array("hidden_field_label_gastos_operativos", "hidden_field_data_gastos_operativos"),
    "gastos_administrativos": new Array("hidden_field_label_gastos_administrativos", "hidden_field_data_gastos_administrativos"),
    "pago_cuotas_prestamo": new Array("hidden_field_label_pago_cuotas_prestamo", "hidden_field_data_pago_cuotas_prestamo"),
    "funcionario": new Array("hidden_field_label_funcionario", "hidden_field_data_funcionario"),
    "funcionario_detalle": new Array("hidden_field_label_funcionario_detalle", "hidden_field_data_funcionario_detalle"),
    "miembro_politico": new Array("hidden_field_label_miembro_politico", "hidden_field_data_miembro_politico"),
    "miembro_politico_detalle": new Array("hidden_field_label_miembro_politico_detalle", "hidden_field_data_miembro_politico_detalle"),
    "ejecutivo_gobierno": new Array("hidden_field_label_ejecutivo_gobierno", "hidden_field_data_ejecutivo_gobierno"),
    "ejecutivo_gobierno_detalle": new Array("hidden_field_label_ejecutivo_gobierno_detalle", "hidden_field_data_ejecutivo_gobierno_detalle"),
    "familiar_gobierno": new Array("hidden_field_label_familiar_gobierno", "hidden_field_data_familiar_gobierno"),
    "familiar_gobierno_detalle": new Array("hidden_field_label_familiar_gobierno_detalle", "hidden_field_data_familiar_gobierno_detalle"),
    "familiar_gobierno_detalle_quien": new Array("hidden_field_label_familiar_gobierno_detalle_quien", "hidden_field_data_familiar_gobierno_detalle_quien"),
    "otros_ingresos": new Array("hidden_field_label_otros_ingresos", "hidden_field_data_otros_ingresos"),
    "otros_gastos": new Array("hidden_field_label_otros_gastos", "hidden_field_data_otros_gastos"),
    "otros_activos": new Array("hidden_field_label_otros_activos", "hidden_field_data_otros_activos"),
    "otras_obligaciones": new Array("hidden_field_label_otras_obligaciones", "hidden_field_data_otras_obligaciones"),
    "sector_direccion_empresa": new Array("hidden_field_label_sector_direccion_empresa", "hidden_field_data_sector_direccion_empresa"),
    "sector_direccion_empresa_correo": new Array("hidden_field_label_sector_direccion_empresa_correo", "hidden_field_data_sector_direccion_empresa_correo"),
    "extranjero_nombres_referencia": new Array("hidden_field_label_extranjero_nombres_referencia", "hidden_field_data_extranjero_nombres_referencia"),
    "extranjero_apellidos_referencia": new Array("hidden_field_label_extranjero_apellidos_referencia", "hidden_field_data_extranjero_apellidos_referencia"),
    "extranjero_parentesco": new Array("hidden_field_label_extranjero_parentesco", "hidden_field_data_extranjero_parentesco"),
    "extranjero_celular_ref": new Array("hidden_field_label_extranjero_celular_ref", "hidden_field_data_extranjero_celular_ref"),
    "extranjero_telefono_convencional_ref": new Array("hidden_field_label_extranjero_telefono_convencional_ref", "hidden_field_data_extranjero_telefono_convencional_ref"),
    "cargo_representante_legal": new Array("hidden_field_label_cargo_representante_legal", "hidden_field_data_cargo_representante_legal"),
    "direccion_extranjero": new Array("hidden_field_label_direccion_extranjero", "hidden_field_data_direccion_extranjero"),
    "relacion_dependencia_principal": new Array("hidden_field_label_relacion_dependencia_principal", "hidden_field_data_relacion_dependencia_principal"),
    "correo_corporativo_principal": new Array("hidden_field_label_correo_corporativo_principal", "hidden_field_data_correo_corporativo_principal"),
    "relacion_dependencia_secundaria": new Array("hidden_field_label_relacion_dependencia_secundaria", "hidden_field_data_relacion_dependencia_secundaria"),
    "correo_corporativo_secundario": new Array("hidden_field_label_correo_corporativo_secundario", "hidden_field_data_correo_corporativo_secundario"),
    "actividad_secundaria": new Array("hidden_field_label_actividad_secundaria", "hidden_field_data_actividad_secundaria"),
    "id_pais_empresa": new Array("hidden_field_label_id_pais_empresa", "hidden_field_data_id_pais_empresa"),
    "id_provincia_empresa": new Array("hidden_field_label_id_provincia_empresa", "hidden_field_data_id_provincia_empresa"),
    "id_pais_correo": new Array("hidden_field_label_id_pais_correo", "hidden_field_data_id_pais_correo"),
    "id_provincia_correo": new Array("hidden_field_label_id_provincia_correo", "hidden_field_data_id_provincia_correo"),
    "apellido_empresa_solicitante": new Array("hidden_field_label_apellido_empresa_solicitante", "hidden_field_data_apellido_empresa_solicitante"),
    "pais_actividad2": new Array("hidden_field_label_pais_actividad2", "hidden_field_data_pais_actividad2"),
    "id_provincia_exterior": new Array("hidden_field_label_id_provincia_exterior", "hidden_field_data_id_provincia_exterior"),
    "pais_independiente": new Array("hidden_field_label_pais_independiente", "hidden_field_data_pais_independiente"),
    "tipo_contrato_otros_actividad_principal": new Array("hidden_field_label_tipo_contrato_otros_actividad_principal", "hidden_field_data_tipo_contrato_otros_actividad_principal"),
    "actividadeconomica": new Array("hidden_field_label_actividadeconomica", "hidden_field_data_actividadeconomica"),
    "clasesujeto": new Array("hidden_field_label_clasesujeto", "hidden_field_data_clasesujeto"),
    "provincia": new Array("hidden_field_label_provincia", "hidden_field_data_provincia"),
    "parroquia": new Array("hidden_field_label_parroquia", "hidden_field_data_parroquia"),
    "canton": new Array("hidden_field_label_canton", "hidden_field_data_canton"),
    "demandajudicial": new Array("hidden_field_label_demandajudicial", "hidden_field_data_demandajudicial"),
    "vdemandajudicial": new Array("hidden_field_label_vdemandajudicial", "hidden_field_data_vdemandajudicial"),
    "carteracastigada": new Array("hidden_field_label_carteracastigada", "hidden_field_data_carteracastigada"),
    "vcarteracastigada": new Array("hidden_field_label_vcarteracastigada", "hidden_field_data_vcarteracastigada"),
    "accesoexterno01": new Array("hidden_field_label_accesoexterno01", "hidden_field_data_accesoexterno01"),
    "referencia": new Array("hidden_field_label_referencia", "hidden_field_data_referencia"),
    "id_pais_empleado_dir_desempeno": new Array("hidden_field_label_id_pais_empleado_dir_desempeno", "hidden_field_data_id_pais_empleado_dir_desempeno"),
    "id_provincia_empleado_dir_desempeno": new Array("hidden_field_label_id_provincia_empleado_dir_desempeno", "hidden_field_data_id_provincia_empleado_dir_desempeno"),
    "id_ciudad_empleado_dir_desempeno": new Array("hidden_field_label_id_ciudad_empleado_dir_desempeno", "hidden_field_data_id_ciudad_empleado_dir_desempeno"),
    "razon_social": new Array("hidden_field_label_razon_social", "hidden_field_data_razon_social"),
    "parterel01": new Array("hidden_field_label_parterel01", "hidden_field_data_parterel01"),
    "origen_fondos": new Array("hidden_field_label_origen_fondos", "hidden_field_data_origen_fondos"),
    "tipo_identificacion": new Array("hidden_field_label_tipo_identificacion", "hidden_field_data_tipo_identificacion"),
    "id_actividad": new Array("hidden_field_label_id_actividad", "hidden_field_data_id_actividad")
  };

  var ajax_read_only = {
    "codcte01": "on",
    "tipo_cliente": "off",
    "id_nacionalidad": "off",
    "nomcte01": "off",
    "primer_nombre": "off",
    "segundo_nombre": "off",
    "primer_apellido": "off",
    "segundo_apellido": "off",
    "cv1cte01": "off",
    "cv2cte01": "off",
    "tipcte01": "off",
    "ofienccte01": "off",
    "vendcte01": "off",
    "cobrcte01": "off",
    "loccte01": "off",
    "dircte01": "off",
    "sector": "off",
    "calle_principal": "off",
    "no": "off",
    "calle_secundaria": "off",
    "id_pais": "off",
    "id_provincia": "off",
    "id_ciudad": "off",
    "id_canton": "off",
    "telcte01": "off",
    "cascte01": "off",
    "ci_conyuge": "off",
    "conyuge_tipo_identidad": "off",
    "conyuge_primer_nombre": "off",
    "conyuge_segundo_nombre": "off",
    "conyuge_primer_apellido": "off",
    "conyuge_segundo_apellido": "off",
    "conyuge_profesion": "off",
    "id_tipo_documento": "off",
    "repleg01": "off",
    "fecing01": "off",
    "condpag01": "off",
    "desctocte01": "off",
    "limcred01": "off",
    "desppar01": "off",
    "cheqpro01": "off",
    "sdoeje01": "off",
    "sdoant01": "off",
    "sdoact01": "off",
    "acudbm01": "off",
    "acucrm01": "off",
    "acudbe01": "off",
    "acucre01": "off",
    "comentcte01": "off",
    "statuscte01": "off",
    "identcte01": "off",
    "cordcte01": "off",
    "limcant01": "off",
    "pagleg01": "off",
    "telcte01b": "off",
    "telcte01c": "off",
    "emailcte01": "off",
    "calle_principal_exterior": "off",
    "no_exterior": "off",
    "calle_secundaria_exterior": "off",
    "id_pais_exterior": "off",
    "id_ciudad_exterior": "off",
    "codigo_postal_exterior": "off",
    "sector_exterior": "off",
    "telefono_exterior": "off",
    "celular_exterior": "off",
    "email_exterior": "off",
    "emailaltcte01": "off",
    "ctacgcte01": "off",
    "obsercte01": "off",
    "totexceso01": "off",
    "imagencte01": "off",
    "block": "off",
    "uid": "off",
    "ultimoacceso": "off",
    "idcli": "off",
    "catcte01": "off",
    "transferido": "off",
    "password": "off",
    "showroom": "off",
    "orden": "off",
    "website": "off",
    "longitud01": "off",
    "latitud01": "off",
    "zoom01": "off",
    "acceder": "off",
    "coniva01": "off",
    "idemp01": "off",
    "codprov01": "off",
    "celular01": "off",
    "dircliente01": "off",
    "razcte01": "off",
    "ruc01": "off",
    "timenegocio01": "off",
    "refbanc01": "off",
    "refcom01": "off",
    "tarjcred01": "off",
    "firmaut01": "off",
    "precte01": "off",
    "cuotasven01": "off",
    "diasven01": "off",
    "fechanace01": "off",
    "sexo01": "off",
    "estadocivil01": "off",
    "dirgestion01": "off",
    "numhijos01": "off",
    "estsop01": "off",
    "notick01": "off",
    "chequece": "off",
    "solcre": "off",
    "promocte01": "off",
    "pagare01": "off",
    "valorpagare01": "off",
    "garante01": "off",
    "fecvenp01": "off",
    "ctacgant01": "off",
    "dsn": "off",
    "residente": "off",
    "medio_contacto": "off",
    "separacion_bienes": "off",
    "disolucion_conyugal": "off",
    "capitulaciones": "off",
    "numero_carga_familiar": "off",
    "nivel_educacion": "off",
    "profesion": "off",
    "envio_correspondencia": "off",
    "nombre_arrendador": "off",
    "apellido_arrendador": "off",
    "id_vivienda": "off",
    "telefono_arrendador": "off",
    "nombres_referencia": "off",
    "apellidos_referencia": "off",
    "parentesco": "off",
    "celular_ref": "off",
    "telefono_convencional_ref": "off",
    "id_ocupacion": "off",
    "fecha_ingreso_empresa": "off",
    "nombre_empresa": "off",
    "ciudad_empresa": "off",
    "provincia_empresa": "off",
    "direccion_empresa": "off",
    "cargo_empresa": "off",
    "telefono_empresa": "off",
    "ext_empresa": "off",
    "id_tipo_contrato_actividad": "off",
    "empresa_jubilo_actividad": "off",
    "fecha_salida_empresa_actividad": "off",
    "cargo_salida_empresa_actividad": "off",
    "fecha_inicio_actividad": "off",
    "fecha_ingreso_empresa_actividad": "off",
    "nombre_empresa_actividad": "off",
    "institucion_actividad": "off",
    "ciudad_actividad": "off",
    "provincia_actividad": "off",
    "direccion_actividad": "off",
    "calle_principal_actividad": "off",
    "no_actividad": "off",
    "calle_secundaria_actividad": "off",
    "sector_actividad": "off",
    "pais_actividad": "off",
    "actividad": "off",
    "telefono_actividad": "off",
    "cargo_actividad": "off",
    "ext_actividad": "off",
    "fecha_ingreso_empresa_actividad2": "off",
    "nombre_empresa_actividad2": "off",
    "institucion_actividad2": "off",
    "ciudad_actividad2": "off",
    "provincia_actividad2": "off",
    "direccion_actividad2": "off",
    "calle_principal_actividad2": "off",
    "no_actividad2": "off",
    "calle_secundaria_actividad2": "off",
    "sector_actividad2": "off",
    "fecha_salida_empresa_actividad2": "off",
    "fecha_inicio_actividad2": "off",
    "actividad2": "off",
    "telefono_actividad2": "off",
    "ext_actividad2": "off",
    "cargo_actividad2": "off",
    "id_tipo_contrato_actividad2": "off",
    "empresa_jubilo_actividad2": "off",
    "sueldo": "off",
    "arriendos": "off",
    "dividendo_utilidades_ultimo_ano": "off",
    "id_otros_ingresos": "off",
    "arriendo_hipoteca": "off",
    "prestamos": "off",
    "tarjetas_creditos": "off",
    "gastos_familiares": "off",
    "id_otros_gastos": "off",
    "depositos_bancos": "off",
    "cuentas_documentos": "off",
    "mercaderias": "off",
    "maquinarias_vehiculos": "off",
    "terrenos_edificios": "off",
    "acciones_bonos_cedulas": "off",
    "id_otros_activos": "off",
    "cuentas_por_pagar": "off",
    "prestamos_banco_menos_ano": "off",
    "prestamos_banco_mas_ano": "off",
    "deudas_tarjetas_creditos": "off",
    "id_otras_obligaciones": "off",
    "deudor": "off",
    "monto": "off",
    "descripcion": "off",
    "placa": "off",
    "valor_maquinaria_vehiculo": "off",
    "a_nombre_de": "off",
    "ubicacion": "off",
    "valor_propiedad": "off",
    "empresa": "off",
    "valor_mercado": "off",
    "institucion_bancaria": "off",
    "monto_banco": "off",
    "institucion_finaciera": "off",
    "monto_institucion_finaciera": "off",
    "id_cliente_juridico": "off",
    "nombre_completo_empresa": "off",
    "es_empresa_extranjera": "off",
    "pais_empresa": "off",
    "fecha_constitucion_empresa": "off",
    "id_oficina": "off",
    "id_tipo_actividad": "off",
    "especifique_otros": "off",
    "direccion_correspondencia": "off",
    "calle_principal_correspondencia": "off",
    "no_correspondencia": "off",
    "calle_secundaria_correspondencia": "off",
    "id_ciudad_correspondencia": "off",
    "nombre_empresa_solicitante": "off",
    "cargo_empresa_solicitante": "off",
    "celular_empresa_solicitante": "off",
    "telefono_empresa_solicitante": "off",
    "mail_empresa_solicitante": "off",
    "saldo_empresa_solicitante": "off",
    "nombre_referencia_comerciales": "off",
    "fecha_compra": "off",
    "telefono_referencia_comerciales": "off",
    "ventas": "off",
    "comisiones": "off",
    "gastos_operativos": "off",
    "gastos_administrativos": "off",
    "pago_cuotas_prestamo": "off",
    "funcionario": "off",
    "funcionario_detalle": "off",
    "miembro_politico": "off",
    "miembro_politico_detalle": "off",
    "ejecutivo_gobierno": "off",
    "ejecutivo_gobierno_detalle": "off",
    "familiar_gobierno": "off",
    "familiar_gobierno_detalle": "off",
    "familiar_gobierno_detalle_quien": "off",
    "otros_ingresos": "off",
    "otros_gastos": "off",
    "otros_activos": "off",
    "otras_obligaciones": "off",
    "sector_direccion_empresa": "off",
    "sector_direccion_empresa_correo": "off",
    "extranjero_nombres_referencia": "off",
    "extranjero_apellidos_referencia": "off",
    "extranjero_parentesco": "off",
    "extranjero_celular_ref": "off",
    "extranjero_telefono_convencional_ref": "off",
    "cargo_representante_legal": "off",
    "direccion_extranjero": "off",
    "relacion_dependencia_principal": "off",
    "correo_corporativo_principal": "off",
    "relacion_dependencia_secundaria": "off",
    "correo_corporativo_secundario": "off",
    "actividad_secundaria": "off",
    "id_pais_empresa": "off",
    "id_provincia_empresa": "off",
    "id_pais_correo": "off",
    "id_provincia_correo": "off",
    "apellido_empresa_solicitante": "off",
    "pais_actividad2": "off",
    "id_provincia_exterior": "off",
    "pais_independiente": "off",
    "tipo_contrato_otros_actividad_principal": "off",
    "actividadeconomica": "off",
    "clasesujeto": "off",
    "provincia": "off",
    "parroquia": "off",
    "canton": "off",
    "demandajudicial": "off",
    "vdemandajudicial": "off",
    "carteracastigada": "off",
    "vcarteracastigada": "off",
    "accesoexterno01": "off",
    "referencia": "off",
    "id_pais_empleado_dir_desempeno": "off",
    "id_provincia_empleado_dir_desempeno": "off",
    "id_ciudad_empleado_dir_desempeno": "off",
    "razon_social": "off",
    "parterel01": "off",
    "origen_fondos": "off",
    "tipo_identificacion": "off",
    "id_actividad": "off"
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
    if ("codcte01" == sIndex)
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
    if ("tipo_cliente" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_nacionalidad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nomcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("primer_nombre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("segundo_nombre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("primer_apellido" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("segundo_apellido" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cv1cte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cv2cte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ofienccte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("vendcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cobrcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("loccte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dircte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sector" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_principal" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("no" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_secundaria" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_pais" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_provincia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_ciudad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_canton" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cascte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ci_conyuge" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("conyuge_tipo_identidad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("conyuge_primer_nombre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("conyuge_segundo_nombre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("conyuge_primer_apellido" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("conyuge_segundo_apellido" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("conyuge_profesion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_tipo_documento" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("repleg01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecing01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("condpag01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("desctocte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("limcred01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("desppar01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cheqpro01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sdoeje01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sdoant01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sdoact01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("acudbm01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("acucrm01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("acudbe01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("acucre01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("comentcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("statuscte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("identcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cordcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("limcant01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("pagleg01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telcte01b" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telcte01c" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("emailcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_principal_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("no_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_secundaria_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_pais_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_ciudad_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("codigo_postal_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sector_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telefono_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("celular_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("email_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("emailaltcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ctacgcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("obsercte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("totexceso01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("imagencte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
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
    if ("idcli" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("catcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("transferido" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("password" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("showroom" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("orden" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("website" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("longitud01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("latitud01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("zoom01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("acceder" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("coniva01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("idemp01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("codprov01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("celular01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dircliente01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("razcte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ruc01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("timenegocio01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("refbanc01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("refcom01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tarjcred01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("firmaut01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("precte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cuotasven01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("diasven01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fechanace01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sexo01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estadocivil01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dirgestion01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("numhijos01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estsop01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("notick01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("chequece" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("solcre" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("promocte01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("pagare01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("valorpagare01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("garante01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecvenp01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ctacgant01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dsn" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("residente" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("medio_contacto" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("separacion_bienes" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("disolucion_conyugal" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("capitulaciones" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("numero_carga_familiar" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nivel_educacion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("profesion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("envio_correspondencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_arrendador" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("apellido_arrendador" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_vivienda" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telefono_arrendador" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombres_referencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("apellidos_referencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("parentesco" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("celular_ref" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telefono_convencional_ref" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_ocupacion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha_ingreso_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ciudad_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("provincia_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("direccion_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cargo_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telefono_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ext_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_tipo_contrato_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("empresa_jubilo_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha_salida_empresa_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cargo_salida_empresa_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha_inicio_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha_ingreso_empresa_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_empresa_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("institucion_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ciudad_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("provincia_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("direccion_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_principal_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("no_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_secundaria_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sector_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("pais_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telefono_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cargo_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ext_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha_ingreso_empresa_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_empresa_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("institucion_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ciudad_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("provincia_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("direccion_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_principal_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("no_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_secundaria_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sector_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha_salida_empresa_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha_inicio_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telefono_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ext_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cargo_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_tipo_contrato_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("empresa_jubilo_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sueldo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("arriendos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("dividendo_utilidades_ultimo_ano" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_otros_ingresos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("arriendo_hipoteca" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("prestamos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tarjetas_creditos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("gastos_familiares" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_otros_gastos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("depositos_bancos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cuentas_documentos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("mercaderias" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("maquinarias_vehiculos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("terrenos_edificios" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("acciones_bonos_cedulas" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_otros_activos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cuentas_por_pagar" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("prestamos_banco_menos_ano" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("prestamos_banco_mas_ano" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("deudas_tarjetas_creditos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_otras_obligaciones" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("deudor" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("monto" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("descripcion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("placa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("valor_maquinaria_vehiculo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("a_nombre_de" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ubicacion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("valor_propiedad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("valor_mercado" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("institucion_bancaria" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("monto_banco" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("institucion_finaciera" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("monto_institucion_finaciera" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_cliente_juridico" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_completo_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("es_empresa_extranjera" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("pais_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha_constitucion_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_oficina" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_tipo_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("especifique_otros" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("direccion_correspondencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_principal_correspondencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("no_correspondencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("calle_secundaria_correspondencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_ciudad_correspondencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_empresa_solicitante" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cargo_empresa_solicitante" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("celular_empresa_solicitante" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telefono_empresa_solicitante" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("mail_empresa_solicitante" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("saldo_empresa_solicitante" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("nombre_referencia_comerciales" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("fecha_compra" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("telefono_referencia_comerciales" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ventas" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("comisiones" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("gastos_operativos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("gastos_administrativos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("pago_cuotas_prestamo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("funcionario" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("funcionario_detalle" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("miembro_politico" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("miembro_politico_detalle" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ejecutivo_gobierno" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("ejecutivo_gobierno_detalle" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("familiar_gobierno" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("familiar_gobierno_detalle" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("familiar_gobierno_detalle_quien" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("otros_ingresos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("otros_gastos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("otros_activos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("otras_obligaciones" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sector_direccion_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("sector_direccion_empresa_correo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("extranjero_nombres_referencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("extranjero_apellidos_referencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("extranjero_parentesco" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("extranjero_celular_ref" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("extranjero_telefono_convencional_ref" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("cargo_representante_legal" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("direccion_extranjero" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("relacion_dependencia_principal" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("correo_corporativo_principal" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("relacion_dependencia_secundaria" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("correo_corporativo_secundario" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("actividad_secundaria" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_pais_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_provincia_empresa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_pais_correo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_provincia_correo" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("apellido_empresa_solicitante" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("pais_actividad2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_provincia_exterior" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("pais_independiente" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipo_contrato_otros_actividad_principal" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("actividadeconomica" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("clasesujeto" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("provincia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("parroquia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("canton" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("demandajudicial" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("vdemandajudicial" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("carteracastigada" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("vcarteracastigada" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("accesoexterno01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("referencia" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_pais_empleado_dir_desempeno" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_provincia_empleado_dir_desempeno" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_ciudad_empleado_dir_desempeno" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("razon_social" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("parterel01" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("origen_fondos" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("tipo_identificacion" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("id_actividad" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
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
