<?php

namespace spec\AdventistCommons\Domain\Hydrator;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Hydrator\EntityCache;
use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Hydrator\Normalizer\AggregatedNormalizer;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\MetadataManager;
use PhpSpec\ObjectBehavior;

class HydratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Hydrator::class);
    }
	
	function let(
		AggregatedNormalizer $normalizer,
		MetadataManager $metadataManager,
		EntityCache $entityCache,
		EntityMetadata $metadata
	)
	{
		$this->beConstructedWith(
			$normalizer,
			$metadataManager,
			$entityCache
		);
		
		$metadataManager->getForClass(Product::class)->willReturn($metadata);
		$normalizer->normalize([], $metadata)->willReturn([]);
		$normalizer->setHydrator($this);
	}
	
	///////////////////////
	// getEntity
	///////////////////////
	
//	@TODO problem of classname, got to find a solution to make this work
//	function it_should_accept_entity(Product $product)
//	{
//		$this->hydrate($product, [])->shouldReturn($product);
//	}
	
	function it_should_accept_class_name()
	{
		$this->hydrate(Product::class, [])->shouldReturnAnInstanceOf(Product::class);
	}
	
	function it_should_refuse_a_class_that_is_not_an_entity()
	{
		$this->shouldThrow('\Exception')->duringHydrate(new \StdClass, []);
	}
	
	function it_should_refuse_another_string()
	{
		$this->shouldThrow('\Exception')->duringHydrate('\nothingThere', []);
	}
}
