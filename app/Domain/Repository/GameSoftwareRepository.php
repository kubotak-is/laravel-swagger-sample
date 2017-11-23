<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\GameSoftware;
use App\Domain\Criteria\GameSoftwareCriteria;
use App\Domain\Collection\GameSoftwareCollection;
use PHPMentors\DomainKata\Entity\EntityInterface;
use PHPMentors\DomainKata\Entity\CriteriaInterface;
use Zend\Hydrator\NamingStrategy\MapNamingStrategy;
use PHPMentors\DomainKata\Repository\RepositoryInterface;
use Zend\Hydrator\NamingStrategy\CompositeNamingStrategy;
use PHPMentors\DomainKata\Repository\Operation\CriteriaBuilderInterface;
use Zend\Hydrator\Reflection as ReflectionHydrator;

/**
 * Class GameSoftwareRepository
 * @package App\Domain\Repository
 */
class GameSoftwareRepository implements RepositoryInterface
{
    /**
     * @var GameSoftwareCriteria|CriteriaInterface
     */
    protected $criteria;
    
    /**
     * @param CriteriaBuilderInterface $criteriaBuilder
     */
    public function criteria(CriteriaBuilderInterface $criteriaBuilder)
    {
        $this->criteria = $criteriaBuilder->build();
    }
    
    /**
     * @inheritdoc
     */
    public function add(EntityInterface $entity)
    {
        // TODO: Implement add() method.
    }
    
    /**
     * @inheritdoc
     */
    public function remove(EntityInterface $entity)
    {
        // TODO: Implement remove() method.
    }
    
    /**
     * @param int $limit
     * @param int $offset
     * @return GameSoftwareCollection
     */
    public function findReleaseThisWeek(int $limit, int $offset): GameSoftwareCollection
    {
        $data = $this->criteria->getReleaseThisWeek($limit, $offset);
        $collection = new GameSoftwareCollection();
        foreach ($data as $item) {
            $hydrator = new ReflectionHydrator();
            $namingStrategy = new CompositeNamingStrategy([
                'release_date'         => new MapNamingStrategy(['release_date' => 'releaseDate']),
                'retail_price_desired' => new MapNamingStrategy(['retail_price_desired' => 'retailPriceDesired']),
            ]);
            $hydrator->setNamingStrategy($namingStrategy);
            /** @var GameSoftware $gameSoft */
            $gameSoft = $hydrator->hydrate(
                $item,
                new GameSoftware()
            );
            $collection->add($gameSoft);
        }
        return $collection;
    }
}
