<?php

namespace AdventistCommons\Domain\Entity;

/**
 * Class Language
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Language
{
	private $id;
	private $name;
	private $code;
	private $googleCode;

	public function __construct(string $name, string $code)
	{
		$this->name = $name;
		$this->code = $code;
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

	public function getCode(): string
	{
		return $this->code;
	}

	public function getGoogleCode(): string
	{
		return $this->googleCode;
	}
}
