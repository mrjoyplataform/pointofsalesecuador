<?php
   include_once('grid_reporte_sales_formapago_session.php');
   session_start();
   $_SESSION['scriptcase']['grid_reporte_sales_formapago']['glo_nm_path_imag_temp']  = "";
   //check tmp
   if(empty($_SESSION['scriptcase']['grid_reporte_sales_formapago']['glo_nm_path_imag_temp']))
   {
       $str_path_apl_url = $_SERVER['PHP_SELF'];
       $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
       $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
       /*check tmp*/$_SESSION['scriptcase']['grid_reporte_sales_formapago']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   if (!isset($_SESSION['sc_session']))
   {
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
           $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
           $str_path_sys  = str_replace("\\", '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       $str_path_web    = $_SERVER['PHP_SELF'];
       $str_path_web    = str_replace("\\", '/', $str_path_web);
       $str_path_web    = str_replace('//', '/', $str_path_web);
       $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
       if (is_file($root . $_SESSION['scriptcase']['grid_reporte_sales_formapago']['glo_nm_path_imag_temp'] . "/sc_apl_default_pointofsales.txt"))
       {
?>
           <script language="javascript">
            nm_move();
           </script>
<?php
           exit;
       }
   }
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   $Ord_Cmp = new grid_reporte_sales_formapago_Ord_cmp(); 
   $Ord_Cmp->Ord_cmp_init();
   
class grid_reporte_sales_formapago_Ord_cmp
{
function Ord_cmp_init()
{
  global $sc_init, $path_img, $path_btn, $use_alias, $tab_ger_campos, $tab_def_campos, $tab_def_seq, $tab_labels, $embbed, $tbar_pos, $_POST, $_GET;
   if (isset($_POST['script_case_init']))
   {
       $sc_init    = filter_input(INPUT_POST, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img   = filter_input(INPUT_POST, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn   = filter_input(INPUT_POST, 'path_btn', FILTER_SANITIZE_STRING);
       $use_alias  = (isset($_POST['use_alias']))  ? filter_input(INPUT_POST, 'use_alias', FILTER_SANITIZE_STRING)  : "S";
       $fsel_ok    = filter_input(INPUT_POST, 'fsel_ok', FILTER_SANITIZE_STRING);
       $campos_sel = filter_input(INPUT_POST, 'campos_sel', FILTER_SANITIZE_STRING);
       $sel_regra  = filter_input(INPUT_POST, 'sel_regra', FILTER_SANITIZE_STRING);
       $embbed     = isset($_POST['embbed_groupby']) && 'Y' == $_POST['embbed_groupby'];
       $tbar_pos   = filter_input(INPUT_POST, 'toolbar_pos', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   elseif (isset($_GET['script_case_init']))
   {
       $sc_init    = filter_input(INPUT_GET, 'script_case_init', FILTER_SANITIZE_NUMBER_INT);
       $path_img   = filter_input(INPUT_GET, 'path_img', FILTER_SANITIZE_STRING);
       $path_btn   = filter_input(INPUT_GET, 'path_btn', FILTER_SANITIZE_STRING);
       $use_alias  = (isset($_GET['use_alias']))  ? filter_input(INPUT_GET, 'use_alias', FILTER_SANITIZE_STRING)  : "S";
       $fsel_ok    = filter_input(INPUT_GET, 'fsel_ok', FILTER_SANITIZE_STRING);
       $campos_sel = filter_input(INPUT_GET, 'campos_sel', FILTER_SANITIZE_STRING);
       $sel_regra  = filter_input(INPUT_GET, 'sel_regra', FILTER_SANITIZE_STRING);
       $embbed     = isset($_GET['embbed_groupby']) && 'Y' == $_GET['embbed_groupby'];
       $tbar_pos   = filter_input(INPUT_GET, 'toolbar_pos', FILTER_SANITIZE_SPECIAL_CHARS);
   }
   $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
   $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
   $this->Nm_lang = array();
   if (is_file($NM_arq_lang))
   {
       include_once($NM_arq_lang);
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select_orig']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select_orig'] = array();
   }
   $this->restore = isset($_POST['restore']) ? true : false;
   if ($this->restore && !class_exists('Services_JSON')) {
       include_once("grid_reporte_sales_formapago_json.php");
   }
   $this->Arr_result = array();
   
   $tab_ger_campos = array();
   $tab_def_campos = array();
   $tab_labels     = array();
   $tab_ger_campos['id_sales_detail'] = "on";
   $tab_def_campos['id_sales_detail'] = "id_sales_detail";
   $tab_labels["id_sales_detail"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["id_sales_detail"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["id_sales_detail"] : "Id Sales Detail";
   $tab_ger_campos['unit_cost'] = "on";
   $tab_def_campos['unit_cost'] = "unit_cost";
   $tab_labels["unit_cost"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["unit_cost"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["unit_cost"] : "Unit Cost";
   $tab_ger_campos['unit_value'] = "on";
   $tab_def_campos['unit_value'] = "unit_value";
   $tab_labels["unit_value"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["unit_value"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["unit_value"] : "Unit Value";
   $tab_ger_campos['quantity'] = "on";
   $tab_def_campos['quantity'] = "quantity";
   $tab_labels["quantity"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["quantity"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["quantity"] : "Quantity";
   $tab_ger_campos['discount'] = "on";
   $tab_def_campos['discount'] = "discount";
   $tab_labels["discount"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["discount"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["discount"] : "Discount";
   $tab_ger_campos['item_total'] = "on";
   $tab_def_campos['item_total'] = "item_total";
   $tab_labels["item_total"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["item_total"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["item_total"] : "Item Total";
   $tab_ger_campos['id_product'] = "on";
   $tab_def_campos['id_product'] = "id_product";
   $tab_labels["id_product"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["id_product"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["id_product"] : "Id Product";
   $tab_ger_campos['uniqueidtrans'] = "on";
   $tab_def_campos['uniqueidtrans'] = "uniqueidtrans";
   $tab_labels["uniqueidtrans"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["uniqueidtrans"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["uniqueidtrans"] : "Uniqueidtrans";
   $tab_ger_campos['fechatrans'] = "on";
   $tab_def_campos['fechatrans'] = "fechatrans";
   $tab_labels["fechatrans"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["fechatrans"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["fechatrans"] : "Fechatrans";
   $tab_ger_campos['valor_siniva'] = "on";
   $tab_def_campos['valor_siniva'] = "valor_siniva";
   $tab_labels["valor_siniva"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["valor_siniva"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["valor_siniva"] : "Valor Siniva";
   $tab_ger_campos['valor_unitario'] = "on";
   $tab_def_campos['valor_unitario'] = "valor_unitario";
   $tab_labels["valor_unitario"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["valor_unitario"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["valor_unitario"] : "Valor Unitario";
   $tab_ger_campos['codproducto'] = "on";
   $tab_def_campos['codproducto'] = "codproducto";
   $tab_labels["codproducto"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["codproducto"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["codproducto"] : "Codproducto";
   $tab_ger_campos['producto'] = "on";
   $tab_def_campos['producto'] = "producto";
   $tab_labels["producto"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["producto"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["producto"] : "Producto";
   $tab_ger_campos['entrada'] = "on";
   $tab_def_campos['entrada'] = "entrada";
   $tab_labels["entrada"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["entrada"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["entrada"] : "Entrada";
   $tab_ger_campos['jugador'] = "on";
   $tab_def_campos['jugador'] = "jugador";
   $tab_labels["jugador"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["jugador"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["jugador"] : "Jugador";
   $tab_ger_campos['visitante'] = "on";
   $tab_def_campos['visitante'] = "visitante";
   $tab_labels["visitante"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["visitante"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["visitante"] : "Visitante";
   $tab_ger_campos['tarjeta'] = "on";
   $tab_def_campos['tarjeta'] = "tarjeta";
   $tab_labels["tarjeta"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["tarjeta"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["tarjeta"] : "Tarjeta";
   $tab_ger_campos['tokens'] = "on";
   $tab_def_campos['tokens'] = "tokens";
   $tab_labels["tokens"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["tokens"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["tokens"] : "Tokens";
   $tab_ger_campos['minutos'] = "on";
   $tab_def_campos['minutos'] = "minutos";
   $tab_labels["minutos"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["minutos"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["minutos"] : "Minutos";
   $tab_ger_campos['comida'] = "on";
   $tab_def_campos['comida'] = "comida";
   $tab_labels["comida"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["comida"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["comida"] : "Comida";
   $tab_ger_campos['cuentaventa'] = "on";
   $tab_def_campos['cuentaventa'] = "cuentaventa";
   $tab_labels["cuentaventa"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["cuentaventa"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["cuentaventa"] : "Cuentaventa";
   $tab_ger_campos['sucursal'] = "on";
   $tab_def_campos['sucursal'] = "sucursal";
   $tab_labels["sucursal"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["sucursal"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["sucursal"] : "Sucursal";
   $tab_ger_campos['id_sales'] = "on";
   $tab_def_campos['id_sales'] = "id_sales";
   $tab_labels["id_sales"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["id_sales"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["id_sales"] : "Id Sales";
   $tab_ger_campos['sales_price'] = "on";
   $tab_def_campos['sales_price'] = "sales_price";
   $tab_labels["sales_price"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["sales_price"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["sales_price"] : "Sales Price";
   $tab_ger_campos['sales_discount'] = "on";
   $tab_def_campos['sales_discount'] = "sales_discount";
   $tab_labels["sales_discount"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["sales_discount"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["sales_discount"] : "Sales Discount";
   $tab_ger_campos['total'] = "on";
   $tab_def_campos['total'] = "total";
   $tab_labels["total"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["total"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["total"] : "Total";
   $tab_ger_campos['datesales'] = "on";
   $tab_def_campos['datesales'] = "datesales";
   $tab_labels["datesales"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["datesales"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["datesales"] : "Datesales";
   $tab_ger_campos['id_status'] = "on";
   $tab_def_campos['id_status'] = "id_status";
   $tab_labels["id_status"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["id_status"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["id_status"] : "Id Status";
   $tab_ger_campos['idcaja'] = "on";
   $tab_def_campos['idcaja'] = "idcaja";
   $tab_labels["idcaja"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idcaja"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idcaja"] : "Idcaja";
   $tab_ger_campos['idcliente'] = "on";
   $tab_def_campos['idcliente'] = "idcliente";
   $tab_labels["idcliente"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idcliente"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idcliente"] : "Idcliente";
   $tab_ger_campos['cliente'] = "on";
   $tab_def_campos['cliente'] = "cliente";
   $tab_labels["cliente"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["cliente"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["cliente"] : "Cliente";
   $tab_ger_campos['direccion'] = "on";
   $tab_def_campos['direccion'] = "direccion";
   $tab_labels["direccion"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["direccion"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["direccion"] : "Direccion";
   $tab_ger_campos['telefono'] = "on";
   $tab_def_campos['telefono'] = "telefono";
   $tab_labels["telefono"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["telefono"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["telefono"] : "Telefono";
   $tab_ger_campos['factura'] = "on";
   $tab_def_campos['factura'] = "factura";
   $tab_labels["factura"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["factura"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["factura"] : "Factura";
   $tab_ger_campos['serie'] = "on";
   $tab_def_campos['serie'] = "serie";
   $tab_labels["serie"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["serie"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["serie"] : "Serie";
   $tab_ger_campos['clave_acceso'] = "on";
   $tab_def_campos['clave_acceso'] = "clave_acceso";
   $tab_labels["clave_acceso"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["clave_acceso"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["clave_acceso"] : "Clave Acceso";
   $tab_ger_campos['enviosri'] = "on";
   $tab_def_campos['enviosri'] = "enviosri";
   $tab_labels["enviosri"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["enviosri"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["enviosri"] : "Enviosri";
   $tab_ger_campos['fechaenvio'] = "on";
   $tab_def_campos['fechaenvio'] = "fechaenvio";
   $tab_labels["fechaenvio"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["fechaenvio"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["fechaenvio"] : "Fechaenvio";
   $tab_ger_campos['uniqueid'] = "on";
   $tab_def_campos['uniqueid'] = "uniqueid";
   $tab_labels["uniqueid"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["uniqueid"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["uniqueid"] : "Uniqueid";
   $tab_ger_campos['estado'] = "on";
   $tab_def_campos['estado'] = "estado";
   $tab_labels["estado"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["estado"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["estado"] : "Estado";
   $tab_ger_campos['fechaid'] = "on";
   $tab_def_campos['fechaid'] = "fechaid";
   $tab_labels["fechaid"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["fechaid"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["fechaid"] : "Fechaid";
   $tab_ger_campos['importe_recibido'] = "on";
   $tab_def_campos['importe_recibido'] = "importe_recibido";
   $tab_labels["importe_recibido"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["importe_recibido"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["importe_recibido"] : "Importe Recibido";
   $tab_ger_campos['codigoid'] = "on";
   $tab_def_campos['codigoid'] = "codigoid";
   $tab_labels["codigoid"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["codigoid"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["codigoid"] : "Codigoid";
   $tab_ger_campos['totalsinimpuestos'] = "on";
   $tab_def_campos['totalsinimpuestos'] = "totalSinImpuestos";
   $tab_labels["totalsinimpuestos"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["totalsinimpuestos"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["totalsinimpuestos"] : "Total Sin Impuestos";
   $tab_ger_campos['totaldescuento'] = "on";
   $tab_def_campos['totaldescuento'] = "totalDescuento";
   $tab_labels["totaldescuento"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["totaldescuento"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["totaldescuento"] : "Total Descuento";
   $tab_ger_campos['baseimponible'] = "on";
   $tab_def_campos['baseimponible'] = "baseImponible";
   $tab_labels["baseimponible"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["baseimponible"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["baseimponible"] : "Base Imponible";
   $tab_ger_campos['valoriva'] = "on";
   $tab_def_campos['valoriva'] = "valoriva";
   $tab_labels["valoriva"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["valoriva"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["valoriva"] : "Valoriva";
   $tab_ger_campos['importetotal'] = "on";
   $tab_def_campos['importetotal'] = "importeTotal";
   $tab_labels["importetotal"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["importetotal"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["importetotal"] : "Importe Total";
   $tab_ger_campos['idpago'] = "on";
   $tab_def_campos['idpago'] = "idpago";
   $tab_labels["idpago"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idpago"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idpago"] : "Idpago";
   $tab_ger_campos['totalpago'] = "on";
   $tab_def_campos['totalpago'] = "totalpago";
   $tab_labels["totalpago"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["totalpago"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["totalpago"] : "Totalpago";
   $tab_ger_campos['cliente_email'] = "on";
   $tab_def_campos['cliente_email'] = "cliente_email";
   $tab_labels["cliente_email"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["cliente_email"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["cliente_email"] : "Cliente Email";
   $tab_ger_campos['idempleado'] = "on";
   $tab_def_campos['idempleado'] = "idempleado";
   $tab_labels["idempleado"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idempleado"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idempleado"] : "Idempleado";
   $tab_ger_campos['idturno'] = "on";
   $tab_def_campos['idturno'] = "idturno";
   $tab_labels["idturno"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idturno"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["idturno"] : "Idturno";
   $tab_ger_campos['codpago_sri'] = "on";
   $tab_def_campos['codpago_sri'] = "codpago_sri";
   $tab_labels["codpago_sri"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["codpago_sri"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["codpago_sri"] : "Codpago Sri";
   $tab_ger_campos['imprime'] = "on";
   $tab_def_campos['imprime'] = "imprime";
   $tab_labels["imprime"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["imprime"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["imprime"] : "Imprime";
   $tab_ger_campos['comprobante'] = "on";
   $tab_def_campos['comprobante'] = "comprobante";
   $tab_labels["comprobante"]   = (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["comprobante"])) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['labels']["comprobante"] : "Comprobante";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_sales_formapago']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_sales_formapago']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_sales_formapago']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           if ($NM_cada_opc == "off")
           {
              $tab_ger_campos[$NM_cada_field] = "none";
           }
       }
   }
   if (!isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select']))
   {
       $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select'] = array();
   }
   
   if ($fsel_ok == "cmp" && !$this->restore)
   {
       $this->Sel_processa_out_sel($campos_sel);
   }
   else
   {
       if ($embbed)
       {
           ob_start();
           $this->Sel_processa_form();
           $Temp = ob_get_clean();
           echo NM_charset_to_utf8($Temp);
       }
       else
       {
           if ($this->restore)
           {
               ob_start();
           }
           $this->Sel_processa_form();
       }
   }
   exit;
   
}
function Sel_processa_out_sel($campos_sel)
{
   global $tab_ger_campos, $sc_init, $tab_def_campos, $embbed;
   $arr_temp = array();
   $campos_sel = explode("@?@", $campos_sel);
   $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select'] = array();
   $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_grid']   = "";
   $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_cmp']    = "";
   foreach ($campos_sel as $campo_sort)
   {
       $ordem = (substr($campo_sort, 0, 1) == "+") ? "asc" : "desc";
       $campo = substr($campo_sort, 1);
       if (isset($tab_def_campos[$campo]))
       {
           $Ordem_tem_quebra = false;
           if (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_quebra']))
           {
               foreach($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_quebra'] as $campo_quebra => $resto) 
               {
                   foreach($resto as $sqldef => $ordem_ant) 
                   {
                       if ($sqldef == $tab_def_campos[$campo]) 
                       { 
                           $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_quebra'][$campo][$sqldef] = $ordem;
                           $Ordem_tem_quebra = true;
                       }   
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select'][$tab_def_campos[$campo]] = $ordem;
           }   
       }
   }
?>
    <script language="javascript"> 
<?php
   if (!$embbed)
   {
?>
      self.parent.tb_remove(); 
      parent.nm_gp_submit_ajax('inicio', ''); 
<?php
   }
   else
   {
?>
      nm_gp_submit_ajax('inicio', ''); 
<?php
   }
?>
   </script>
<?php
}
   
function Sel_processa_form()
{
  global $sc_init, $path_img, $path_btn, $use_alias, $tab_ger_campos, $tab_def_campos, $tab_labels, $embbed, $tbar_pos;
   $size = 10;
   $_SESSION['scriptcase']['charset']  = "UTF-8";
   foreach ($this->Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
      {
          $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
          $this->Nm_lang[$ind] = $dados;
      }
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
   $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
   include("../_lib/css/" . $str_schema_all . "_grid.php");
   $Str_btn_grid = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
   include("../_lib/buttons/" . $Str_btn_grid);
   if (!function_exists("nmButtonOutput"))
   {
       include_once("../_lib/lib/php/nm_gp_config_btn.php");
   }
   if (!$embbed)
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Nm_lang['lang_othr_grid_title'] ?> reporte_sales</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_dir'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div'] ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup_div_dir'] ?>" /> 
 <?php
 if(isset($_SESSION['scriptcase']['str_google_fonts']) && !empty($_SESSION['scriptcase']['str_google_fonts']))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['str_google_fonts'] ?>" />
 <?php
 }
 ?>
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" /> 
</HEAD>
<BODY class="scGridPage" style="margin: 0px; overflow-x: hidden">
<script language="javascript" type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery-ui.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['sc_session']['path_third'] ?>/font-awesome/css/all.min.css" />
<?php
   }
?>
<script language="javascript"> 
<?php
if ($embbed)
{
?>
  function scSubmitOrderCampos(sPos, sType) {
    $("#id_fsel_ok_sel_ord").val(sType);
    if(sType == 'cmp')
    {
       scPackSelectedOrd();
    }
   return new Promise(function(resolve, reject) {$.ajax({
    type: "POST",
    url: "grid_reporte_sales_formapago_order_campos.php",
    data: {
     script_case_init: $("#id_script_case_init_sel_ord").val(),
     path_img: $("#id_path_img_sel_ord").val(),
     path_btn: $("#id_path_btn_sel_ord").val(),
     use_alias: $("#id_use_alias").val(),
     campos_sel: $("#id_campos_sel_sel_ord").val(),
     sel_regra: $("#id_sel_regra_sel_ord").val(),
     fsel_ok: $("#id_fsel_ok_sel_ord").val(),
     embbed_groupby: 'Y'
    }
   }).done(function(data) {
    scBtnOrderCamposHide(sPos);
    buttonunselectedOF();
    $("#sc_id_order_campos_placeholder_" + sPos).find("td").html("");
    var execString = data.toString().replace(/(\<.*?\>)/g, '');
    eval(execString).then(function(){resolve()});
   });});
  }
<?php
}
?>
 // Submeter o formularior
 //-------------------------------------
 function submit_form_Fsel_ord()
 {
     scPackSelectedOrd();
      buttonunselectedOF();
      document.Fsel_ord.submit();
 }
 function scPackSelectedOrd() {
  var fieldList, fieldName, i, selectedFields = new Array;
 fieldList = $("#sc_id_fldord_selected").sortable("toArray");
 for (i = 0; i < fieldList.length; i++) {
  fieldName  = fieldList[i].substr(14);
  selectedFields.push($("#sc_id_class_" + fieldName).val() + fieldName);
 }
 $("#id_campos_sel_sel_ord").val( selectedFields.join("@?@") );
 }
 </script>
<FORM name="Fsel_ord" method="POST">
  <INPUT type="hidden" name="script_case_init"    id="id_script_case_init_sel_ord"    value="<?php echo NM_encode_input($sc_init); ?>"> 
  <INPUT type="hidden" name="path_img"            id="id_path_img_sel_ord"            value="<?php echo NM_encode_input($path_img); ?>"> 
  <INPUT type="hidden" name="path_btn"            id="id_path_btn_sel_ord"            value="<?php echo NM_encode_input($path_btn); ?>"> 
  <INPUT type="hidden" name="use_alias"           id="id_use_alias"                   value="<?php echo NM_encode_input($use_alias); ?>"> 
  <INPUT type="hidden" name="fsel_ok"             id="id_fsel_ok_sel_ord"             value=""> 
<?php
if ($embbed)
{
    echo "<div class='scAppDivMoldura'>";
    echo "<table id=\"main_table\" style=\"width: 100%\" cellspacing=0 cellpadding=0>";
}
elseif ($_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'")
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; right: 20px\">";
}
else
{
    echo "<table id=\"main_table\" style=\"position: relative; top: 20px; left: 20px\">";
}
?>
<?php
if (!$embbed)
{
?>
<tr>
<td>
<div class="scGridBorder">
<table width='100%' cellspacing=0 cellpadding=0>
<?php
}
$disp_rest = "none";
?>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivHeader scAppDivHeaderText':'scGridLabelVert'; ?>">
   <?php echo $this->Nm_lang['lang_btns_sort_hint']; ?>
  </td>
 </tr>
 <tr>
  <td class="<?php echo ($embbed)? 'scAppDivContent css_scAppDivContentText':'scGridTabelaTd'; ?>">
   <table class="<?php echo ($embbed)? '':'scGridTabela'; ?>" style="border-width: 0; border-collapse: collapse; width:100%;" cellspacing=0 cellpadding=0>
    <tr class="<?php echo ($embbed)? '':'scGridFieldOddVert'; ?>">
     <td style="vertical-align: top">
     <table>
   <tr><td style="vertical-align: top">
 <script language="javascript" type="text/javascript">
  $(function() {
   $(".sc_ui_litem").mouseover(function() {
    $(this).css("cursor", "all-scroll");
   });
   $("#sc_id_fldord_available").sortable({
    connectWith: ".sc_ui_fldord_selected",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    remove: function(event, ui) {
     var fieldName = $(ui.item[0]).find("select").attr("id");
     $("#" + fieldName).show();
     $('#f_sel_sub').css('display', 'inline-block');
    }
   }).disableSelection();
   $("#sc_id_fldord_selected").sortable({
    connectWith: ".sc_ui_fldord_available",
    placeholder: "scAppDivSelectFieldsPlaceholder",
    remove: function(event, ui) {
     var fieldName = $(ui.item[0]).find("select").attr("id");
     $("#" + fieldName).hide();
     $('#f_sel_sub').css('display', 'inline-block');
     display_btn_restore_ord();
    },
    change: function( event, ui ) {
     $('#f_sel_sub').css('display', 'inline-block');
      display_btn_restore_ord();
    },
    receive: function( event, ui ) {
     $('#f_sel_sub').css('display', 'inline-block');
     display_btn_restore_ord();
    }
   });
   scUpdateListHeight();
  });
  function scUpdateListHeight() {
   $("#sc_id_fldord_available").css("min-height", "<?php echo sizeof($tab_ger_campos) * 26 ?>px");
   $("#sc_id_fldord_selected").css("min-height", "<?php echo sizeof($tab_ger_campos) * 26 ?>px");
  }
 </script>
 <style type="text/css">
  .sc_ui_sortable_ord {
   list-style-type: none;
   margin: 0;
   min-width: 120px;
  }
  .sc_ui_sortable_ord li {
   margin: 0 3px 3px 3px;
   padding: 1px 3px 1px 15px;
   min-height: 18px;
  }
  .sc_ui_sortable_ord li span {
   position: absolute;
   margin-left: -1.3em;
  }
 </style>
    <ul class="sc_ui_sort_groupby sc_ui_sortable_ord sc_ui_fldord_available scAppDivSelectFields" id="sc_id_fldord_available">
<?php
   if ($this->restore) {
        ob_end_clean();
        ob_start();
   }
   $arr_order = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select_orig'] : $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select'];
   foreach ($tab_ger_campos as $NM_cada_field => $NM_cada_opc)
   {
       if ($NM_cada_opc != "none")
       {
           if (!isset($arr_order[$tab_def_campos[$NM_cada_field]]))
           {
?>
     <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_itemord_<?php echo NM_encode_input($NM_cada_field); ?>">
      <?php echo $tab_labels[$NM_cada_field]; ?>
      <select id="sc_id_class_<?php echo NM_encode_input($NM_cada_field); ?>" class="scAppDivToolbarInput" style="display: none" onchange="display_btn_restore_ord();">
       <option value="+">Asc</option>
       <option value="-">Desc</option>
      </select><br/>
     </li>
<?php
           }
       }
   }
   if ($this->restore) {
       $this->Arr_result['fldord_available'] = NM_charset_to_utf8(ob_get_clean());
   }
?>
    </ul>
   </td>
   <td style="vertical-align: top">
    <ul class="sc_ui_sort_groupby sc_ui_sortable_ord sc_ui_fldord_selected scAppDivSelectFields" id="sc_id_fldord_selected">
<?php
   if ($this->restore) {
       ob_end_clean();
       ob_start();
   }
   $arr_order = ($this->restore) ? $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select_orig'] : $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select'];
   foreach ($tab_ger_campos as $NM_cada_field => $NM_cada_opc)
   {
       if ($NM_cada_opc != "none")
       {
           if (isset($arr_order[$tab_def_campos[$NM_cada_field]]))
           {
               $sAscSelected  = " selected";
               $sDescSelected = "";
               if ($arr_order[$tab_def_campos[$NM_cada_field]] == "desc")
               {
                   $sAscSelected  = "";
                   $sDescSelected = " selected";
               }
?>
     <li class="sc_ui_litem scAppDivSelectFieldsEnabled" id="sc_id_itemord_<?php echo $NM_cada_field; ?>">
      <?php echo $tab_labels[$NM_cada_field]; ?>
      <select id="sc_id_class_<?php echo NM_encode_input($NM_cada_field); ?>" class="scAppDivToolbarInput" onchange="$('#f_sel_sub').css('display', 'inline-block');display_btn_restore_ord();">
       <option value="+"<?php echo $sAscSelected; ?>>Asc</option>
       <option value="-"<?php echo $sDescSelected; ?>>Desc</option>
      </select>
     </li>
<?php
          }
       }
   }
   if ($this->restore) {
       $this->Arr_result['fldord_selected'] = NM_charset_to_utf8(ob_get_clean());
       $oJson = new Services_JSON();
       echo $oJson->encode($this->Arr_result);
       exit;
   }
?>
    </ul>
    <input type="hidden" name="campos_sel" id="id_campos_sel_sel_ord" value="">
   </td>
   </tr>
   </table>
   </td>
   </tr>
   </table>
  </td>
 </tr>
   <tr><td class="<?php echo ($embbed)? 'scAppDivToolbar':'scGridToolbar'; ?>">
<?php
  if (isset($_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select']) && $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select'] != $_SESSION['sc_session'][$sc_init]['grid_reporte_sales_formapago']['ordem_select_orig']) {
      $disp_rest = "";
  }
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bok_appdiv", "document.Fsel_ord.fsel_ok.value='cmp';proc_btn_ord('f_sel_sub','submit_form_Fsel_ord()')", "document.Fsel_ord.fsel_ok.value='cmp';proc_btn_ord('f_sel_sub','submit_form_Fsel_ord()')", "f_sel_sub", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bapply_appdiv", "proc_btn_ord('f_sel_sub','scSubmitOrderCampos(\\'" . NM_encode_input($tbar_pos) . "\\', \\'cmp\\')')", "proc_btn_ord('f_sel_sub','scSubmitOrderCampos(\\'" . NM_encode_input($tbar_pos) . "\\', \\'cmp\\')')", "f_sel_sub", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
  &nbsp;&nbsp;&nbsp;
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "brestore_appdiv", "proc_btn_ord('Brestore_ord','restore_ord()')", "proc_btn_ord('Brestore_ord','restore_ord()')", "Brestore_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "brestore_appdiv", "proc_btn_ord('Brestore_ord','restore_ord()')", "proc_btn_ord('Brestore_ord','restore_ord()')", "Brestore_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
  &nbsp;&nbsp;&nbsp;
<?php
   if (!$embbed)
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bsair_appdiv", "self.parent.tb_remove(); buttonunselectedOF();", "self.parent.tb_remove(); buttonunselectedOF();", "Bsair_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "'); buttonunselectedOF();", "scBtnOrderCamposHide('" . NM_encode_input($tbar_pos) . "'); buttonunselectedOF();", "Bsair_ord", "", "", "", "absmiddle", "", "0px", $path_btn, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
   </td>
   </tr>
<?php
if (!$embbed)
{
?>
</table>
</div>
</td>
</tr>
<?php
}
?>
</table>
<?php
if ($embbed)
{
?>
    </div>
<?php
}
?>
</FORM>
<script language="javascript"> 
function buttonDisable_ord(buttonId) {
    $("#" + buttonId).prop("disabled", true).addClass("disabled");
}
function buttonEnable_ord(buttonId) {
    $("#" + buttonId).prop("disabled", false).removeClass("disabled");
}
function restore_ord() {
    $.ajax({
        type: 'POST',
        url: "grid_reporte_sales_formapago_order_campos.php",
        data: {
           script_case_init: $("#id_script_case_init_sel_ord").val(),
           restore: 'ok',
        }
    })
    .done(function(retcombos) {
       eval("Combos = " + retcombos);
       $("#sc_id_fldord_available").html(Combos["fldord_available"]);
       $("#sc_id_fldord_selected").html(Combos["fldord_selected"]);
       buttonDisable_ord("Brestore_ord");
       buttonEnable_ord("f_sel_sub");
       $('#f_sel_sub').css('display', 'inline-block');
    });
}
function buttonSelectedOF() {
   $("#ordcmp_top").addClass("selected");
   $("#ordcmp_bottom").addClass("selected");
}
function buttonunselectedOF() {
   $("#ordcmp_top").removeClass("selected");
   $("#ordcmp_bottom").removeClass("selected");
}
function display_btn_restore_ord() {
    buttonEnable_ord("Brestore_ord");
    buttonEnable_ord("f_sel_sub");
}
function proc_btn_ord(btn, proc) {
    if (
        (document.Fsel_ord.fsel_ok.value != 'regra' && $("#" + btn).prop("disabled") == true) || 
        (document.Fsel_ord.fsel_ok.value == 'regra' && $("#id_sel_regra_sel_ord").val() == '')
    )
    {
        return;
    }
    eval (proc);
}
$( document ).ready(function() {
   buttonDisable_ord("f_sel_sub");
   buttonSelectedOF();
<?php
   if ($disp_rest == "none") {
?>
   buttonDisable_ord("Brestore_ord");
<?php
   }
?>
});
var bFixed = false;
function ajusta_window_Fsel_ord()
{
<?php
   if ($embbed)
   {
?>
  return false;
<?php
   }
?>
  var mt = $(document.getElementById("main_table"));
  if (0 == mt.width() || 0 == mt.height())
  {
    setTimeout("ajusta_window_Fsel_ord()", 50);
    return;
  }
  else if(!bFixed)
  {
    var oOrig = $(document.Fsel_ord.sel_orig),
        oDest = $(document.Fsel_ord.sel_dest),
        mHeight = Math.max(oOrig.height(), oDest.height()),
        mWidth = Math.max(oOrig.width() + 5, oDest.width() + 5);
    oOrig.height(mHeight);
    oOrig.width(mWidth);
    oDest.height(mHeight);
    oDest.width(mWidth + 15);
    bFixed = true;
    if (navigator.userAgent.indexOf("Chrome/") > 0)
    {
      strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
      self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
      setTimeout("ajusta_window_Fsel_ord()", 50);
      return;
    }
  }
  strMaxHeight = Math.min(($(window.parent).height()-80), mt.height());
  self.parent.tb_resize(strMaxHeight + 40, mt.width() + 40);
}
$( document ).ready(function() {
   ajusta_window_Fsel_ord();
});
</script>
<script>
    ajusta_window_Fsel_ord();
</script>
</BODY>
</HTML>
<?php
}
}
