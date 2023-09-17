<?php require "./header.php"; ?>
<h1>Form Handler File</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            $sql = "INSERT INTO users (name, email,password) VALUES (:name,:email,:password)";
            $query = $pdo->prepare($sql);
            $query->bindParam(":name", $name);
            $query->bindParam(":email", $email);
            $query->bindParam(":password", $password);

            $query->execute();
            $pdo = null;
            $query = null;
            header("Location: ../success.php");
        }
    } catch (PDOException $e) {
        die("Querry Failed: " . $e->getMessage());
    }

} else {
    sendBack();
}
?>