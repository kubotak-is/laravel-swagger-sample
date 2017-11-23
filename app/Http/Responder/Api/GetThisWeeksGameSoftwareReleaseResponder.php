<?php
declare(strict_types=1);

namespace App\Http\Responder\Api;

use App\Http\Responder\HateoasResource;
use App\Http\Responder\HateoasResponder;
use Illuminate\Contracts\Support\Responsable;
use App\Domain\Collection\GameSoftwareCollection;

/**
 * Class GetGameSoftReleaseThisWeekResponder
 * @package App\Http\Responder\Api
 */
class GetThisWeeksGameSoftwareReleaseResponder implements Responsable
{
    use HateoasResponder;
    
    /** @var GameSoftwareCollection|HateoasResource  */
    private $resource;
    
    /**
     * GetThisWeeksGameSoftwareReleaseResponder constructor.
     * @param GameSoftwareCollection $collection
     */
    public function __construct(GameSoftwareCollection $collection)
    {
        $this->resource = $collection;
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @SWG\Response(
     *   response="GetThisWeeksGameSoftwareReleaseResponder",
     *   description="今週発売のゲームを返す",
     *   @SWG\Schema(ref="#/definitions/GameSoftwareCollection")
     * )
     */
    public function toResponse($request): \Illuminate\Http\Response
    {
        return $this->hal($this->resource);
    }
}
