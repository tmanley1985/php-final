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