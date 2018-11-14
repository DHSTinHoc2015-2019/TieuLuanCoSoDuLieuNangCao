<?php 
        $xslt = new SimpleXMLElement('<xsl:stylesheet version="1.0"
        xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

        <xsl:template match="*">
        <ul>
        <li><xsl:value-of select="local-name()"/>
        <xsl:apply-templates/>
        </li>
        </ul>
        </xsl:template>
        </xsl:stylesheet>');

        // $xml = new SimpleXMLElement($_POST['xmlcontent']);
        $xml=simplexml_load_file('dataXML/db.tieuluancsdlnc.sinhvien.xml') or die("Error: Cannot create object");
        $xsl_processor = new XSLTProcessor();
        $xsl_processor->importStylesheet($xslt);
        echo $xsl_processor->transformToXml($xml);

 ?>