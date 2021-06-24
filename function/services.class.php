<?php
require_once './admin-neuromex/php/conexion.class.php';
class Servicios extends DBManager {

  private $ACT;
  private $CLN;

  public function __construct() {
    parent::__construct();
    $this->ACT = array(
      "!","\"","$","%","'","(",")","*","+",",","-",".","/",":","<","=",">","?","@",
      "[","\\","]","^","_","`","{","|","}","~",
      "¡","¢","£","¤","¥","¦","§","¨","©","ª","«","¬","®","¯",
      "°","±","²","³","´","µ","¶","·","¸","¹","º","»","¼","½","¾","¿",
      "À","Á","Â","Ã","Ä","Å","Æ","Ç","È","É","Ê","Ë","Ì","Í","Î","Ï",
      "Ð","Ñ","Ò","Ó","Ô","Õ","Ö","×","Ø","Ù","Ú","Û","Ü","Ý","Þ","ß",
      "à","á","â","ã","ä","å","æ","ç","è","é","ê","ë","ì","í","î","ï",
      "ð","ñ","ò","ó","ô","õ","ö","÷","ø","ù","ú","û","ü","ý","þ","ÿ",
      "Œ","œ","Š","š","Ÿ","ƒ",
      "–","—","‘","’","‚","“","”","„","†","‡","•","…","‰","€","™"
    );
    $this->CLN = array(
      "&#33;","&#34;","&#36;","&#37;","&#39;","&#40;","&#41;","&#42;","&#43;","&#44;","&#45;","&#46;","&#47;","&#58;","&#60;","&#61;","&#62;","&#63;","&#64;",
      "&#91;","&#92;","&#93;","&#94;","&#95;","&#96;","&#123;","&#124;","&#125;","&#126;",
      "&#161;","&#162;","&#163;","&#164;","&#165;","&#166;","&#167;","&#168;","&#169;","&#170;","&#171;","&#172;","&#174;","&#175;",
      "&#176;","&#177;","&#178;","&#179;","&#180;","&#181;","&#182;","&#183;","&#184;","&#185;","&#186;","&#187;","&#188;","&#189;","&#190;","&#191;",
      "&#192;","&#193;","&#194;","&#195;","&#196;","&#197;","&#198;","&#199;","&#200;","&#201;","&#202;","&#203;","&#204;","&#205;","&#206;","&#207;",
      "&#208;","&#209;","&#210;","&#211;","&#212;","&#213;","&#214;","&#215;","&#216;","&#217;","&#218;","&#219;","&#220;","&#221;","&#222;","&#223;",
      "&#224;","&#225;","&#226;","&#227;","&#228;","&#229;","&#230;","&#231;","&#232;","&#233;","&#234;","&#235;","&#236;","&#237;","&#238;","&#239;",
      "&#240;","&#241;","&#242;","&#243;","&#244;","&#245;","&#246;","&#247;","&#248;","&#249;","&#250;","&#251;","&#252;","&#253;","&#254;","&#255;",
      "&#338;","&#339;","&#352;","&#353;","&#376;","&#402;",
      "&#8211;","&#8212;","&#8216;","&#8217;","&#8218;","&#8220;","&#8221;","&#8222;","&#8224;","&#8225;","&#8226;","&#8230;","&#8240;","&#8364;","&#8482;"
    );
  }

  public function getCatProds($DEPENDE) {
    $SQL = "SELECT * FROM tbl_producto_categorias WHERE pc_depende = {$DEPENDE} ORDER BY pc_orden ASC";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getProductosMenu($CAT) {
    $SQL = "SELECT prod_nombre, prod_url FROM tbl_productos WHERE prod_categoria = {$CAT} ORDER BY prod_nombre ASC";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function makeMenuProductos($DEPENDE) {
    $URLBASE = "http://prueba.neuromex.com.mx/";
    $CATS = $this->getCatProds($DEPENDE);
    $MENU = "";
    if ( count($CATS) != 0 ) {
      foreach ($CATS as $C) {
        $MENU .= '
          <li class="dropdown-item dropdown-submenu">
            <a id="NDM-'.$C['pc_url'].'" href="'.$URLBASE.'categoria/'.$C['pc_url'].'" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">'.$C['pc_nombre'].'</a>
            <ul aria-labellebdy="NDM-'.$C['pc_url'].'" class="dropdown-menu">';
        $MENU .= $this->makeMenuProductos($C['pc_id']);
        $MENU .= '</ul></li>';
      }
    } else {
      $PRODS = $this->getProductosMenu($DEPENDE);
      foreach ($PRODS as $P) {
        $MENU .= '<li class="dropdown-item"><a href="'.$URLBASE.'producto/'.$P['prod_url'].'" class="nav-link">'.$P['prod_nombre'].'</a></li>';
      }
    }
    return $MENU;
  }

  public function getServicios() {
    $SQL = "SELECT serv_nombre, serv_url FROM tbl_servicios ORDER BY serv_orden ASC";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getMarcas(){
    $SQL = "SELECT marca_name, marca_logo, marca_url FROM tbl_marcas ORDER BY marca_orden ASC";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getCatApps() {
    $SQL = "SELECT ac_id, ac_nombre, ac_url FROM tbl_aplicacion_categorias ORDER BY ac_orden ASC";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getAppsMenu($DEPENDE) {
    $SQL = "SELECT app_nombre, app_url FROM tbl_aplicaciones WHERE app_categoria = {$DEPENDE} ORDER BY app_orden ASC";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getAPP($APP){
    $SQL = "SELECT * FROM tbl_aplicaciones WHERE app_url = '{$APP}'";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getUbicaciones() {
    $SQL = "SELECT con_state, con_url FROM tbl_contacto ORDER BY con_state ASC";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getSlider() {
    $SQL = "SELECT slider_titulo, slider_texto, slider_imagen FROM tbl_slider";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getCPbyURL($URL) {
    $SQL = "SELECT * FROM tbl_producto_categorias WHERE pc_url = '{$URL}'";
    $RET = $this->Consultar($SQL);
    return $RET[0];
  }

  public function getTreeCat($ID) {
    $CATES = array();
    $SQL = "SELECT pc_depende, pc_nombre, pc_nivel FROM tbl_producto_categorias WHERE pc_id = {$ID} ";
    $CATR = $this->Consultar($SQL);
    $CAT = $CATR[0];
    if ( $CAT['pc_nivel'] == 0 ) {
      array_push($CATES,$CAT['pc_nombre']);
    } else {
      $CATES = $this->getTreeCat($CAT['pc_depende']);
      array_push($CATES,$CAT['pc_nombre']);
    }
    return $CATES;
  }

  public function getCategorias($ID) {
    $SQL = "SELECT * FROM tbl_producto_categorias WHERE pc_depende = {$ID}";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getProductos($ID) {
    $SQL = "SELECT * FROM tbl_productos INNER JOIN tbl_producto_slider ON ps_producto = prod_id WHERE prod_categoria = {$ID} GROUP BY prod_id";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getProdByURL($URL) {
    $SQL = "SELECT * FROM tbl_productos WHERE prod_url = '{$URL}'";
    $RET = $this->Consultar($SQL);
    return $RET[0];
  }

  public function getSliderProducto($ID) {
    $SQL = "SELECT * FROM tbl_producto_slider WHERE ps_producto = {$ID}";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getDocumentos($ID) {
    $SQL = "SELECT * FROM tbl_documentos WHERE doc_producto = {$ID}";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getProdsRelacionados($ID) {
    $SQL = "SELECT prod_url, prod_nombre, prod_resumen, ps_imagen FROM tbl_productos INNER JOIN tbl_producto_slider ON ps_producto = prod_id WHERE prod_categoria = {$ID} GROUP BY prod_id LIMIT 3";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getContacto($URL) {
    $SQL = "SELECT * FROM tbl_contacto WHERE con_url = '{$URL}'";
    $RET = $this->Consultar($SQL);
    return $RET[0];
  }

  public function getServicioByURL($URL) {
    $SQL = "SELECT * FROM tbl_servicios WHERE serv_url = '{$URL}'";
    $RET = $this->Consultar($SQL);
    return $RET[0];
  }

  public function getSliderServicio($ID) {
    $SQL = "SELECT * FROM tbl_carousel_servicios WHERE cs_servicio_id = {$ID}";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getOtrosServicios($ID) {
    $SQL = "SELECT serv_nombre, serv_img_general, serv_url FROM tbl_servicios WHERE serv_id != {$ID} ORDER BY RAND() LIMIT 4";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getMarcaByURL($URL) {
    $SQL = "SELECT * FROM tbl_marcas WHERE marca_url = '{$URL}'";
    $RET = $this->Consultar($SQL);
    return $RET[0];
  }

  public function getProdsByMarca($ID) {
    $SQL = "SELECT * FROM tbl_productos INNER JOIN tbl_producto_slider ON ps_producto = prod_id WHERE prod_marca = {$ID} GROUP BY prod_id";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function getCatAppByURL($URL) {
    $SQL = "SELECT * FROM tbl_aplicacion_categorias WHERE ac_url = '{$URL}'";
    $RET = $this->Consultar($SQL);
    return $RET[0];
  }

  public function getApps ($ID) {
    $SQL = "SELECT * FROM tbl_aplicaciones WHERE app_categoria = {$ID}";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function VerificarCuenta($CODIGO) {
    $SQL = "UPDATE tbl_clientes SET cli_activo = 1 WHERE cli_verificacion = '{$CODIGO}'";
    $CUENTA = $this->Ejecutar($SQL);
    $RET['status'] = 0;
    if ( $CUENTA ) {
      $RET['status'] = 1;
      $CLI = $this->getCliente($CODIGO);
      $RET['cli'] = $CLI[0];
    }
    return $RET;
  }

  public function getCliente($COD) {
    $SQL = "SELECT * FROM tbl_clientes WHERE cli_verificacion = '{$COD}'";
    $RET = $this->Consultar($SQL);
    return $RET;
  }

  public function makeURL($texto) {
    $chr = "/[^a-zA-Z0-9-]+/";
    $acl = array('á','é','í','ó','ú','ñ','Á','É','Í','Ó','Ú','Ñ',' ');
    $vcl = array('a','e','i','o','u','n','A','E','I','O','U','N','-');
    $url = trim($texto);
    $url = str_replace($acl,$vcl,$url);
    $url = preg_replace($chr,'',$url);
    $url = preg_replace("/-+/",'-',$url);
    $url = strtolower($url);
    return $url;
  }

  public function SanitizarTexto($texto) {
    $TXT = trim($texto);
    $TXT = str_replace($this->ACT,$this->CLN,$TXT);
    $TXT = preg_replace("/[\n|\r|\r\n]+/","<br>",$TXT);
    return $TXT;
  }

  public function FechaEspanol($DATE) {
    $TIME = strtotime($DATE);
    $FECHA = strftime("%A %d de %B de %Y " , $TIME);
    return ucfirst($FECHA);
  }

}

?>
