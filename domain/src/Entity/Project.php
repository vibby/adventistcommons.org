<?php

namespace AdventistCommons\Domain\Entity;

use AdventistCommons\Domain\Storage\Normalizer as Storage;
use AdventistCommons\Domain\Hydrator\Normalizer as Hydrate;

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
                    'hydrate_normalizer' => Hydrate\ForeignNormalizer::class,
                    'store_normalizer'   => Storage\ForeignNormalizer::class,
                    'class'              => Language::class,
                    'multiple'           => false,
                ],
                'product' => [
                    'hydrate_normalizer' => Hydrate\ForeignNormalizer::class,
                    'store_normalizer'   => Storage\ForeignNormalizer::class,
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
