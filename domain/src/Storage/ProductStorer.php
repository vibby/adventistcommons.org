<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\Validation\Violation\ViolationError;
use AdventistCommons\Domain\Entity\Product;
use Kolyunya\StringProcessor\Format\SnakeCaseFormatter;

class ProductStorer
{
	private $productPutter;

	public function __construct(ProductPutterInterface $productPutter, FileStorer $fileStorer)
	{
		$this->productPutter = $productPutter;
		$this->fileStorer = $fileStorer;
	}

	final public function store(Product $product): Product
	{
		$product = $this->fileStorer->storeImages($product, ['CoverImage']);
		// @TODO : treate XLIFF file to add associated stuff
		$product = $this->fileStorer->storeFiles($product, ['XliffFile']);
		$productData = Formater::formatToArray($product);
		// @TODO : store created series as well

		$id = $this->productPutter->putProductAndGetId($productData);
		$product->setId($id);

		return $product;
	}
}
