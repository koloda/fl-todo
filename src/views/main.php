<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="/assets/index.css">
</head>
<body>
    <header>
        <div class="row">
            <div class="col-md-6">
                <h1>Todo App</h1>
            </div>
            <div class="col-md-6 text-right">
                <a href="/login">Sign in as Administrator</a>
            </div>
        </div>
    </header>

    <div id="content" class="container">
        <div class="col-md-6 col-md-offset-3">
        <?php
            require $viewFile;
        ?>
        </div>
    </div>
</body>
</html>