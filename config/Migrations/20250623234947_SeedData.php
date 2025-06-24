<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class SeedData extends BaseMigration
{
    /**
     * up Method.
     * @return void
     */
    public function up():void
    {
        $this->table('actors')->insert([
            ['name' => 'Actor 1'],
            ['name' => 'Actor 2'],
            ['name' => 'Actor 3'],
            ['name' => 'Actor 4'],
            ['name' => 'Actor 5'],
        ])->saveData();

        $this->table('movies')->insert([
            ['title' => 'Movie A'],
            ['title' => 'Movie B'],
            ['title' => 'Movie C'],
            ['title' => 'Movie D'],
            ['title' => 'Movie E'],
            ['title' => 'Movie F'],
            ['title' => 'Movie G'],
            ['title' => 'Movie H'],
            ['title' => 'Movie I'],
            ['title' => 'Movie J'],
        ])->saveData();
    }
}
