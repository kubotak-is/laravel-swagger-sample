<?php
declare(strict_types=1);

namespace App\Http\Responder;

use Hateoas\Hateoas;
use Hateoas\HateoasBuilder;
use Illuminate\Http\Response;
use Hateoas\UrlGenerator\CallableUrlGenerator;

/**
 * Trait HateoasResponder
 * @package App\Http\Responder
 */
trait HateoasResponder
{
    /** @var string[] */
    protected $headers = [
        'Content-Type' => 'application/hal+json',
    ];
    
    /** @var string */
    protected $serialization = 'json';
    
    /**
     * @param HateoasResource $resource
     * @param int             $status
     * @param array           $headers
     *
     * @return \Illuminate\Http\Response
     */
    protected function hal(HateoasResource $resource, int $status = 200, array $headers = []): Response
    {
        return new Response(
            $this->builder()->serialize($resource, $this->serialization),
            $status,
            array_merge($this->headers, $headers)
        );
    }
    
    /**
     * @return Hateoas
     */
    protected function builder(): Hateoas
    {
        return HateoasBuilder::create()
            ->setUrlGenerator(
                null,
                new CallableUrlGenerator(function ($route, array $parameters) {
                    return route($route, $parameters);
                })
            )
            ->build();
    }
}
