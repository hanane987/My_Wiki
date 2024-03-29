<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-rRE6e5Us5foXpDMm1lG2LJkA5l9bkhgAiW8Xt+m8mocGCmiBhFzivvX+mwEKXbLa" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\style.css">
    <link type="text/css" rel="stylesheet" href="View/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <title>Mywiki</title>
</head>

<body>
    <?php 
   
    require_once 'view/header.php'; 
   
    echo $content;
    include_once 'view/footer.php'; 
    ?>
</body>

</html>