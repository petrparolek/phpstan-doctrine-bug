<?php declare(strict_types = 1);

namespace App\Model\Database\Basic\Entity;

use App\Model\Database\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Nettrine\ORM\Entity\Attributes\Id;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Basic\Repository\TagRepository")
 */
class Tag extends Entity
{

	use Id;

	/** @ORM\Column(type="string") */
	private string $title;

	/**
	 * @var Collection<int, Book>
	 * @ORM\ManyToMany(targetEntity="Book", inversedBy="tags")
	 */
	private Collection $books;

	/**
	 * Tag constructor
	 */
	public function __construct()
	{
		$this->books = new ArrayCollection();
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return Collection<int, Book>
	 */
	public function getBooks(): Collection
	{
		return $this->books;
	}

}
