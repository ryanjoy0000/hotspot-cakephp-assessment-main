<h1>Search people on TMDb </h1>

<!-- Filter Form -->
<?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('q', [
        'label' => 'Person Name', 
        'value' => $query ?? '',
        'placeholder' => 'Enter a name...',
    ]) ?>
    <?= $this->Form->button('Search') ?>
<?= $this->Form->end() ?>

<?php if ($results !== []): ?>
  <h2>Results for <?= h($query ?? '')?></h2>
  <!-- List of people in TMDb -->
  <ul>
      <?php foreach ($results as $person): ?>
      <li>
          <strong><?= h($person['name']) ?></strong>
          <?php if (!empty($person['profile_path'])): ?>
            <img src="https://image.tmdb.org/t/p/w92<?= h($person['profile_path']) ?>" alt="<?= h($person['name']) ?>">
          <?php endif; ?>
          <br>Popularity: <?= h($person['popularity']) ?>
      </li>
      <?php endforeach; ?>
  </ul>
<?php elseif (!empty($query)): ?>
    <p>No one found in TMDb matching your query.</p>
<?php endif; ?>