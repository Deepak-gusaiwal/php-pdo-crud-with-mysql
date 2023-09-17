<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>update Record in php</title>

    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php require "./includes/header.php"; ?>
    <?php
    require_once "./includes/dbConnect.php";
    if (isset($_GET['update']) && isset($_GET['id'])) {
        $id = $_GET['id'];

        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $query = $pdo->prepare($sql);
            $query->bindParam(":id", $id, PDO::PARAM_INT); //PDO::PARAM_INT you can ignore this it is to ensure that the id is an integer
            $query->execute();
            $record = $query->fetchObject();
            if (!$record) {
                echo "<script>alert('something went wrong')</script>";
                sendBack();
            }
        } catch (PDOException $e) {
            echo "error while fetchin data" . $e->getMessage();
        }
    } else {
        sendBack();
    }

    ?>

    <h1>update Record in php</h1>
    <form action="./includes/updateRecord.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $record->id; ?>">
        <input value="<?php echo $record->name ?>" type="text" name="name" placeholder="name" id="">
        <input value="<?php echo $record->email ?>" type="email" name="email" placeholder="email" id="">
        <input value="<?php echo $record->password ?>" type="password" name="password" placeholder="password" id="">
        <button type="submit" name="submit">submit</button>
    </form>
</body>

</html>