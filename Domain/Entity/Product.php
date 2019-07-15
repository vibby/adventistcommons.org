<?php

namespace AdventistCommons\Domain\Entity;
use AdventistCommons\Domain\File\File;

/**
 * Class Product
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Product extends Entity
{
	const TYPES = ['book','booklet','magabook','tract'];
	const AUDIENCES = ['Christian','Muslim','Buddhist','Hindu','Sikh','Animist','Secular'];
	const BINDINGS = ['Hardcover','Perfect Bound','Spiral Bound','Saddle Stitch','Folded'];

	private $name;
	private $description;
	private $coverImage;
	private $author;
	private $pageCount;
	private $type;
	private $xliffFile;
	private $audience;
	private $publisher;
	private $formatOpen;
	private $formatClosed;
	private $coverColors;
	private $coverPaper;
	private $interiorColors;
	private $interiorPaper;
	private $binding;
	private $finishing;
	private $publisherWebsite;
	private $series;
	private $productAttachments = [];
	private $projects = [];

	public function __construct()
	{
		$this->setType('book');
	}
	
	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(string $description): self
	{
		$this->description = $description;

		return $this;
	}

	public function getCoverImage(): ?File
	{
		return $this->coverImage;
	}

	public function setCoverImage(?File $coverImage): self
	{
		$this->coverImage = $coverImage;

		return $this;
	}

	public function getAuthor(): ?string
	{
		return $this->author;
	}

	public function setAuthor(string $author): self
	{
		$this->author = $author;

		return $this;
	}

	public function getPageCount(): ?int
	{
		return $this->pageCount;
	}

	public function setPageCount(int $pageCount): self
	{
		$this->pageCount = $pageCount;

		return $this;
	}

	public function getType(): ?string
	{
		return $this->type;
	}

	public function setType(string $type): self
	{
		$this->type = $type;

		return $this;
	}

	public function getXliffFile(): ?File
	{
		return $this->xliffFile;
	}

	public function setXliffFile(File $xliffFile): self
	{
		$this->xliffFile = $xliffFile;

		return $this;
	}

	public function getAudience(): ?string
	{
		return $this->audience;
	}

	public function setAudience(string $audience): self
	{
		$this->audience = $audience;

		return $this;
	}

	public function getPublisher(): ?string
	{
		return $this->publisher;
	}

	public function setPublisher(string $publisher): self
	{
		$this->publisher = $publisher;

		return $this;
	}

	public function getFormatOpen(): ?string
	{
		return $this->formatOpen;
	}

	public function setFormatOpen(string $formatOpen): self
	{
		$this->formatOpen = $formatOpen;

		return $this;
	}

	public function getFormatClosed(): ?string
	{
		return $this->formatClosed;
	}

	public function setFormatClosed(string $formatClosed): self
	{
		$this->formatClosed = $formatClosed;

		return $this;
	}

	public function getCoverColors(): ?string
	{
		return $this->coverColors;
	}

	public function setCoverColors(string $coverColors): self
	{
		$this->coverColors = $coverColors;

		return $this;
	}

	public function getCoverPaper(): ?string
	{
		return $this->coverPaper;
	}

	public function setCoverPaper(string $coverPaper): self
	{
		$this->coverPaper = $coverPaper;

		return $this;
	}

	public function getInteriorColors(): ?string
	{
		return $this->interiorColors;
	}

	public function setInteriorColors(string $interiorColors): self
	{
		$this->interiorColors = $interiorColors;

		return $this;
	}

	public function getInteriorPaper(): ?string
	{
		return $this->interiorPaper;
	}

	public function setInteriorPaper(string $interiorPaper): self
	{
		$this->interiorPaper = $interiorPaper;

		return $this;
	}

	public function getBinding(): ?string
	{
		return $this->binding;
	}

	public function setBinding(string $binding): self
	{
		$this->binding = $binding;

		return $this;
	}

	public function getFinishing(): ?string
	{
		return $this->finishing;
	}

	public function setFinishing(string $finishing): self
	{
		$this->finishing = $finishing;

		return $this;
	}

	public function getPublisherWebsite(): ?string
	{
		return $this->publisherWebsite;
	}

	public function setPublisherWebsite(string $publisherWebsite): self
	{
		$this->publisherWebsite = $publisherWebsite;

		return $this;
	}

	public function getSeries(): ?string
	{
		return $this->series;
	}

	public function setSeries(Series $series): self
	{
		$this->series = $series;

		return $this;
	}

	public function addProductAttachment(ProductAttachment $productAttachment)
	{
		$this->productAttachments[] = $productAttachment;
	}

	public function getProductAttachments(): ?array
	{
		return $this->productAttachments;
	}

	public function addProject(Project $project)
	{
		$this->projects[] = $project;
	}

	public function getProjects(): ?array
	{
		return $this->projects;
	}

	public function getLanguagesRelations(): array
	{
		$relations = [];
		foreach ($this->getProductAttachments() as $productAttachment) {
			if ($language = $productAttachment->getLanguage()) {
				if (!isset($relations[$language->getCode()])) {
					$relations[$language->getCode()] = [
						'language' => $language,
						'productAttachments' => [$productAttachment],
					];
				} else {
					$relations[$language->getCode()]['productAttachments'][] = $productAttachment;
				}
			}
		}
		foreach ($this->getProjects() as $project) {
			if (($language = $project->getLanguage()) && !isset($relations[$language->getCode()])) {
				$relations[$language->getCode()] = [
					'language' => $language,
					'project' => $project,
				];
			}
		}

		return $relations;
	}
}
