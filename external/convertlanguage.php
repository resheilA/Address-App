<?php
function convertlang($piece)
{	
	//echo $piece;
	$bigpiece = explode(" ",$piece);
	$fullpiece = ""; 
	
	foreach($bigpiece as $var)
	{
	$varparts = explode("|",$var);
	$object = $varparts[0];
	$attri = $varparts[1];
	
	$def_lang = $_SESSION["lang"] = "english";
	$myXMLData = file_get_contents("alllanguage.xml");
	$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");	
	$convertedword = $xml->$object->$attri->$def_lang;	
	$fullpiece = $fullpiece." ".$convertedword;
	}
	
	return $fullpiece;
}
?>