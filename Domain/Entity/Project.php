<?php

namespace AdventistCommons\Domain\Entity;

/**
 * Class Project
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Project
{
	private $id;
	private $product;
	private $language;
	private $status;

	public function __construct(Product $product, Language $language, string $status)
	{
		$this->product = $product;
		$this->language = $language;
		$this->status = $status;
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

	public function getProduct(): Product
	{
		return $this->product;
	}

	public function setProduct(Product $product): self
	{
		$this->product = $product;

		return $this;
	}

	public function getLanguage(): ?Language
	{
		return $this->language;
	}

	public function setLanguage(Language $language): self
	{
		$this->language = $language;

		return $this;
	}

	public function getStatus(): string
	{
		return $this->status;
	}

	public function setStatus(string $status): self
	{
		$this->status = $status;

		return $this;
	}
}
