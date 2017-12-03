<?php
$value  = 347991;
$spiral = array(array());

$initialValue = 1;

$sqrt          = ceil(sqrt($value));
$firstPosX     = $firstPosY = $lastPosX = $lastPosY = $sqrt;
$lastDirection = "down";

$spiral[$lastPosX][$lastPosY] = $initialValue;

for ($i = $initialValue + 1; $i <= $value; $i++) {
    switch ($lastDirection) {
        case "down":
            if (!isset($spiral[$lastPosX + 1][$lastPosY])) {
                $spiral[++$lastPosX][$lastPosY] = $i;
                $lastDirection                  = "right";
            } else {
                $spiral[$lastPosX][++$lastPosY] = $i;
            }
            break;

        case "right":
            if (!isset($spiral[$lastPosX][$lastPosY - 1])) {
                $spiral[$lastPosX][--$lastPosY] = $i;
                $lastDirection                  = "up";
            } else {
                $spiral[++$lastPosX][$lastPosY] = $i;
            }
            break;

        case "up":
            if (!isset($spiral[$lastPosX - 1][$lastPosY])) {
                $spiral[--$lastPosX][$lastPosY] = $i;
                $lastDirection                  = "left";
            } else {
                $spiral[$lastPosX][--$lastPosY] = $i;
            }
            break;

        case "left":
            if (!isset($spiral[$lastPosX][$lastPosY + 1])) {
                $spiral[$lastPosX][++$lastPosY] = $i;
                $lastDirection                  = "down";
            } else {
                $spiral[--$lastPosX][$lastPosY] = $i;
            }
            break;

        default:
            echo "Something went wrong.";
            exit;
    }
}


$xDistance = abs($lastPosX - $firstPosX);
$yDistance = abs($lastPosY - $firstPosY);

$distanceTotal = ($xDistance + $yDistance);

echo $distanceTotal;


?>

