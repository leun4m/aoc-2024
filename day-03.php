<?php


function part_one($input): int
{
    $sum = 0;

    preg_match_all(pattern: "/mul\((\d+),(\d+)\)/", subject: trim(string: $input), matches: $matches);
    for ($i = 0; $i < sizeof(value: $matches[0]); $i++) {
        $sum += (int) $matches[1][$i] * (int) $matches[2][$i];
    }

    return $sum;
}

function part_two($input): int
{
    $sum = 0;
    $is_do = true;

    for ($i = 0; $i < strlen(string: $input); $i++) {
        $do_match = preg_match(pattern: "/^do\(\)/", subject: substr(string: $input, offset: $i));
        $dont_match = preg_match(pattern: "/^don't\(\)/", subject: substr(string: $input, offset: $i));
        $mul = preg_match(pattern: "/^mul\((\d+),(\d+)\)/", subject: substr(string: $input, offset: $i), matches: $matches);

        if ($dont_match == 1) {
            $is_do = false;
        } elseif ($do_match == 1) {
            $is_do = true;
        } elseif ($mul == 1 && $is_do) {
            $sum += (int) $matches[1] * (int) $matches[2];
        }
    }

    return $sum;
}

function main(): void
{
    $f = fopen(filename: 'php://stdin', mode: 'r');

    $input = "";

    while ($line = fgets(stream: $f)) {
        $input .= $line;
    }

    fclose(stream: $f);

    print "Part 1: ";
    print (part_one($input));
    print "\nPart 2: ";
    print (part_two($input));
    print "\n";
}

main();
