<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style>
        body>div{
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }
    </style>
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <div class="col-md-6">
                <a href="/" class="navbar-brand">
                    Todo App
                </a>
            </div>
            <div class="col-md-6 text-right">
                <?php if (IS_ADMIN): ?>
                    You are logged in as Administrator
                    <a class="btn btn-outline-primary" href="/auth/logout">Logout</a>
                <?php else: ?>
                    <a class="btn btn-outline-primary" href="/auth/login">Sign in as Administrator</a>
                <?php endif; ?>
            </div>
    </header>

    <article id="content" class="container">
    <?php
        require '_alerts.php';
        require $viewFile;
    ?>
    </article>
</body>
</html>