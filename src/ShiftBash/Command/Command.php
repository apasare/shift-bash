<?php

namespace TradeShift\ShiftBash\Command;

use TradeShift\ShiftBash\Environment;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
abstract class Command
{
    /**
     * @var array
     */
    protected $args = [];

    /**
     * @var Environment
     */
    protected $env;

    public function __construct(Environment $env)
    {
        $this->env = $env;
    }

    public function setArgs($args = [])
    {
        $this->args = $args;
    }

    abstract public function execute();
}