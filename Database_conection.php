<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database conection</title>
</head>

<body>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'mktime');

    if (!$link) {

        # Otherwise fail gracefully and explain the error. 

        die('Could not connect to MySQL: ');
    }



    ?>

</body>

</html>