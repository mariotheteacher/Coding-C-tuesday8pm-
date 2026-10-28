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

    $split_row = str_split($row, 1);

    foreach($split_row as $key => $split){
        if($split != "#") $matrix[$i][$key] = (string) $split;
    }
}

fscanf(STDIN, "%d", $N);
$answer = [];
for ($i = 0; $i < $N; $i++)
{
    $count = 0;
    $isWater = [];

    fscanf(STDIN, "%d %d", $X, $Y);
    $count = checkLandOrWater($Y, $X, $matrix, $isWater);

    if($count > 0){
        $isWater[$Y."".$X] = $Y."".$X;
        $answer[] = checkWaters($Y, $X, $matrix, $isWater);
    }else{
        $answer[] = $count;
    }
}

for ($i = 0; $i < $N; $i++)
{

    // Write an answer using echo(). DON'T FORGET THE TRAILING \n
    // To debug: error_log(var_export($var, true)); (equivalent to var_dump)

    echo($answer[$i]."\n");
}

function checkLandOrWater($X, $Y, $matrix, &$isWater)
{
    if(!isset($matrix[$X][$Y])) {
        return 0;   
    } else {
        return array_key_exists($X."".$Y, $isWater) ? 0 : 1;
    }
}

function checkWaters($X, $Y, $matrix, &$isWater) {
    $count = 1;
    $total = 0;
    $total = isset($matrix[$X][($Y+1)]) ? checkLandOrWater($X, ($Y+1), $matrix, $isWater) : 0;

    if($total > 0) {
        $isWater[$X."".($Y+1)] = $X."".($Y+1);
        $count += checkWaters($X, $Y+1, $matrix, $isWater);
    }

    $total = isset($matrix[$X][($Y-1)]) ? checkLandOrWater($X, ($Y-1), $matrix, $isWater) : 0;

    if($total > 0) {
        $isWater[$X."".($Y-1)] = $X."".($Y-1);
        $count += checkWaters($X, $Y-1, $matrix, $isWater);
    }

    $total = isset($matrix[($X-1)][$Y]) ? checkLandOrWater(($X-1), $Y, $matrix, $isWater) : 0;

    if($total > 0) {
        $isWater[($X-1)."".$Y] = ($X-1)."".$Y;
        $count += checkWaters($X-1, $Y, $matrix, $isWater);
    }

    $total = isset($matrix[($X+1)][$Y]) ? checkLandOrWater(($X+1), $Y, $matrix, $isWater) : 0;

    if($total > 0) {
        $isWater[($X+1)."".$Y] = ($X+1)."".$Y;
        $count += checkWaters($X+1, $Y, $matrix, $isWater);
    }

    return $count;
}
?>
