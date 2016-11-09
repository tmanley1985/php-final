<!doctype html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    </head>
    <body class="flex-centered flex-column">
     
    <header class="flex-centered">
        <nav>
            <a href="/">Home</a>
            <a href="/todo/index">Index</a>
        </nav>
    </header>
    
    <h1>TodoApp</h1>

    <a class="create" href="/todo/create">Create New Todo</a>

    <div class="container">

        <?php if (isset($data)): ?>


            <?php foreach ($data as $todo): ?>

                <div class="todo" class="flex-centered flex-column">

                    <a class="item" href="/todo/show/<?= $todo['id'];?>">
                        <?=$todo['title']; ?>
                    </a>
                    <a class="delete" href="/todo/destroy/<?= $todo['id'];?>">Delete</a>
                    <a class="edit" href="/todo/edit/<?= $todo['id'];?>">Edit</a>
                </div>
               
            <?php endforeach ?>
        <?php endif ?>
    </div>    
       
    </body>
</html>