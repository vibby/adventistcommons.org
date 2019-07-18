<?php

namespace AdventistCommons\Domain\Entity;

use AdventistCommons\Domain\Hydrator\Preprocessor as Hydrate;
use AdventistCommons\Domain\Storage\Preprocessor as Storage;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Project extends Entity
{
	private $product;
	private $language;
	private $status;
	
	public static function __getMetaData(): array
	{
		return [
			'fields' => [
				'language' => [
					'hydrate_preprocessor' => Hydrate\ForeignPreprocessor::class,
					'store_preprocessor' => Storage\ForeignPreprocessor::class,
					'class'    => Language::class,
					'multiple' => false,
				],
				'product' => [
					'hydrate_preprocessor' => Hydrate\ForeignPreprocessor::class,
					'store_preprocessor' => Storage\ForeignPreprocessor::class,
					'class'    => Product::class,
					'multiple' => false,
				],
			],
		];
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

	public function getStatus(): ?string
	{
		return $this->status;
	}

	public function setStatus(string $status): self
	{
		$this->status = $status;

		return $this;
	}
}
