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

    $answer[] = checkWaters($Y, $X, $matrix, $isWater);
}

for ($i = 0; $i < $N; $i++)
{

    // Write an answer using echo(). DON'T FORGET THE TRAILING \n
    // To debug: error_log(var_export($var, true)); (equivalent to var_dump)

    echo($answer[$i]."\n");
}

function checkWaters($X, $Y, $matrix, &$isWater) {
    if(!isset($matrix[$X][$Y])) {
        return 0;
    }

    $key = $X.'_'.$Y;

    if(isset($isWater[$key])) {
        return 0;
    }

    $isWater[$key] = true;

    $count = 1;

    $count += checkWaters($X, ($Y+1), $matrix, $isWater);
    $count += checkWaters($X, ($Y-1), $matrix, $isWater);
    $count += checkWaters(($X-1), $Y, $matrix, $isWater);
    $count += checkWaters(($X+1), $Y, $matrix, $isWater);

    return $count;
}
?>
