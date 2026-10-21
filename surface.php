<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $L);
fscanf(STDIN, "%d", $H);
$matrix = [];
for ($i = 0; $i < $H; $i++)
{
    $row = stream_get_line(STDIN, $L + 1, "\n");
    
    // print_r($row);    
    // echo("\n");
    $split_row = str_split($row, 1);

    foreach($split_row as $key => $split){
        if($split != "#") $matrix[$i][$key] = (string) $split;
    }
}
// print_r($matrix);    
// echo("\n");
fscanf(STDIN, "%d", $N);
$answer = [];
for ($i = 0; $i < $N; $i++)
{
    $count = 0;
    $isWater = [];

    fscanf(STDIN, "%d %d", $X, $Y);
    print_r($X.' '.$Y);    
    echo("\n");
    $count = checkLandOrWater($X, $Y, $matrix, $isWater);
    if($count > 0){
        // print_r( $X."-".$Y." ".$count);    
        // echo("\n");
        $isWater[$X."".$Y] = $X."".$Y;
        $answer[] = checkWaters($X, $Y, $matrix, $count, $isWater);
    }else{
        $answer[] = $count;
    }
}

// print_r($answer);    
// echo("\n");
for ($i = 0; $i < $N; $i++)
{

    // Write an answer using echo(). DON'T FORGET THE TRAILING \n
    // To debug: error_log(var_export($var, true)); (equivalent to var_dump)

    echo($answer[$i]."\n");
}

function checkLandOrWater($X, $Y, $matrix, $isWater)
{
    if(!isset($matrix[$X][$Y])) {
        return 0;   
    } else {
        return array_key_exists($X."".$Y, $isWater) ? 0 : 1;
    }
}

function checkWaters($X, $Y, $matrix, $count, $isWater) {
// print_r("checkWaters: ".$X." , ".$Y." - ".$count);
//     echo("\n");
    $total = 0;
    $total = isset($matrix[$X][($Y+1)]) ? checkLandOrWater($X, ($Y+1), $matrix, $isWater) : 0;

    if($total > 0) {
        $isWater[$X."".($Y+1)] = $X."".($Y+1);
        print_r($isWater);
        echo("\n");
        $count = checkWaters($X, $Y+1, $matrix, $count, $isWater);
        $count += $total;
    }

    $total = isset($matrix[$X][($Y-1)]) ? checkLandOrWater($X, ($Y-1), $matrix, $isWater) : 0;

    if($total > 0) {
        $isWater[$X."".($Y-1)] = $X."".($Y-1);
        print_r($isWater);
        echo("\n");
        $count = checkWaters($X, $Y-1, $matrix, $count, $isWater);
        $count += $total;
    }

    $total = isset($matrix[($X-1)][$Y]) ? checkLandOrWater(($X-1), $Y, $matrix, $isWater) : 0;

    if($total > 0) {
        $isWater[($X-1)."".$Y] = ($X-1)."".$Y;
        $count = checkWaters($X-1, $Y, $matrix, $count, $isWater);
        $count += $total;
    }

    $total = isset($matrix[($X+1)][$Y]) ? checkLandOrWater(($X+1), $Y, $matrix, $isWater) : 0;

    if($total > 0) {
        $isWater[($X+1)."".$Y] = ($X+1)."".$Y;
        $count = checkWaters($X+1, $Y, $matrix, $count, $isWater);
        $count += $total;
    }

    return $count;
}
?>
