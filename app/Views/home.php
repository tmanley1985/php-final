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
        <h1>TodoApp</h1>
    </header>

    <div class="container">

        <?php if(isset($data)): ?>

            <?php foreach($data as $todo) ?>

                <div><?=$todo['title']; ?></div>
            <? endforeach ?>
        <?php endif ?>
    </div>    
       
    </body>
</html>