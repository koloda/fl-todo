<h2>
    Tasks <i>(<?= $data['total'] ?>)</i>
</h2>

<table class="table table-borderless">
    <thead>
        <tr>
            <th>
            <a href="<?= url('/todo', [], ['offset' => input('offset'), 'sort' => $data['sortings']['author']]) ?>">
                Author

                <span style="float: right">
                    <?php if (input('sort') === 'author'): ?>
                        ↑
                    <?php elseif (input('sort') === 'author DESC'): ?>
                        ↓
                    <?php endif; ?>
                </span>
            </a>
            </th>
            <th>
            <a href="<?= url('/todo', [], ['offset' => input('offset'), 'sort' => $data['sortings']['email']]) ?>">
                Email

                <span style="float: right">
                    <?php if (input('sort') === 'email'): ?>
                        ↑
                    <?php elseif (input('sort') === 'email DESC'): ?>
                        ↓
                    <?php endif; ?>
                </span>
            </a>
            </th>
            <th>
            Text
            </th>
            <th>
            <a href="<?= url('/todo', [], ['offset' => input('offset'), 'sort' => $data['sortings']['done']]) ?>">
                Status

                <span style="float: right">
                    <?php if (input('sort') === 'done'): ?>
                        ↑
                    <?php elseif (input('sort') === 'done DESC'): ?>
                        ↓
                    <?php endif; ?>
                </span>
            </a>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data['todos'] as $todo): ?>
        <tr>
            <td>
                <i><?= $todo->author ?></i>
            </td>
            <td>
                <b><?= $todo->email ?></b>
            </td>
            <td><?= $todo->title ?></td>
            <td>
                <?php if ($todo->done): ?>
                    <div class="badge badge-success">Done</div>
                <?php else: ?>
                    <div class="badge badge-warning">In progress</div>
                <?php endif; ?>

                <?php if ($todo->updated): ?>
                    <div class="badge badge-primary">Updated</div>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="row">
    <div class="col-md-6">
        <?php if ($data['prev'] !== false): ?>
        <a href="<?= url('/todo', [], ['offset' => $data['prev'], 'sort' => input('sort')]) ?>" class="btn btn-outline-primary">
            Prev page
        </a>
        <?php endif; ?>
    </div>
    <div class="col-md-6 text-right">
        <?php if ($data['next'] !== false): ?>
            <a href="<?= url('/todo', [], ['offset' => $data['next'], 'sort' => input('sort')]) ?>" class="btn btn-outline-primary">
                Next page
            </a>
        <?php endif; ?>
    </div>
</div>


<div class="col text-center">
    <hr>
    <br>
    <a href="<?= url('/todo/create') ?>" class="btn btn-outline-success">
        + Add Task
    </a>
</div>