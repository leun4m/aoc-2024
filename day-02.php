<?php

function is_safe($report): bool
{
    if (sizeof($report) < 2) {
        return false;
    }

    $increasing = (int) ($report[0]) < (int) ($report[1]);

    for ($i = 0; $i < sizeof($report) - 1; $i++) {
        $a = (int) ($report[$i]);
        $b = (int) ($report[$i + 1]);

        $diff = abs($a - $b);
        if ($diff <= 0 || $diff > 3) {
            return false;
        }
        if ($increasing && $a > $b) {
            return false;
        }
        if (!$increasing && $a < $b) {
            return false;
        }

    }

    return true;
}

function is_safe_with_tolerance($report): bool
{
    return true;
}

function part_one($reports)
{
    $safe = 0;
    for ($i = 0; $i < sizeof($reports); $i++) {
        if (is_safe($reports[$i])) {
            $safe++;
        }
    }
    return $safe;
}


function part_two($reports)
{
    $safe = 0;
    for ($i = 0; $i < sizeof($reports); $i++) {
        if (is_safe_with_tolerance($reports[$i])) {
            $safe++;
        }
    }
    return $safe;
}

function main(): void
{
    $reports = [];

    $f = fopen('php://stdin', 'r');

    while ($line = fgets($f)) {
        $levels = preg_split("/\s+/", trim($line));
        array_push($reports, $levels);
    }

    fclose($f);

    print "Part 1: ";
    print (part_one($reports));
    print "\nPart 2: ";
    print (part_two($reports));
    print "\n";
}

main();
