<?php

namespace AdventistCommons\Domain\Request;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ParameterCollection implements \ArrayAccess, \Iterator
{
	private $params = [];
	
	public function __construct($params) {
		$this->params = $params;
		$this->position = 0;
	}
	
	public function offsetExists($offset) {
		return isset($this->params[$offset]);
	}
	
	public function offsetGet($offset) {
		return $this->params[$offset];
	}
	
	public function offsetSet($offset, $uploaded) {
		/** Uploaded $uploaded */
		$this->params[$offset] = $uploaded;
	}
	
	public function offsetUnset($offset) {
		unset($this->params[$offset]);
	}
	
	function rewind()
	{
		return reset($this->params);
	}
	
	function current()
	{
		return current($this->params);
	}
	
	function key()
	{
		return key($this->params);
	}
	
	function next()
	{
		return next($this->params);
	}
	
	function valid()
	{
		return key($this->params) !== null;
	}
	
	static function buildFromRequestsParams(array $params): self
	{
		foreach ($params as $key => $value) {
			if (substr($key, -3) === '_id') {
				$realKey =  substr($key, 0, -3);
				if( !$value ) {
					$params[$realKey] = null;
				} else {
					$params[$realKey][][ "id" ] = $value;
				}
				unset($params[$key]);
			}
		}
		
		return new self($params);
	}
}
