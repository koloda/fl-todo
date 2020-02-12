<?php if (isset($_SESSION['flash']) && isset($_SESSION['flash']['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['flash']['success'] ?></div>
<?php endif; ?>

<?php
    unset($_SESSION['flash']['success']);
?>


