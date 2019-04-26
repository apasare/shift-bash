<?php

namespace TradeShift\ShiftBash\Command;

use TradeShift\ShiftBash\Environment\Folder;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class Cd extends Command
{
    public function execute()
    {
        if (empty($this->args[0])) {
            return 'Missing argument' . PHP_EOL;
        }

        $subDirName = $this->args[0];
        $cwd = $this->env->getCwd();
        $subDir = $this->env->getSubDir($subDirName);
        if ($subDir === null) {
            return 'Subdirectory does not exist' . PHP_EOL;
        }

        $this->env->setCwd($subDir);
        return '';
    }
}
