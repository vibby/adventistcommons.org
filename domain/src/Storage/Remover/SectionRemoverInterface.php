<?php

namespace AdventistCommons\Domain\Storage\Remover;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface SectionRemoverInterface
{
    public function removeSection(int $sectionId): void;
}
