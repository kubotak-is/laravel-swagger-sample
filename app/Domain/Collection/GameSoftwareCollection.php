<?php
declare(strict_types=1);

namespace App\Domain\Collection;

use App\Domain\Entity\GameSoftware;
use App\Http\Responder\HateoasResource;
use JMS\Serializer\Annotation\SerializedName;
use PHPMentors\DomainKata\Entity\EntityInterface;
use PHPMentors\DomainKata\Entity\EntityCollectionInterface;

/**
 * Class GameSoftwareCollection
 * @package App\Domain\Collection
 * @SWG\Definition(
 *   type="object",
 *   @SWG\Xml(name="GameSoftwareCollection")
 * )
 */
class GameSoftwareCollection implements EntityCollectionInterface, HateoasResource
{
    /**
     * @var GameSoftware[]
     * @SerializedName("game_software")
     * @SWG\Property(
     *     property="game_software",
     *     @SWG\Xml(name="GameSoftware", wrapped=true)
     * )
     */
    protected $entities = [];
    
    /**
     * @inheritdoc
     */
    public function add(EntityInterface $entity)
    {
        if (!$entity instanceof GameSoftware) {
            throw new \InvalidArgumentException("Entity Mismatch");
        }
        $this->entities[$entity->getId()] = $entity;
    }
    
    /**
     * @inheritdoc
     */
    public function get($key)
    {
        if (isset($this->entities[$key])) {
            return $this->entities[$key];
        }
        return null;
    }
    
    /**
     * @inheritdoc
     * @param EntityInterface|GameSoftware $entity
     */
    public function remove(EntityInterface $entity)
    {
        if (isset($this->entities[$entity->getId()])) {
            unset($this->entities[$entity->getId()]);
        }
    }
    
    /**
     * @inheritdoc
     */
    public function count(): int
    {
        return count($this->entities);
    }
    
    /**
     * @inheritdoc
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->entities);
    }
    
    /**
     * @inheritdoc
     */
    public function toArray(): array
    {
        return $this->entities;
    }
}
