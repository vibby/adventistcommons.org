<?php

namespace AdventistCommons\Domain\Entity;

/**
 * Class ProductAttachment
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ProductAttachment
{
	const FILE_TYPES = [
		"pdf_printing" => "PDF (Production)",
		"pdf_personal" => "PDF (Personal)",
		"indd" => "InDesign",
	];

	private $id;
	private $language;
	private $product;
	private $file;
	private $fileType;

	public function __construct()
	{
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

	public function getLanguage(): ?Language
	{
		return $this->language;
	}

	public function setLanguage(Language $language): self
	{
		$this->language = $language;

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

	public function getFile(): string
	{
		return $this->file;
	}

	public function setFile(string $file): self
	{
		$this->file = $file;

		return $this;
	}

	public function getFileType(): string
	{
		return $this->fileType;
	}

	public function setFileType(string $fileType): self
	{
		$this->fileType = $fileType;

		return $this;
	}
}
