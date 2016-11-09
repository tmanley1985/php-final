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
        <h1>Edit</h1>
    </header>

    <div class="container">
        <form action="/todo/update" method="POST">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <input type="text" name="title" value="<?=$data['title']; ?>">
            <button type="submit">Submit</button>
        </form>
    </div>    
       
    </body>
</html>