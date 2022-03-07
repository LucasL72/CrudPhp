<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Titre de la Page -->
    <title>test PhP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/81855dfb83.js" crossorigin="anonymous"></script>
    <!-- Style Css -->
    <link rel="stylesheet" href="public/css/style.css" />

</head>
<!-- / Head -->

<body>

    <?php include 'views/navbar.php' ?>

    <?php
    // import de la connexion Connexion à la DB
    include 'db/database.php';
    // Appel de la class Database et de ça fontion connect()
    $pdo = Database::connect();
    ?>

    <!-- Emplacement sous la navbar -->
    <div style='width: 7vh'></div>

    <!-- Collapse -->
    <div class="container mt-5 pt-4">
        <div class="accordion" id="accordionExample">

            <!-- Table Gestion des Articles -->
            <?php include 'views/admin/tableArticle.php' ?>

        </div>
    </div>
    <!-- / Collapse -->

    <?php
    // Appel de la class Database et de ça fontion connect()
    Database::disconnect();
    ?>

    <!-- Footer -->
    <?php include 'views/footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>