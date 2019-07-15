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
	
	public function __construct($path)
	{
		$this->path = $path;
	}
	
	public function getMimeType()
	{
		return $this->mimeType;
	}
	
	public function getExtension()
	{
		return $this->extension ?? self::extractExtension($this->path);
	}
	
	public function __toString()
	{
		return $this->path;
	}
	
	public function getPath()
	{
		return $this->path;
	}

	public function isInGroup($groupName)
	{
		return in_array($this->mimeType, self::MIME_TYPES_BY_GROUP[$groupName]);
	}

	public static function extractExtension($path)
	{
		$parts = pathinfo($path);
		
		return $parts['extension'];
	}
}
