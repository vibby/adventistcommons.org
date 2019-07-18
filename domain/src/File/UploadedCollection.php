<?php

namespace AdventistCommons\Domain\File;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class UploadedCollection implements \ArrayAccess, \Iterator
{
	private $files = [];
	
	public function __construct() {
		$this->position = 0;
	}
	
	public function offsetExists($offset) {
		return isset($this->files[$offset]);
	}
	
	public function offsetGet($offset) {
		return $this->files[$offset];
	}
	
	public function offsetSet($offset, $uploaded) {
		/** Uploaded $uploaded */
		if (!$uploaded instanceof Uploaded) {
			throw new \LogicException('Uploaded files list can only accept uploaded files.');
		}
		$this->files[$offset] = $uploaded;
	}
	
	public function offsetUnset($offset) {
		unset($this->files[$offset]);
	}
	
	function rewind()
	{
		return reset($this->files);
	}
	
	function current()
	{
		return current($this->files);
	}
	
	function key()
	{
		return key($this->files);
	}
	
	function next()
	{
		return next($this->files);
	}
	
	function valid()
	{
		return key($this->files) !== null;
	}
	
	static function buildFromRequestsFiles($files)
	{
		$collection = new self;
		foreach ($files as $name => $fileInfo) {
			if ($file = UploadedBuilder::build($fileInfo)) {
				$collection[$name] = $file;
			}
		}
		
		return $collection;
	}
}
