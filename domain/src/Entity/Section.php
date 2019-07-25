<?php

namespace AdventistCommons\Domain\Entity;

use AdventistCommons\Domain\Hydrator\Normalizer;
use AdventistCommons\Domain\Storage\Putter\Formatter;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Section extends Entity
{
    private $name;
    private $xliffXliffRegion;
    private $product;
    private $contents = [];
    
    public static function getEntityMetadata(): array
    {
        return [
            'fields' => [
                'content' => [
                    'hydrate_normalizer' => Normalizer\ForeignNormalizer::class,
                    'store_processor'    => null,
                    'putter_formatter'   => Formatter\IdFormatter::class,
                    'class'              => Content::class,
                    'multiple'           => true,
                ],
                'product' => [
                    'hydrate_normalizer' => Normalizer\ForeignNormalizer::class,
                    'store_processor'    => null,
                    'putter_formatter'   => Formatter\IdFormatter::class,
                    'class'              => Product::class,
                    'multiple'           => true,
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
    
    public function getXliffRegion(): ?string
    {
        return $this->xliffXliffRegion;
    }

    public function setXliffRegion($xliffXliffRegion): self
    {
        $this->xliffXliffRegion = $xliffXliffRegion;

        return $this;
    }
    
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    public function getProduct(): ?Product
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
    
    public function getContent(): ?array
    {
        return $this->contents;
    }
}
