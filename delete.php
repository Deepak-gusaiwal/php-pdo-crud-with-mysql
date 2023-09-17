<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>delete Record in php</title>

    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php require "./includes/header.php"; ?>
    <?php
    require_once "./includes/dbConnect.php";
    if (isset($_GET['delete']) && isset($_GET['id'])) {
        $id = $_GET['id'];

        try {
            $sql = "DELETE  FROM users WHERE id = :id";
            $query = $pdo->prepare($sql);
            $query->bindParam(":id", $id);
            $query->execute();
            $rowCount = $query->rowCount(); // it returns true and false when data is deleted or not
            if (!$rowCount) {
                echo "<script>alert('something went wrong')</script>";
                sendBack();
            }
            header("Location: success.php");
            exit();
        } catch (PDOException $e) {
            echo "error while deleting data" . $e->getMessage();
        }
    } else {
        sendBack();
    }

    ?>

    <h1>delete Record in php</h1>

</body>

</html>