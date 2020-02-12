<?php
    $todo = $data['todo'] ?? null;
?>

<h2>Add new Task</h2>

<form action="/todo/store" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputName">Your Name</label>
        <input required value="<?= form_val($todo, 'author') ?>" name="author" type="text" class="form-control" id="inputName">
        <?= form_err('author') ?>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input required value="<?= form_val($todo, 'email') ?>" name="email" type="email" class="form-control" id="inputEmail">
        <?= form_err('email') ?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputTask">Task description</label>
    <textarea required name="title" class="form-control" id="inputTask"><?= form_val($todo, 'title') ?></textarea>
    <?= form_err('title') ?>
  </div>
  <div class="text-right">
    <button type="submit" class="btn btn-success">Add</button>
  </div>
</form>