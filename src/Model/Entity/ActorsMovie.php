<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActorsMovie Entity
 *
 * @property int $id
 * @property int $actor_id
 * @property int $movie_id
 *
 * @property \App\Model\Entity\Actor $actor
 * @property \App\Model\Entity\Movie $movie
 */
class ActorsMovie extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'actor_id' => true,
        'movie_id' => true,
        'actor' => true,
        'movie' => true,
    ];
}
