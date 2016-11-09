<!doctype html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
     
    <header>
        <nav>
            <a href="/">Home</a>
            <a href="/todo/index">Index</a>
        </nav>
        <h1>TodoApp</h1>
    </header>

    <a href="/todo/create">Create New Todo</a>

    <div class="container" style="display:flex;justify-content:center;align-items:center;flex-direction:column;">

        <?php if(isset($data)): ?>


            <?php foreach($data as $todo): ?>

                <div class="todo" style="display:flex;justify-content:center;align-items:center;">

                    <a href="/todo/show/<?= $todo['id'];?>">
                        <?=$todo['title']; ?>
                    </a>
                    <a href="/todo/destroy/<?= $todo['id'];?>">Delete</a>
                    <a href="/todo/edit/<?= $todo['id'];?>">Edit</a>
                </div>
               
            <?php endforeach ?>
        <?php endif ?>
    </div>    
       
    </body>
</html>