<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\File\File;
use Kolyunya\StringProcessor\Format\CamelCaseFormatter;

class ProductHydrator extends Hydrator
{
	private $hydratorProject;
	private $hydratorProductAttachment;

	public function __construct(ProjectHydrator $projectHydrator, ProductAttachmentHydrator $productAttachmentHydrator)
	{
		$this->hydratorProject = $projectHydrator;
		$this->hydratorProductAttachment = $productAttachmentHydrator;
	}

	public function hydrate(array $productData, Product $product = null, $useCache = true)
	{
		if ($useCache && isset($productData['id']) && $existing = $this->getCache($productData['id'])) {
			return $existing;
		}
		
		$fileFields = ['cover_image', 'xliff_file'];
		foreach ($fileFields as $fileField) {
			if (isset($productData[$fileField]) && $productData[$fileField] && is_string($productData[$fileField])) {
				$productData[$fileField] = new File($productData[$fileField]);
			}
		}
		$product = Hydrator::hydrateProperties(
			$product ?? new Product(),
			$productData
		);
		
		$foreignFields = ['product_attachment', 'project'];
		foreach ($foreignFields as $foreignField) {
			$camelCase = CamelCaseFormatter::run($foreignField);
			$addMethodName = sprintf('add%s', $camelCase);
			$hydratorName = sprintf('hydrator%s', $camelCase);
			if (isset($productData[$foreignField])) {
				foreach ($productData[$foreignField] as $childData) {
					$product->$addMethodName($this->$hydratorName->hydrateFromProduct($childData, $product));
				}
			}
		}

		if (isset($productData['id'])) {
			$this->setCache($productData['id'], $product);
		}

		return $product;
	}
}
