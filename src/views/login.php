<div class="row justify-content-md-center">
    <form class="form-signin col-md-4" method="POST" action="/auth/login">
        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
        <h1 class="h3 mb-3 font-weight-normal">Sign in as Administrator</h1>
        <label for="inputUsename" class="sr-only">Username</label>
        <input value="<?= form_val(null, 'username') ?>" name="usename" type="text" id="inputUsename" class="form-control"  required="" autofocus="">
        <?= form_err('username') ?>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
    </form>
</div>