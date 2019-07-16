<?php

namespace AdventistCommons\Domain\File;

class FileSystem
{
	private $uploadsDirectory;
	
	public function __construct($uploadsDirectory)
	{
		$this->uploadsDirectory = $uploadsDirectory;
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
		$this->copy($uploaded->getAbsolutePath(), $this->uploadsDirectory.'/'.$definitiveFileName);
		
		return new File($this->uploadsDirectory, $definitiveFileName);
	}
}
