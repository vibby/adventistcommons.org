<?php

namespace AdventistCommons\Domain\Storage\Remover;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface ProductRemoverInterface
{
    public function removeProduct(int $productId): void;
}
