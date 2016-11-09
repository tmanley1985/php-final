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
    
    <?php if (isset($data['errors'])): ?>
        <div class="errors flex-centered flex-column">
            <?php foreach ($data['errors'] as $error): ?>
                <div class="error"><?=$error?></div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <h1>Create A New Todo</h1>

    <div class="container">
        <form action="/todo/store" method="POST">
            
            <input type="text" name="title" placeholder="New Todo">
            <button type="submit">Submit</button>
        </form>
    </div>    
       
    </body>
</html>