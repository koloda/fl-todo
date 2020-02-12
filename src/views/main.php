<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="/assets/index.css">
</head>
<body>
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <div class="col-md-6">
                <a href="/" class="navbar-brand">
                    Todo App
                </a>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-outline-primary" href="/login">Sign in as Administrator</a>
            </div>
    </header>

    <div id="content" class="container">
    <?php
        require '_alerts.php';
        require $viewFile;
    ?>
    </div>
</body>
</html>