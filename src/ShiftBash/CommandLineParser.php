<?php

namespace TradeShift\ShiftBash;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class CommandLineParser
{
    /**
     * @var Commands
     */
    protected $commands;

    public function __construct(
        Commands $commands
    ) {
        $this->commands = $commands;
    }

    public function getCommand($line)
    {
        $args = \Clue\Arguments\split($line);
        $command = array_shift($args);
        return $this->commands->getCommand($command, $args);
    }
}
