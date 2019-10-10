<?php

require_once 'connec.php';
require 'HEXgenerator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isValid = true;
    if(!isset($_POST['hexCode']) || empty($_POST['hexCode'])) {
        $isValid = false;
    } elseif (!preg_match("/^([\-a-fA-F0-9#' ]+)$/", $_POST['hexCode']) || (strlen($_POST['hexCode']) > 15)) {
        $isValid = false;
    }
    if(!isset($_POST['hexName']) || empty($_POST['hexName'])) {
        $nameError='*Enter a name';
        $isValid = false;
    } elseif (!preg_match("/^([\-a-zA-Z0-9' ]+)$/", $_POST['hexName']) || (strlen($_POST['hexName']) > 50)) {
        $nameError='*Use only characters';
        $isValid = false;
    }



    if ($isValid) {
        //$hexName = str_replace(' ','',$_POST['hexName']);
        $pdo = new \PDO(DSN,USER,PASS);
        $query = "INSERT INTO colors (hexCode, hexName) VALUES (:hexCode,:hexName)";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':hexCode', $_POST['hexCode'], \PDO::PARAM_STR);
        $statement->bindValue(':hexName', strtolower($_POST['hexName']), \PDO::PARAM_STR);
        $statement->execute();
        header("location:create.php");
    }

}
$hexCode = random_color();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>create HEX name</title>
</head>
<header>
    <?php include 'navbar.php'?>
</header>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div style="background-color: <?= $hexCode; ?>; height: 500px;" class="card-img-top" alt="..."></div>
                        <div class="card-body">
                            <h5 class="card-title">Hexadecimal color code : <?= $hexCode; ?></h5>

                            <form method="POST">
                                <input type="text" name="hexCode" value="<?= $hexCode ?>" hidden >
                                <div class="form-group">
                                    <label for="hexName">Name HEX</label>
                                    <input type="text" class="form-control" id="hexName" name="hexName" placeholder="<?= isset($nameError) ? $nameError : "Enter color name"; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
