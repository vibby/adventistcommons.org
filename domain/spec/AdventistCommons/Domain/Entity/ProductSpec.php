<?php

namespace spec\AdventistCommons\Domain\Entity;

use PhpSpec\ObjectBehavior;
use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\Project;
use AdventistCommons\Domain\Entity\Language;
use AdventistCommons\Domain\Entity\ProductAttachment;

class ProductSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Product::class);
    }

    public function it_gives_attachments_and_projects(
        Language $lang1,
        Language $lang2,
        ProductAttachment $attachment1,
        Project $project1
    ) {
        $lang1->getCode()->willReturn('en');
        $lang2->getCode()->willReturn('fr');
        $attachment1->getLanguage()->willReturn($lang1);
        $attachment1->getProduct()->willReturn($this);
        $this->addProductAttachment($attachment1);
        $project1->getLanguage()->willReturn($lang2);
        $this->addProject($project1);

        $this->getLanguagesRelations()->shouldReturn([
            'en' => [
                'language'           => $lang1,
                'productAttachments' => [$attachment1],
            ],
            'fr' => [
                'language' => $lang2,
                'project'  => $project1,
            ],
        ]);
    }

    public function it_gives_project_only_if_is_has_lang(
        Language $lang1,
        Project $project1,
        Project $project2
    ) {
        $lang1->getCode()->willReturn('en');
        $project1->getLanguage()->willReturn($lang1);
        $this->addProject($project1);
        $this->addProject($project2);

        $this->getLanguagesRelations()->shouldReturn([
            'en' => [
                'language' => $lang1,
                'project'  => $project1,
            ],
        ]);
    }

    public function it_does_not_give_project_with_same_lang(
        Language $lang1,
        Project $project1,
        ProductAttachment $attachment1
    ) {
        $lang1->getCode()->willReturn('en');
        $attachment1->getLanguage()->willReturn($lang1);
        $attachment1->getProduct()->willReturn($this);
        $this->addProductAttachment($attachment1);
        $project1->getLanguage()->willReturn($lang1);
        $this->addProject($project1);

        $this->getLanguagesRelations()->shouldReturn([
            'en' => [
                'language'           => $lang1,
                'productAttachments' => [$attachment1],
            ],
        ]);
    }
}
