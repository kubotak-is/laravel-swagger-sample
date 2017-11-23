<?php
declare(strict_types=1);

namespace App\DataAccess\Stub;

use App\Domain\Criteria\GameSoftwareCriteria;

/**
 * Class GameSoftwareSource
 * @package App\DataAccess\Stub
 */
class GameSoftwareSource implements GameSoftwareCriteria
{
    /**
     * @inheritdoc
     */
    public function getReleaseThisWeek(int $limit, int $offset): array
    {
        $jsonData = file_get_contents(__DIR__ . "/release_this_week.json");
        return json_decode($jsonData, true);
    }
}
