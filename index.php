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
    $all .= $line;

    $parts[] = itsEvenOrNot($parts, $c, $line);
}

function itsEvenOrNot(array $parts, int $c, string $line) 
{
    if (itsEven($c)) {
        
    } else {
        $divide = round($c / 2);
        $parts = str_split($line, $divide);
    }

    return $parts;
}

$lines = 1;
$allArray = str_split($all, 1);
$convert = "";


if($bitmap == "B"){
    $bitmap = "C";
    
    $result = recursiveCheck($allArray, $parts, $r, $convert);
}

function recursiveCheck(array $allArray, array $parts, int $r, string $convert) 
{
    echo("-----");
    echo("\n");
    print_r($allArray);
    echo("\n");
    print_r((in_array(".", $allArray) && in_array("#", $allArray)) == true);
    echo("\n");
    echo("check dot");
    echo("\n");
    print_r(in_array(".", $allArray));
    echo("\n");
    echo("check sharp");
    echo("\n");
    print_r(in_array("#", $allArray));
    echo("\n");
    echo("-----");

    $dot = in_array(".", $allArray) ? 'true' : 'false';
    $sharp = in_array("#", $allArray) ? 'true' : 'false';

    if ($dot && $sharp){
        $convert .= '+';

        $groupBySide = groupBySide($parts);
        $leftSide = isset($groupBySide[0]) ? groupByUpDown($groupBySide[0], $r) : [];
        $rightSide = isset($groupBySide[1]) ? groupByUpDown($groupBySide[1], $r) : [];

        $leftSideUp = isset($leftSide[0]) ? implode($leftSide[0]) : "";
        $leftSideDown = isset($leftSide[1]) ? implode($leftSide[1]) : "";
        $rightSideUp = isset($rightSide[0]) ? implode($rightSide[0]) : "";
        $rightSideDown = isset($rightSide[1]) ? implode($rightSide[1]) : "";
        
        if (! empty($leftSideUp)) {
            // print_r(str_split($leftSideUp, 1));
            // print_r($leftSide[0]);
            // print_r(sizeof($leftSide[0]));
            $splitLS = str_split($leftSideUp, 1);
            $convert .= recursiveCheck($splitLS, $leftSide[0], sizeof($leftSide[0]), $convert);

            echo("\n");
            print_r($convert);
            echo("\n");
        }
    } else{
        $convert .= in_array(".", $allArray) ? 0 : 1;
    } 

    return $convert;
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
