<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActorsMoviesFixture
 */
class ActorsMoviesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'actor_id' => 1,
                'movie_id' => 1,
            ],
        ];
        parent::init();
    }
}
