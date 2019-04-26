<?php

namespace TradeShift\ShiftBash\Environment;

/**
 * @author Alex Pasare <alexandru.pasare@simplecoding.email>
 */
class Folder
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Folder
     */
    protected $parent;

    /**
     * @var Folder[]
     */
    protected $subDirs = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Folder|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Folder $this
     */
    public function setParent(Folder $parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return array
     */
    public function getSubDirs()
    {
        return $this->subDirs;
    }

    /**
     * @param Folder $subDir
     */
    public function addSubDir(Folder $subDir)
    {
        $subDir->setParent($this);
        $this->subDirs[] = $subDir;
        return $this;
    }

    /**
     * @param  string $name [description]
     * @return Folder|null
     */
    public function getSubDirByName(string $name)
    {
        foreach ($this->subDirs as $subDir) {
            if ($subDir->getName() === $name) {
                return $subDir;
            }
        }

        return null;
    }
}
