<?php
// PHP программа для создания магического квадрата методом террас

function createSguare($n){

   // установить все слоты как 0
    $magSquare=array();

    for ($i = 0; $i < $n; $i++){
        for ($j = 0; $j < $n; $j++){
            $magSquare[$i][$j] = 0;
		}
	}
    // позиция для 1
    $i = (int)$n / 2;
    $j = $n - 1;
    // Помещение всех значений в магический квадрат
    for ($num = 1; $num <= $n * $n; ){
       // 3-е условие
        if ($i == -1 && $j == $n) {
            $j = $n-2;
            $i = 0;
        } else {
            // если следующий номер уходит правой стороны квадрата
            if ($j == $n){
                $j = 0;
			}
            // если следующий номер идет  вне квадрата боковая сторона
            if ($i < 0){
                $i = $n-1;
			}
        }
       // 2-е условие
        if ($magSquare[$i][$j]) {
            $j -= 2;
            $i++;
            continue;
        } else {
			// установить номер
			$magSquare[$i][$j] = $num++; 
		// 1-е условие
        $j++; $i--; 
		}
    }
    // Печать магического квадрата
	return $magSquare;
}

//Проверка правильности, созданного магического квадрата
function checkSquare($magSquare){
	$summ_v=0;
	$summ_g=0;
	$summ_dl=0;
	$summ_dr=0;
	$n=count($magSquare);
	for ($j = 0; $j < $n; $j++){
		$summ_v=$summ_v+$magSquare[0][$j];
	}
	
	for ($i = 0; $i < $n; $i++){
	    $summ_g=$summ_g+$magSquare[$i][0];
	}
	
	for ($i = 0; $i < $n; $i++){
        for ($j = 0; $j < $n; $j++){
			if($i==$j){
				$summ_dl=$summ_dl+$magSquare[$i][$j];
			}
		}
	}
	
	for ($i = 0; $i < $n; $i++){
        for ($j = 0; $j < $n; $j++){
			if($i+$j==$n-1){
				$summ_dr=$summ_dr+$magSquare[$i][$j];
			}
		}
		
	}
	if(($summ_v==$summ_g)&&($summ_dl==$summ_dr)&&($summ_v==$summ_dr)){
		return true;
	} else {
		return false;
	}
}

// функция для вывода на экран
function printSquare($magSquare){
    $n=count($magSquare);
	echo "Размер квадрата ".$n."X".$n;
	echo "<br><br>";
	for ($i = 0; $i < $n; $i++){
        for ($j = 0; $j < $n; $j++){
			echo $magSquare[$i][$j]." ";
		}
		echo "<br>";
	}
}

//случайное n
$n = rand(0,9); 
$n=($n%2==0)?$n+1:$n;

//Создание квадрата
$magicSquare=createSguare($n);

//проверка и вывод квадрата
if(checkSquare($magicSquare)){
	printSquare($magicSquare);
}




      

?>