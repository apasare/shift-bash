<?php

namespace TradeShift\ShiftBash;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class Commands
{
    protected $commands = [
        'dir' => Command\Dir::class,
        'mkdir' => Command\MkDir::class,
        'up' => Command\Up::class,
        'cd' => Command\Cd::class,
    ];

    /**
     * @var Environment
     */
    protected $env;

    public function __construct(Environment $env)
    {
        $this->env = $env;
    }

    public function getCommand($name, $args = [])
    {
        if (isset($this->commands[$name])) {
            $command = new $this->commands[$name]($this->env);
            $command->setArgs($args);
            return $command;
        }

        return null;
    }
}
