<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\Validation\Violation\ViolationError;
use AdventistCommons\Domain\Entity\Product;
use Kolyunya\StringProcessor\Format\SnakeCaseFormatter;

class ProductStorer
{
	private $productPutter;
	
	public function __construct(ProductPutterInterface $productPutter) 
	{
		$this->productPutter = $productPutter;		
	}
	
	final public function store(Product $product): Product
	{
		$productData = [];
		$productReflection = new \ReflectionClass(Product::class);
		foreach ($productReflection->getMethods(\ReflectionMethod::IS_PUBLIC) as $reflectionMethod) {
			$methodName = $reflectionMethod->name; 
			if (substr($methodName, 0, 3) === 'get') {
				$propertyName = substr($methodName, 3);
				$propertyName = SnakeCaseFormatter::run($propertyName);
				$value = $product->$methodName();
				$productData[$propertyName] = is_array($value) ? serialize($value) : $value;
			}		
		}
		
		$id = $this->productPutter->putProductAndGetId($productData);
		$product->setId($id);
		
		return $product;
	}
}
