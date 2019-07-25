<?php

namespace AdventistCommons\Domain\File;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class FileSystem
{
    private $rootPathByGroup;
    
    public function __construct(array $rootPathByGroup)
    {
        $this->rootPathByGroup = $rootPathByGroup;
    }
    
    public function copy($source, $destination)
    {
        return copy($source, $destination);
    }
        
    public function makeUploadedDefinitive(Uploaded $uploaded, $definitiveFileName = null)
    {
        $definitiveFileName =
            $definitiveFileName ??
            sprintf('%s.%s', uniqid(rand(), true), $uploaded->getExtension());
        $this->copy($uploaded->getAbsolutePath(), $this->getRootPath().'/'.$definitiveFileName);
        
        return new File($this->getRootPath(), $definitiveFileName);
    }
    
    public function getRootPath($key = 0): string
    {
        if (! isset($this->rootPathByGroup[$key])) {
            throw new \Exception(sprintf('Root path for property %s is not defined', $key));
        }
        
        return $this->rootPathByGroup[$key];
    }
}
