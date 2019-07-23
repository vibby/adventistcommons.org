<?php

namespace AdventistCommons\Domain\Entity;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\Hydrator\Normalizer;
use AdventistCommons\Domain\Storage\Processor;
use AdventistCommons\Domain\Validation\ProductAttachmentValidator;
use AdventistCommons\Domain\Storage\Putter\Formatter;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ProductAttachment extends Entity
{
    const FILE_TYPES = [
        "pdf_printing" => "PDF (Production)",
        "pdf_personal" => "PDF (Personal)",
        "indd"         => "InDesign",
    ];

    private $language;
    private $product;
    private $file;
    private $fileType;
    
    public static function __getMetaData(): array
    {
        return [
            'validator_class' => ProductAttachmentValidator::class,
            'fields' => [
                'language' => [
                    'hydrate_normalizer' => [
                        Normalizer\ForeignNormalizer::class,
                        Normalizer\ForeignFromIdNormalizer::class,
                    ],
                    'putter_formatter' => Formatter\IdFormatter::class,
                    'class'    => Language::class,
                    'multiple' => false,
                ],
                'product' => [
                    'hydrate_normalizer' => [
                        Normalizer\ForeignNormalizer::class,
                        Normalizer\ForeignFromIdNormalizer::class,
                    ],
                    'putter_formatter' => Formatter\IdFormatter::class,
                    'class'    => Product::class,
                    'multiple' => false,
                ],
                'file' => [
                    'hydrate_normalizer' => Normalizer\FileNormalizer::class,
                    'store_processor' => Processor\UploadProcessor::class,
                    'remove_processor' => Processor\FileRemoveProcessor::class,
                    'root_path_group' => 'attachment',
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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): self
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
