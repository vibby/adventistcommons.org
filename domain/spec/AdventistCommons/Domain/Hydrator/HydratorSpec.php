<?php

namespace spec\AdventistCommons\Domain\Hydrator;

use PhpSpec\ObjectBehavior;
use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Hydrator\EntityCache;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Hydrator\Normalizer\AggregatedNormalizer;

class HydratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Hydrator::class);
    }
    
    public function let(
        AggregatedNormalizer $normalizer,
        MetadataManager $metadataManager,
        EntityCache $entityCache,
        EntityMetadata $metadata
    ) {
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
    
    public function it_should_accept_class_name()
    {
        $this->hydrate(Product::class, [])->shouldReturnAnInstanceOf(Product::class);
    }
    
    public function it_should_refuse_a_class_that_is_not_an_entity()
    {
        $this->shouldThrow('\Exception')->duringHydrate(new \StdClass, []);
    }
    
    public function it_should_refuse_another_string()
    {
        $this->shouldThrow('\Exception')->duringHydrate('\nothingThere', []);
    }
}
