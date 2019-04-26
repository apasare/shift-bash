<?php

namespace TradeShift\ShiftBash\Command;

use TradeShift\ShiftBash\Environment\Folder;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class Up extends Command
{
    const NAME = 'up';

    public function execute()
    {
        $cwd = $this->env->getCwd();
        if ($cwd->getParent() === null) {
            return 'Cannot move up from root directory' . PHP_EOL;
        }
        $this->env->setCwd($cwd->getParent());
        return '';
    }
}
