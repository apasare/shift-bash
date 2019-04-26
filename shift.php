#!/usr/bin/php
<?php
/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use TradeShift\Core\DependencyInjectionContainer as DIC;
use TradeShift\ShiftBash\Terminal;

$dic = DIC::getInstance();
$shift = $dic->get(Terminal::class);

$input = STDIN;
$output = STDIN;
if (!empty($argv[1]) && file_exists($argv[1])) {
    $input = fopen($argv[1], 'r');
    // $output = fopen('file.out', 'w');
}
if (!empty($argv[2])) {
    $output = fopen($argv[2], 'w');
}

$shift->run($input, $output);
