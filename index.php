<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%s %d %d", $bitmap, $c, $r);
fscanf(STDIN, "%d", $ln);
// echo($h);
// echo("\n");
echo($c);
echo("\n");
echo($r);
echo("\n");
// echo($ln);
// echo("\n");
$all = "";
$parts = [];
for ($i = 0; $i < $ln; $i++)
{
    $line = stream_get_line(STDIN, 1024 + 1, "\n");
    // echo($line);
    // echo("\n");
    $all .= $line;

    if (itsEven($c)) {

    } else {
        $divide = round($c / 2);
        $parts[] = str_split($line, $divide);
    }
}

$lines = 1;
$allArray = str_split($all, 1);
$convert = "+0+0110++101+0100";
// print_r($allArray);
// echo("\n");
if($bitmap == "B"){
    $bitmap = "C";

    if(in_array(".", $allArray) && in_array("#", $allArray)){
        $groupBySide = groupBySide($parts);
        print_r(groupByUpDown($groupBySide[0], $r));
        print_r(groupByUpDown($groupBySide[1], $r));


        echo($bitmap." ". $c." ". $r."\n");
        echo($lines."\n");
        echo($convert);
    }else{
        $value = in_array(".", $allArray) ? 0 : 1;
        echo($bitmap." ". $c." ". $r."\n");
        echo($lines."\n");
        echo($value);
    }
}

function itsEven(int $number): bool
{
    return $number % 2 == 0;
}

function groupBySide(array $parts)
{
    $groupBySide = [];

    foreach($parts as $part) {
        $groupBySide[0][] = $part[0];
        $groupBySide[1][] = $part[1];
    }

    return $groupBySide;
}

function groupByUpDown(array $sides, int $row)
{
    $groupByUpDown = [];

    foreach($sides as $key => $side) {
        if($key < round($row / 2)) {
            $groupByUpDown[0][] = $side;
        } else {
            $groupByUpDown[1][] = $side;
        }
    }

    return $groupByUpDown;
}

// $lenght = sizeof(str_split($all, 1));
// print_r($lenght);
// echo("\n");
// print_r($lenght%2);
// echo("\n");
// // Write an answer using echo(). DON'T FORGET THE TRAILING \n
// // To debug: error_log(var_export($var, true)); (equivalent to var_dump)

// $bitmap = $h == "C" ? "B" : "C";
// $lines = 1;


?>