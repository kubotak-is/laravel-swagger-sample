<?php
declare(strict_types=1);

namespace App\Domain\Criteria;

use PHPMentors\DomainKata\Entity\CriteriaInterface;

/**
 * Interface GameSoftwareCriteria
 * @package App\Domain\Criteria
 */
interface GameSoftwareCriteria extends CriteriaInterface
{
    /**
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function getReleaseThisWeek(int $limit, int $offset): array;
}
