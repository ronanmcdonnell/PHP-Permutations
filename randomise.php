<?php

function getAllPermutations($numberOfChosenElements,$setSize){
	//r = number of Chosen Elements
	//n = set Size
	//number of Combinations = n!/((n-r)!(r!))
	//returns an array of combinations
	
	
	$n = intval($setSize);
	$r = intval($numberOfChosenElements);
	//calculate total combinations (inc. non unique)
	$totalCombinations = factorial($setSize);
	
	//unique combinations
	$uniqueCombinations = factorial($n)/(factorial($n-$r)*factorial($r));
	
	//permutations = (number of Chosen Elements)^ set Size
	$permutations = pow($n,$r);
	$array = array();
	//$uniqueList = array();
	//echo  "Total Combinations: " . $totalCombinations . "<br/>";
	echo "Permutations: " . $permutations . "<br/>";

	$i = 0;
	for($i=0;$i<$r;$i++){
		//initialize array to all 0's
		$array[$i] = 0;
	}
	$i=0;
	//start combo checking!
	Permutation(0, $array, $n);
}

function Permutation($i, $array, $maxValue ){
	$count = sizeof($array);
	for($j = 0; $j <  $maxValue; $j++){
		$array[$i] = $j;
		if($i< ($count-1) && $j < $maxValue){
			Permutation($i+1, $array, $maxValue);
		}
		else{
			checkCombo($array);
		}
	}
	
}

function getUniqueCombinations($numberOfChosenElements,$setSize){
	getAllCombinations($numberOfChosenElements,$setSize);
}				


function checkCombo($array){
	//print_r($array);
	$checkArray = array_count_values($array);
		//if($checkArray[0] == 4 && $checkArray[1] == 4){
		for($i=0;$i<count($array);$i++){
			echo  $array[$i];
	}
	echo "<br/>";
	//}
}


function factorial($number){
	//need an integer
	$num = intval($number);
	if($num == 0 || $num == 1){
		return 1;
	}
	else{
		$factorial = $num--;
		while($num > 0){
			$factorial = $factorial * $num--;
		}
		return $factorial;
	}
}

getAllPermutations(2,8);
?>