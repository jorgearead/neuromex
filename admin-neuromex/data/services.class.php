<?php

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

  public function MENU() {
    $SQLCAT = "SELECT cat_nombre, cat_url FROM tbl_categoria ORDER BY cat_nombre ASC;";
    $CATS = $this->Consultar($SQLCAT);
    return $CATS;
  }

  public function Slider() {
    $SQL = "SELECT sli_desk, sli_mobile, sli_texto FROM tbl_slider";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function Cinta() {
    $SQL = "SELECT cinta_img FROM tbl_cinta";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function BlogsDestacados() {
    $SQL = "SELECT blog_titulo, blog_url, blog_portada FROM tbl_blog WHERE blog_destacado = 1;";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function Maquinaria() {
    $SQL = "SELECT * FROM tbl_maquinaria ORDER BY maq_nombre ASC";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function SliderMaquinaria($ID) {
    $SQL = "SELECT sm_imagen FROM tbl_slider_maquinaria WHERE sm_maquinaria = {$ID}";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function SliderTerminados($ID) {
    $SQL = "SELECT st_imagen FROM tbl_slider_terminados WHERE st_maquinaria = {$ID}";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function Categorias() {
    $SQL = "SELECT * FROM tbl_categoria ORDER BY cat_nombre ASC";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function Alianzas() {
    $SQL = "SELECT alianza_img FROM tbl_alianza;";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function Categoria($CAT) {
    $SQL = "SELECT * FROM tbl_categoria WHERE cat_url = '{$CAT}';";
    $DATA = $this->Consultar($SQL);
    return $DATA[0];
  }

  public function Producto1($CAT) {
    $SQL = "SELECT * FROM tbl_producto WHERE prod_categoria = {$CAT} ORDER BY prod_id ASC LIMIT 1;";
    $DATA = $this->Consultar($SQL);
    return $DATA[0];
  }

  public function Producto($PROD) {
    $SQL = "SELECT * FROM tbl_producto WHERE prod_url = '{$PROD}' LIMIT 1;";
    $DATA = $this->Consultar($SQL);
    return $DATA[0];
  }

  public function Productos($CAT,$PROD) {
    $SQL = "SELECT prod_nombre, prod_url FROM tbl_producto WHERE prod_categoria = {$CAT} AND prod_id != {$PROD};";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function SliderProducto($PROD) {
    $SQL = "SELECT sp_imagen FROM tbl_slider_producto WHERE sp_producto = {$PROD};";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function Catalogo($CAT) {
    $SQL = "SELECT cat_catalogo FROM tbl_categoria WHERE cat_id = {$CAT};";
    $DATA = $this->Consultar($SQL);
    return $DATA[0]['cat_catalogo'];
  }

  public function Blogs() {
    $SQL = "SELECT blog_titulo, blog_url, blog_portada FROM tbl_blog ORDER BY blog_destacado DESC, blog_fecha DESC;";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function Blog($BLOG) {
    $SQL = "SELECT * FROM tbl_blog WHERE blog_url = '{$BLOG}';";
    $DATA = $this->Consultar($SQL);
    return $DATA[0];
  }

  public function Ubicaciones() {
    $SQL = "SELECT * FROM tbl_ubicacion;";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function getSliderUbicacion($UBI) {
    $SQL = "SELECT su_imagen FROM tbl_slider_ubicacion WHERE su_ubicacion = {$UBI};";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function BuscarMaquinaria( $BUSCAR ) {
    $SQL = "SELECT * FROM tbl_maquinaria WHERE maq_nombre LIKE '%$BUSCAR%' OR maq_contenido LIKE '%$BUSCAR%';";
    $DATA = $this->Consultar($SQL);
    return $DATA;
  }

  public function BuscarProducto( $BUSCAR ) {
    $SQL = "SELECT * FROM tbl_producto WHERE prod_nombre LIKE '%$BUSCAR%' OR prod_contenido LIKE '%$BUSCAR%';";
    $DATA = $this->Consultar($SQL);
    return $DATA;
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
