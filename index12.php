<?php

$kabeer = 'am a string';
echo strtoupper($kabeer);
echo ltrim($kabeer);


$str = "apple,banana,cherry";
$array = explode(",", $str);
print_r($array); 

 $stri = "explding,this";
 $cringe = explode("," , $stri);
 print_r($cringe);

 
$shit = ['arrays,are,shit'];

foreach ($shit as $shits) {
    if ($shits) {
        $kabeer = explode(",", $shits);
        print_r($kabeer); 
    } else {
        echo "kabeer\n";
    }
}

$kabeer = "string";
// echo strlen($kabeer)
if($kabeer){
    echo "4";
}
?>
