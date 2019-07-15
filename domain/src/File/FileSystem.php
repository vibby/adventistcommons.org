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
		
	public function makeDefinitive(Uploaded $uploaded, $definitiveFileName = null)
	{
		$definitiveFileName =
			$definitiveFileName ??
			sprintf('%s.%s', uniqid(rand(), true), $uploaded->getExtension());
		$definitivePath = $this->uploadsDirectory.'/'.$definitiveFileName;
		$this->copy($uploaded->path, $definitivePath);
		
		return new File($definitiveFileName);
	}
}
