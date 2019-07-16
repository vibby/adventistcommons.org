<?php

namespace AdventistCommons\Domain\File;

class File
{
	const MIME_TYPES_BY_GROUP = [
		'image' => [
			'image/jpeg',
			'image/png',
		],
	];
	
	protected $path = '';
	protected $mimeType;
	protected $size;
	protected $extension;
	private $info;
	
	public function __construct($base, $path)
	{
		$this->path = $path;
		$this->base = $base;
		$this->info = new \SplFileInfo($this->getAbsolutePath());
	}
	
	public function getInfo()
	{
		return $this->info;
	}
	
	public function getMimeType()
	{
		return $this->mimeType ?? mime_content_type($this->getAbsolutePath());
	}
	
	public function getExtension()
	{
		return $this->extension ?? $this->info->getExtension();
	}
	
	public function __toString()
	{
		return $this->path;
	}
	
	public function getPath()
	{
		return $this->path;
	}

	public function getAbsolutePath()
	{
		return $this->base.DIRECTORY_SEPARATOR.$this->path;
	}

	public function isInGroup($groupName)
	{
		return in_array($this->getMimeType(), self::MIME_TYPES_BY_GROUP[$groupName]);
	}
}
