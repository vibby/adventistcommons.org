<?php

namespace AdventistCommons\Domain\Entity;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Series extends Entity
{
	private $name;
	
	public static function __getMetaData(): array
	{
		return [];
	}
	
	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}
}
