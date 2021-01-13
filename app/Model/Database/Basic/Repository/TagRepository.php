<?php declare(strict_types = 1);

namespace App\Model\Database\Basic\Repository;

use App\Model\Database\Basic\Entity\Tag;
use App\Model\Database\Repository\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;

/**
 * Custom TagRepository
 */
final class TagRepository extends EntityRepository
{

	/**
	 * @param int[] $ids
	 * @return ArrayCollection|Collection<int, Tag>
	 */
	public function findTagsByIds(array $ids): Collection
	{
		$criteria = Criteria::create()
			->where(Criteria::expr()->in('id', $ids))
			->orderBy(['title' => 'ASC']);

		return $this->matching($criteria);
	}

}
