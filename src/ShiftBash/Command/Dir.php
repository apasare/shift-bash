<?php

namespace TradeShift\ShiftBash\Command;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class Dir extends Command
{
    const NAME = 'dir';

    protected function getCwdPath()
    {
        $pathPieces = [];

        $startDir = $this->env->getCwd();
        while ($startDir !== null) {
            array_unshift($pathPieces, $startDir->getName());
            $startDir = $startDir->getParent();
        }

        return implode('\\', $pathPieces);
    }

    public function execute()
    {
        $output = sprintf('Directory of %s:' . PHP_EOL, $this->getCwdPath());

        $cwd = $this->env->getCwd();
        $subDirs = $cwd->getSubDirs();
        if (!count($subDirs)) {
            $output .= 'No subdirectories' . PHP_EOL;
        } else {
            $names = array_map(function ($dir) {
                return $dir->getName();
            }, $subDirs);
            sort($names);
            $output .= implode(' ', $names) . PHP_EOL;
        }

        return $output;
    }
}
