<?php
declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Collection\GameSoftwareCollection;
use App\Domain\Repository\GameSoftwareRepository;
use App\Domain\Specification\GameSoftwareSpecification;
use PHPMentors\DomainKata\Service\ServiceInterface;

/**
 * Class ThisWeeksGameSoftwareRelease
 * @package App\Domain\Service
 */
class ThisWeeksGameSoftwareRelease implements ServiceInterface
{
    /** @var GameSoftwareRepository  */
    protected $repository;
    
    /** @var GameSoftwareSpecification  */
    protected $specification;
    
    /**
     * GameSoftReleaseThisWeek constructor.
     * @param GameSoftwareRepository    $repository
     * @param GameSoftwareSpecification $softSpecification
     */
    public function __construct(GameSoftwareRepository $repository, GameSoftwareSpecification $softSpecification)
    {
        $this->repository    = $repository;
        $this->specification = $softSpecification;
    }
    
    /**
     * @param int $limit
     * @param int $offset
     * @return GameSoftwareCollection
     */
    public function getCollection(int $limit = 3, int $offset = 0): GameSoftwareCollection
    {
        return $this->specification->findReleaseThisWeek($this->repository, $limit, $offset);
    }
}
