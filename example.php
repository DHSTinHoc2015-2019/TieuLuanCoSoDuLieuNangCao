<?php 
header ("Content-type: text/html, charset=utf-8;");
require_once dirname(__FILE__). "/SimpleXMLReader.php";
class ExampleXmlReader1 extends SimpleXMLReader
{
    public function __construct()
    {
        // by node name
        $this->registerCallback("Цена", array($this, "callbackPrice"));
        // by xpath
        $this->registerCallback("/Данные/Остатки/Остаток", array($this, "callbackRest"));
    }
    protected function callbackPrice($reader)
    {
        $xml = $reader->expandSimpleXml();
        $attributes = $xml->attributes();
        $ref = (string) $attributes->{"Номенклатура"};
        if ($ref) {
            $price = floatval((string)$xml);
            $xpath = $this->currentXpath();
            echo "$xpath: $ref = $price;\n";
        }
        return true;
    }
    protected function callbackRest($reader)
    {
        $xml = $reader->expandSimpleXml();
        $attributes = $xml->attributes();
        $ref = (string) $attributes->{"Номенклатура"};
        if ($ref) {
            $rest = floatval((string) $xml);
            $xpath = $this->currentXpath();
            echo "$xpath: $ref = $rest;\n";
        }
        return true;
    }
}
echo "<pre>";
$file = dirname(__FILE__) . "/dataXML/db.tieuluancsdlnc.sinhvien.xml";
$reader = new ExampleXmlReader1;
$reader->open($file);
$reader->parse();
$reader->close();
echo $flie;
?>