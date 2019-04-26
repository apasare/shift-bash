<?php

namespace TradeShift\ShiftBash;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class Terminal
{
    /**
     * @var CommandLineParser
     */
    protected $clParser;

    public function __construct(
        CommandLineParser $clParser
    ) {
        $this->clParser = $clParser;
    }

    public function run($input, $output)
    {
        // fputs($output, 'ShiftBash 1.0' . PHP_EOL);
        fputs($output, 'Directory Problem by Alex Pasare' . PHP_EOL);

        while(1) {
            if (feof($input)) {
                break;
            }

            $line = fgets($input);
            $command = $this->clParser->getCommand($line);
            if ($command) {
                fputs($output, sprintf('Command: %s', $line));
                fputs($output, $command->execute());
            }
        }

        fputs($output, 'End of Directory Problem by Alex Pasare' . PHP_EOL);
    }
}
