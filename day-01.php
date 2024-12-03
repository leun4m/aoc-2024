<?php

function part_one($left, $right): int
{
    sort($left);
    sort($right);

    $sum = 0;
    for ($i = 0; $i < sizeof($left); $i++) {
        $sum += abs($left[$i] - $right[$i]);
    }

    return $sum;
}

function part_two($left, $right): int
{
    $sum = 0;
    for ($i = 0; $i < sizeof($left); $i++) {
        $elem = $left[$i];
        $multiplier = 0;

        for ($j = 0; $j < sizeof($right); $j++) {
            if ($elem == $right[$j]) {
                $multiplier++;
            }
        }

        $sum += $elem * $multiplier;
    }

    return $sum;
}

function main(): void
{
    $left = [];
    $right = [];

    $f = fopen('php://stdin', 'r');

    while ($line = fgets($f)) {
        $arr = preg_split("/\s+/", $line);
        array_push($left, $arr[0]);
        array_push($right, $arr[1]);
    }

    fclose($f);

    print "Part 1: ";
    print (part_one($left, $right));
    print "\nPart 2: ";
    print (part_two($left, $right));
    print "\n";
}

main();
