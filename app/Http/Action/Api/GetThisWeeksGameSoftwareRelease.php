<?php
declare(strict_types=1);

namespace App\Http\Action\Api;

use App\Domain\Service\ThisWeeksGameSoftwareRelease;
use App\Http\Request\Api\GetThisWeeksGameSoftwareReleaseRequest as Request;
use App\Http\Responder\Api\GetThisWeeksGameSoftwareReleaseResponder as Responder;

/**
 * Class GetThisWeeksGameSoftwareRelease
 * @package App\Http\Action\Api
 * @SWG\Get(
 *     path="/game_software/release/week",
 *     summary="今週発売のゲームソフト",
 *     description="",
 *     consumes={"application/json"},
 *     produces={"application/hal+json"},
 *     @SWG\Parameter(ref="#/parameters/GetThisWeeksGameSoftwareReleaseRequest_limit"),
 *     @SWG\Parameter(ref="#/parameters/GetThisWeeksGameSoftwareReleaseRequest_offset"),
 *     @SWG\Response(response="default", ref="#/responses/GetThisWeeksGameSoftwareReleaseResponder")
 * )
 */
final class GetThisWeeksGameSoftwareRelease
{
    /** @var ThisWeeksGameSoftwareRelease  */
    private $service;
    
    /**
     * GetThisWeeksGameSoftwareRelease constructor.
     * @param ThisWeeksGameSoftwareRelease $service
     */
    public function __construct(ThisWeeksGameSoftwareRelease $service)
    {
        $this->service = $service;
    }
    
    /**
     * @return Responder
     */
    public function __invoke(Request $request): Responder
    {
        $validated = $request->validated();
        $limit  = $validated['limit'] ?? 3;
        $offset = $validated['offset'] ?? 0;
        
        $collection = $this->service->getCollection((int) $limit, (int) $offset);
        return new Responder($collection);
    }
}
