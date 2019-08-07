<?php

namespace AdventistCommons\Domain\Storage\Remover;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface ContentRemoverInterface
{
    public function removeContent(int $contentId): void;
}
