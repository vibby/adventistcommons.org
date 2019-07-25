<?php

namespace AdventistCommons\Domain\Storage\Remover;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface ProductRemoverInterface
{
    public function removeProduct(int $productId): void;
}
