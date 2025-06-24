<h1>Actors and Their Movies</h1>

<!-- Filter Form -->
<?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('filter', [
        'label' => 'Filter by Actor Name', 
        'value' => $filter ?? '',
        'placeholder' => 'Start typing an actor’s name...',
    ]) ?>
    <?= $this->Form->button('Search') ?>
<?= $this->Form->end() ?>

<!-- List of actors and their movies -->
<ul>
    <?php foreach ($actors as $actor): ?>
    <li>
        <strong><?= h($actor->name) ?></strong>
        <ul>
            <?php foreach ($actor->movies as $movie): ?>
                <li><?= h($movie->title) ?></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <?php endforeach; ?>
</ul>

<?php if ($actors->isEmpty()): ?>
    <p>No actors found matching your filter.</p>
<?php endif; ?>