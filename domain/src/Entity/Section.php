<?php

namespace AdventistCommons\Domain\Entity;

use AdventistCommons\Domain\Hydrator\Normalizer;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Section extends Entity
{
	private $name;
	private $region;
	private $product;
	private $contents = [];
	
	public static function __getMetaData(): array
	{
		return [
			'fields' => [
				'content' => [
					'hydrate_normalizer' => Normalizer\ForeignNormalizer::class,
					'store_processor' => null,
					'class'    => Content::class,
					'multiple' => true,
				],
				'product' => [
					'hydrate_normalizer' => Normalizer\ForeignNormalizer::class,
					'store_processor' => null,
					'class'    => Product::class,
					'multiple' => true,
				],
			],
		];
	}

	public function __construct()
	{
	}
	
	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName($name): self
	{
		$this->name = $name;

		return $this;
	}
	
	public function getRegion(): ?string
	{
		return $this->region;
	}

	public function setRegion($region): self
	{
		$this->region = $region;

		return $this;
	}
	
	public function setProduct(Product $product)
	{
		$this->product = $product;
	}

	public function getProduct(): Product
	{
		return $this->product;
	}
	
	public function addContent(Content $content)
	{
		$content->setSection($this);
		$this->contents[] = $content;
	}
	
	public function setContent(array $contents)
	{
		$this->contents = $contents;
	}
	
	public function getContents(): ?array
	{
		return $this->contents;
	}
}
