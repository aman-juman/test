<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 30-Sep-18
 * Time: 18:08
 */
$current= file_get_contents("https://export.ticketon.kz/schedule?filters[display][media]=1");
$file="export.xml";
if($current){
	echo "Write to file\n";
	//var_dump($current);
	if(file_put_contents($file, $current)){
		echo "succeess to writing";
		// read in file
		$out= file_get_contents($file);
		//header('Content-type: text/xml');
		//echo $out;
	}};

//
//if($current){
//    echo "Write to file\n";
//    //var_dump($current);
//    if(file_put_contents("test.xml", $current)){
//        echo "succeess to writing";
//        // read in file
//        $out= file_get_contents($file);
//        //header('Content-type: text/xml');
//        //echo $out;
//    }};