<?php

namespace AdventistCommons\Domain\Entity;

/**
 * Class Series
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Series
{
	private $id;
	private $name;

	public function __construct(string $name)
	{
		$this->name = $name;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function setId(int $id): self
	{
		$this->id = $id;

		return $this;
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
