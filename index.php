<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>Crud in php</title>
    
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
   <?php require "./includes/header.php"; ?>
    <h1>Crud in php</h1>
    <form action="./includes/insertRecords.php" method="POST">
        <input type="text" name="name" placeholder="name" id="">
        <input type="email" name="email" placeholder="email" id="">
        <input type="password" name="password" placeholder="password" id="">
        <button type="submit" name="submit">submit</button>
    </form>
    <?php require "./includes/showRecords.php"; ?>

  
</body>
</html>