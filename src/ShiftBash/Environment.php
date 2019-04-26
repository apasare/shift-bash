<?php

namespace TradeShift\ShiftBash;

use TradeShift\ShiftBash\Environment\Folder;

/**
 * @singleton
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class Environment
{
    const SUBDIRS_TOTAL_LIMIT = 5000;

    protected $cwd;

    protected $totalSubDirs = 0;

    public function __construct()
    {
        $this->cwd = new Folder('root');
    }

    /**
     * @param Folder $cwd [description]
     * @return Environment $this
     */
    public function setCwd(Folder $cwd)
    {
        $this->cwd = $cwd;
        return $this;
    }

    /**
     * @return Folder
     */
    public function getCwd()
    {
        return $this->cwd;
    }

    /**
     * @param  string $name
     * @return Folder|null
     */
    public function getSubDir(string $name)
    {
        return $this->cwd->getSubDirByName($name);
    }

    /**
     * @param string $message
     */
    public function addSubDir(string $name)
    {
        if ($this->totalSubDirs == self::SUBDIRS_TOTAL_LIMIT) {
            return '';
        }

        if ($this->getSubDir($name) !== null) {
            return 'Subdirectory already exists' . PHP_EOL;
        }

        $this->cwd->addSubDir(new Folder($name));
        ++$this->totalSubDirs;
        return '';
    }
}
