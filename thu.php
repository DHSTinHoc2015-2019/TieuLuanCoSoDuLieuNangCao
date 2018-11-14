<?php 
$myXMLData =
'<?xml version="1.0" encoding="utf-8"?>
<table_sinhvien>
	<sinhvien id="1">
		<ten>a</ten>
		<lop>Tin A</lop>
		<diem>
			<mon1>11111</mon1>
			<mon2>11111</mon2>
		</diem>
	</sinhvien>
	<sinhvien id="2">
		<ten>b</ten>
		<lop>Tin B</lop>
		<diem>
			<mon1>222</mon1>
			<mon2>222</mon2>
		</diem>
	</sinhvien>
	<sinhvien id="3">
		<ten>c</ten>
		<lop>Tin C</lop>
		<diem>
			<mon1>333</mon1>
			<mon2>333</mon2>
		</diem>
	</sinhvien>
	<sinhvien id="4">
		<ten>d</ten>
		<lop>Tin D</lop>
		<diem>
			<mon1>444</mon1>
			<mon2>444</mon2>
		</diem>
	</sinhvien>
</table_sinhvien>';

$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
// $xml=simplexml_load_file('dataXML/db.tieuluancsdlnc.sinhvien.xml') or die("Error: Cannot create object");

// echo "<pre>";
// print_r($xml);
// echo "string";
	// echo "string";
	function toArray($xml) {
        $array = json_decode(json_encode($xml), TRUE);
       
        foreach ( array_slice($array, 0) as $key => $value ) {
            if ( empty($value) ) $array[$key] = NULL;
            elseif ( is_array($value) ) $array[$key] = toArray($value);
        }

        return $array;
    }


	$arr = toArray($xml);
	echo "<pre>";
	print_r($arr);
	// $arr = xmlObjToArr($xml);
	// echo "<pre>";
	// print_r($arr);

	// // 

	// function xmlObjToArr($obj) {
 //        $namespace = $obj->getDocNamespaces(true);
 //        $namespace[NULL] = NULL;
       
 //        $children = array();
 //        $attributes = array();
 //        $name = strtolower((string)$obj->getName());
       
 //        $text = trim((string)$obj);
 //        if( strlen($text) <= 0 ) {
 //            $text = NULL;
 //        }
       
 //        // get info for all namespaces
 //        if(is_object($obj)) {
 //            foreach( $namespace as $ns=>$nsUrl ) {
 //                // atributes
 //                $objAttributes = $obj->attributes($ns, true);
 //                foreach( $objAttributes as $attributeName => $attributeValue ) {
 //                    $attribName = strtolower(trim((string)$attributeName));
 //                    $attribVal = trim((string)$attributeValue);
 //                    if (!empty($ns)) {
 //                        $attribName = $ns . ':' . $attribName;
 //                    }
 //                    $attributes[$attribName] = $attribVal;
 //                }
               
 //                // children
 //                $objChildren = $obj->children($ns, true);
 //                foreach( $objChildren as $childName=>$child ) {
 //                    $childName = strtolower((string)$childName);
 //                    if( !empty($ns) ) {
 //                        $childName = $ns.':'.$childName;
 //                    }
 //                    $children[$childName][] = xmlObjToArr($child);
 //                }
 //            }
 //        }
       
 //        return array(
 //            'name'=>$name,
 //            'text'=>$text,
 //            'attributes'=>$attributes,
 //            'children'=>$children
 //        );
 //    }


    function XMLToArrayFlat($xml, &$return, $path='', $root=false){
	$children = array();
	if ($xml instanceof SimpleXMLElement) {
		$children = $xml->children();
		        if ($root){ // we're at root
		        $path .= '/'.$xml->getName();
		    }
		}
		if ( count($children) == 0 ){
			$return[$path] = (string)$xml;
			return;
		}
		$seen=array();
		foreach ($children as $child => $value) {
			$childname = ($child instanceof SimpleXMLElement)?$child->getName():$child;
			if ( !isset($seen[$childname])){
				$seen[$childname]=0;
			}
			$seen[$childname]++;
			XMLToArrayFlat($value, $return, $path.'/'.$child.'['.$seen[$childname].']');
		}
	}
	$xml = simplexml_load_file('dataXML/db.tieuluancsdlnc.sinhvien.xml');
	$xmlarray = array();
	XMLToArrayFlat($xml, $xmlarray, '', true); 
	echo "<pre>";
	print_r($xmlarray);


	

 ?>