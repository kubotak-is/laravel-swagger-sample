<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use Hateoas\Configuration\Annotation as Hateoas;
use App\Http\Responder\HateoasResource;
use JMS\Serializer\Annotation\{Accessor, Type};
use PHPMentors\DomainKata\Entity\EntityInterface;

/**
 * Class GameSoftware
 * @package App\Domain\Entity
 * @Hateoas\Relation(
 *     "self",
 *     href = "expr('/api/game_software/' ~ object.getId())"
 * )
 * @Hateoas\Relation(
 *     "page",
 *     href = "expr('/game_software/' ~ object.getId())"
 * )
 * @SWG\Definition(
 *   type="object",
 *   @SWG\Xml(name="GameSoftware")
 * )
 */
class GameSoftware implements EntityInterface, HateoasResource
{
    /**
     * @var  int
     * @SWG\Property(format="int64")
     */
    protected $id;
    
    /**
     * @var  string
     * @SWG\Property()
     */
    protected $title;
    
    /**
     * @var  string
     * @SWG\Property()
     */
    protected $description;
    
    /**
     * @var  string
     * @Accessor("getReleaseDate")
     * @SWG\Property()
     */
    protected $releaseDate;
    
    /**
     * @var  int
     * @Type("int")
     * @SWG\Property(format="int64")
     */
    protected $price;
    
    /**
     * @var  int
     * @Type("int")
     */
    protected $retailPriceDesired;
    
    /**
     * @var  string
     * @SWG\Property()
     */
    protected $platform;
    
    /**
     * @var  string
     * @SWG\Property()
     */
    protected $thumbnail;
    
    /**
     * @SWG\Property(
     *     property="_links",
     *     type="object",
     *     @SWG\Property(
     *         property="self",
     *         type="object",
     *         @SWG\Property(
     *             property="href",
     *             type="string"
     *         )
     *     ),
     *     @SWG\Property(
     *         property="page",
     *         type="object",
     *         @SWG\Property(
     *             property="href",
     *             type="string"
     *         )
     *     )
     * )
     */
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getReleaseDate(string $format = "Y-m-d H:i:s"): string
    {
        return (new \DateTime($this->releaseDate))->format($format);
    }
    
}
