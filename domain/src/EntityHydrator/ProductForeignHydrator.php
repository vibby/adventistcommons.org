<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\UploadedCollection;
use Kolyunya\StringProcessor\Format\CamelCaseFormatter;

class ProductForeignHydrator extends Hydrator
{
	private $hydratorProject;
	private $hydratorProductAttachment;
	
	public function __construct(ProjectHydrator $projectHydrator, ProductAttachmentHydrator $productAttachmentHydrator)
	{
		$this->hydratorProject = $projectHydrator;
		$this->hydratorProductAttachment = $productAttachmentHydrator;
	}
	
	public function hydrate(array $productData, Product $product)
	{
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
		
		return $product;
	}
}
