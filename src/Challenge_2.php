<?php

$etionic_counter = etionic_counter();
echo format_answer($etionic_counter);

function etionic_counter(){
	$file = file_get_contents("../files/ETIONIC _ Software Solutions.html");
	$words = str_word_count($file, 1);
	$amount = 0;
	foreach ($words as $key => $word) {
		if($word === 'ETIONIC')
			$amount++;
	}
	return $amount;
}

function format_answer($etionic_counter){
	$format = array();
	$format['ETIONIC'] = $etionic_counter;
	return json_encode($format);
}