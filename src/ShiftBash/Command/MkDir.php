<?php

namespace TradeShift\ShiftBash\Command;

use TradeShift\ShiftBash\Environment\Folder;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class MkDir extends Command
{
    const NAME = 'mkdir';

    public function execute()
    {
        if (empty($this->args[0])) {
            return 'Missing argument' . PHP_EOL;
        }

        return $this->env->addSubDir($this->args[0]);
    }
}
