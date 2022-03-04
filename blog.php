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
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/81855dfb83.js" crossorigin="anonymous"></script>
    <!-- Style Css -->
    <link rel="stylesheet" href="public/css/style.css" />
</head>
<!-- / Head -->

<body>
    <!-- NavBar -->
    <?php include 'views/navbar.php' ?>

    <!-- List de card (Article) -->
    <?php include 'views/cardList.php' ?>

    <!-- Footer -->
    <?php include 'views/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>