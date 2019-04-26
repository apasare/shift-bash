<?php

namespace TradeShift\ShiftBash;

use TradeShift\Core\DependencyInjectionContainer as DIC;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class Commands
{
    protected $commands = [
        Command\Dir::NAME => Command\Dir::class,
        Command\MkDir::NAME => Command\MkDir::class,
        Command\Up::NAME => Command\Up::class,
        Command\Cd::NAME => Command\Cd::class,
    ];

    public function getCommand($name, $args = [])
    {
        if (isset($this->commands[$name])) {
            $command = DIC::getInstance()->create($this->commands[$name]);
            $command->setArgs($args);
            return $command;
        }

        return null;
    }
}
