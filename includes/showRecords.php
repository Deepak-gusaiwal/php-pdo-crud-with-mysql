<?php
include_once "./includes/dbConnect.php";
$sql = "SELECT id,name,email,DT from users";

try {
    $query = $pdo->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "failed to show data" . $e->getMessage();
}
?>

<div class="gridContainer">
    <?php if (count($results) > 0): ?>
        <?php foreach($results as $data): ?>
        <div class="gridBox">
            <h4>Name:<?php echo $data->name ?></h4>
            <h4>Email:<?php echo $data->email ?></h4>
            <p>Time: <?php echo $data->DT ?></p>
            <div class="actionBox">
                <a href="update.php?update=true&id=<?php echo $data->id ?>" class="commonbtn">update</a>
                <a href="delete.php?delete=true&id=<?php echo $data->id ?>" class="commonbtn">delete</a>
            </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>