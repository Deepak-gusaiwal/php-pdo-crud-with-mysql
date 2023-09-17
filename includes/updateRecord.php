<?php require "./header.php"; ?>
<h1>Update Record File</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // connecting to the server
        require_once "./dbConnect.php";
        if (empty($name) || empty($email) || empty($password)) {
            echo "<script>
            alert('provide valid data');
            </script>";
            sendBack();
        } else {
            $sql = "UPDATE users SET name=:name,email=:email,password=:password where id=:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(":name", $name);
            $query->bindParam(":email", $email);
            $query->bindParam(":password", $password);
            $query->bindParam(":id", $id);

            $query->execute();
            $pdo = null;
            $query = null;
            header('Location: ../success.php');
            die();
        }
    } catch (PDOException $e) {
        die("Querry Failed: " . $e->getMessage());
    }

} else {
    sendBack();
}
?>