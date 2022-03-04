<!-- Liste de card -->
<div class="container pb-4">
    <div class="col-md-12 text-center">
        <h4>Les derniers articles</h4>
    </div>
    <div class='row'>

        <?php
        // import de la connexion Connexion à la DB
        include 'db/database.php';
        // Appel de la class Database et de ça fontion connect()
        $pdo = Database::connect();
        $i = 0;

        $sql = 'SELECT * FROM articles ORDER BY id DESC';
        $q = $pdo->query($sql);

        foreach ($q as $row) {
            if (++$i > 4) break;
        ?>

            <div class="card col-md-3">

                <img src="/public/images/creative1.jpg" class="card-img-top" alt="image cards" />

                <div class="card-body">
                    <h5 class="card-title"> <?php echo $row['title'] ?> </h5>
                    <p class="card-title"> <?php echo $row['subtitle'] ?> </p>
                    <p class="card-text">
                        <?php echo $row['description'] ?>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>

        <?php }
        // Appel de la class Database et de ça fontion disconnect()
        Database::disconnect();
        ?>

    </div>
</div>
<!-- / Liste de card -->