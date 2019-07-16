<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\UploadedCollection;
use Kolyunya\StringProcessor\Format\CamelCaseFormatter;

class ProductFileHydrator
{
	private $coverRootPath;
	private $xliffRootPath;
	
	public function __construct(string $coverRootPath, string $xliffRootPath)
	{
		$this->coverRootPath = $coverRootPath;
		$this->xliffRootPath = $xliffRootPath;
	}
	
	public function buildFiles(array $productData)
	{
		$fileFields = [
			'cover_image' => $this->coverRootPath,
			'xliff_file'  => $this->xliffRootPath,
		];
		foreach ($fileFields as $fileField => $rootPath) {
			if (isset($productData[$fileField])) {
				if ($productData[$fileField] && is_string($productData[$fileField])) {
					$productData[$fileField] = new File($rootPath,$productData[$fileField]);
				} elseif (!$productData[$fileField] instanceof File) {
					$productData[$fileField] = null;
				}
			}
		}
		
		return $productData;
	}
}
