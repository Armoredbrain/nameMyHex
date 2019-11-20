<?php
//CONNECTION
require_once 'connec.php';
$pdo = new \PDO(DSN,USER,PASS);

//DISPLAY
$query = "SELECT * FROM colors";
$statement = $pdo->query($query);
$colors = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Name my HEX</title>
</head>
<header>
    <?php include 'navbar.php'?>
</header>
<body>

    <div class="container-fluid">
        <div class="row">

            <?php foreach ($colors as $color) {?>
                <div class="col-3">
                    <div class="card">
                        <div style="background-color: <?= $color['hexCode']; ?>; height: 300px;" class="card-img-top" alt="..."><a href="edit.php?id=<?=$color['id']?>" style="display:block;width:100%;height:100%;"></a></div>
                            <div class="card-body">
                                <h5 class="card-text"><?= $color['hexName']; ?></h5>
                                <p class="card-title">Hex color code : <?= $color['hexCode']; ?></p>
                            </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
