<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Демо Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center">Добавление статьи</h1>
    <div class="col-md-6 mx-auto">
        <form action="/addArticle" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="Заголовок">
            </div>
            <div class="mb-3">
                <textarea name="contentField" class="form-control" placeholder="Контент"></textarea>
            </div>
            <div class="mb-3">
                <input type="text" name="author" class="form-control" placeholder="Автор">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Добавить статью">
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
