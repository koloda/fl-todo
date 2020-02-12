<?php
    $todo = $data['todo'] ?? null;
    $action = '/todo/store/';
    $action .= $todo->id ?? '';
?>

<h2><?= $data['title'] ?></h2>

<form action="<?= $action ?>" method="POST">
    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputName">Your Name</label>
        <input <?php if (IS_ADMIN && $todo): ?> readonly <?php endif; ?> required value="<?= form_val($todo, 'author') ?>" name="author" type="text" class="form-control" id="inputName">
        <?= form_err('author') ?>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input <?php if (IS_ADMIN && $todo): ?> readonly <?php endif; ?> required value="<?= form_val($todo, 'email') ?>" name="email" type="email" class="form-control" id="inputEmail">
        <?= form_err('email') ?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputTask">Task description</label>
    <textarea required name="title" class="form-control" id="inputTask"><?= form_val($todo, 'title') ?></textarea>
    <?= form_err('title') ?>
  </div>

  <?php if (IS_ADMIN): ?>
  <div class="form-group form-check">
        <input <?php if ($todo && $todo->done):?> checked <?php endif; ?> name="done" id="inputDone" value="1" type="checkbox" class="form-check-input">
        <label for="inputDone">Task is completed</label>
  </div>
  <?php endif; ?>

  <div class="text-right">
    <button type="submit" class="btn btn-success">Save</button>
  </div>
</form>