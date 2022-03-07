<!-- Modal Edit & Delete -->
<!-- Gestion Articles -->
<div class="container">
    <h5 class="modal-title" id="exampleModalLabel"> créer une Card</h5>
    <p>Création</p>
    <form action="./controller/create.php" method='post'>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">title:</label>
                <input type="text" name='title' class="form-control" id="recipient-name">
            </div>
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">subtitle</label>
                <input type="text" name='subtitle' class="form-control " id="recipient-name">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <textarea type="text" name='description' class="form-control"></textarea>
        </div>


        <div>
            <button class='btn btn-primary' type='submit'>Envoyer</button>
        </div>

    </form>

</div>
<div class="card">

    <div class="card-header" id="headingOne">
        <div class="row justify-around">
            <div class="col-md-6">
                <h2>
                    Gestion des articles
                </h2>
            </div>
        </div>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <!-- PUT Cards -->
        <div class="container mb-5">
            <h2>Method PUT</h2>
            <div class="row">

                <!-- Connexion à la DB -->
                <?php
                // import de la connexion Connexion à la DB
                include_once 'db/database.php';
                // Appel de la class Database et de ça fontion connect()
                $pdo = Database::connect();


                $sql = 'SELECT * FROM articles';
                $q = $pdo->query($sql);

                foreach ($q as $row) {


                ?>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="./public/images/creative1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <form action="./controller/update.php?id=<?php echo $row['id'] ?>" method="POST">
                                    <h5><?php echo $row['id'] ?></h5>
                                    <h5>
                                        <label for="articlenameedit" class="form-label">Edit name</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['title'] ?>" name="title">
                                    </h5>
                                    <h5>
                                        <label for="contentedit" class="form-label">Edit subtitle</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['subtitle'] ?>" name="subtitle">
                                    </h5>
                                    <h5>
                                        <label for="contentedit" class="form-label">Edit description</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['description'] ?>" name="description">
                                        <button type="submit" class="btn btn-success mt-3">Edit</button>
                                    </h5>
                                </form>
                                <form action="./controller/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php };
                Database::disconnect();
                ?>
            </div>
        </div>

    </div>
</div>