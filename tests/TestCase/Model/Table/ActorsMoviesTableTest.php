<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActorsMoviesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActorsMoviesTable Test Case
 */
class ActorsMoviesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ActorsMoviesTable
     */
    protected $ActorsMovies;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ActorsMovies',
        'app.Actors',
        'app.Movies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ActorsMovies') ? [] : ['className' => ActorsMoviesTable::class];
        $this->ActorsMovies = $this->getTableLocator()->get('ActorsMovies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ActorsMovies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ActorsMoviesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ActorsMoviesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
