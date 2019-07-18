<?php

namespace AdventistCommons\Domain\Entity;

use AdventistCommons\Domain\EntityHydrator\Preprocessor\ForeignPreprocessor;

/**
 * Class ProductAttachment
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ProductAttachment extends Entity
{
	const FILE_TYPES = [
		"pdf_printing" => "PDF (Production)",
		"pdf_personal" => "PDF (Personal)",
		"indd" => "InDesign",
	];

	private $language;
	private $product;
	private $file;
	private $fileType;
	
	public static function __getMetaData(): array
	{
		return [
			'fields' => [
				'language' => [
					'type'     => ForeignPreprocessor::TYPE,
					'class'    => Language::class,
					'multiple' => false,
				],
				'product' => [
					'type'     => ForeignPreprocessor::TYPE,
					'class'    => Product::class,
					'multiple' => false,
				],
			]
		];
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
