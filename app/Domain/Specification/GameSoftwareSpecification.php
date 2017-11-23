<?php
declare(strict_types=1);

namespace App\Domain\Specification;

use App\Domain\Entity\GameSoftware;
use App\Domain\Criteria\GameSoftwareCriteria;
use App\Domain\Repository\GameSoftwareRepository;
use PHPMentors\DomainKata\Entity\EntityInterface;
use PHPMentors\DomainKata\Entity\CriteriaInterface;
use PHPMentors\DomainKata\Specification\SpecificationInterface;
use PHPMentors\DomainKata\Repository\Operation\CriteriaBuilderInterface;

/**
 * Class GameSoftwareSpecification
 * @package App\Domain\Specification
 */
class GameSoftwareSpecification implements SpecificationInterface, CriteriaBuilderInterface
{
    /** @var GameSoftwareCriteria  */
    protected $criteria;
    
    /**
     * GameSoftSpecification constructor.
     * @param GameSoftwareCriteria $criteria
     */
    public function __construct(GameSoftwareCriteria $criteria)
    {
        $this->criteria = $criteria;
    }
    
    /**
     * @return GameSoftwareCriteria|CriteriaInterface
     */
    public function build()
    {
        return $this->criteria;
    }
    
    /**
     * @param EntityInterface|GameSoftware $entity
     */
    public function isSatisfiedBy(EntityInterface $entity)
    {
        // TODO: Implement isSatisfiedBy() method.
    }
    
    /**
     * @param GameSoftwareRepository $repository
     * @param int                    $limit
     * @param int                    $offset
     * @return \App\Domain\Collection\GameSoftwareCollection
     */
    public function findReleaseThisWeek(GameSoftwareRepository $repository, $limit, $offset)
    {
        $repository->criteria($this);
        return $repository->findReleaseThisWeek($limit, $offset);
    }
}
