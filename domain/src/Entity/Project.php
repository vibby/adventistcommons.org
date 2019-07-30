<?php

namespace AdventistCommons\Domain\Entity;

use AdventistCommons\Domain\Storage\Processor;
use AdventistCommons\Domain\Hydrator\Normalizer;
use AdventistCommons\Domain\Storage\Putter\Serializer;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Project extends Entity
{
    private $product;
    private $language;
    private $status;
    
    public static function getEntityMetadata(): array
    {
        return [
            'fields' => [
                'language' => [
                    'hydrate_normalizer' => Normalizer\ForeignNormalizer::class,
                    'store_processor'    => Processor\PutterProcessor::class,
                    'putter_serializer'  => Serializer\IdSerializer::class,
                    'class'              => Language::class,
                    'multiple'           => false,
                ],
                'product' => [
                    'hydrate_normalizer' => Normalizer\ForeignNormalizer::class,
                    'store_processor'    => Processor\PutterProcessor::class,
                    'putter_serializer'  => Serializer\IdSerializer::class,
                    'class'              => Product::class,
                    'multiple'           => false,
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
