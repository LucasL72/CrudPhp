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
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">subtitle</th>
                        <th scope="col">description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Appel de la class Database et de ça fontion connect()
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM articles ORDER BY id DESC';
                    $q = $pdo->query($sql);

                    foreach ($q as $row) {

                    ?>

                        <tr class="text-center">
                            <th scope="row"> <?php echo $row['id'] ?> </th>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['subtitle'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td>
                                <button data-target='#modalEditArticle' class="btn btn-warning btn-sm" data-toggle="modal" data-id="<?php echo $row['id'] ?>" data-title="<?php echo $row['title'] ?>" data-subtitle="<?php echo $row['subtitle'] ?>" data-description="<?php echo $row['description'] ?>">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button data-target='#modalDeleteArticle' class="btn btn-danger btn-sm" data-toggle="modal" data-id="<?php echo $row['id'] ?>" data-title="<?php echo $row['title'] ?>">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>



                    <?php };


                    // Appel de la class Database et de ça fontion disconnect()
                    Database::disconnect();

                    ?>

                </tbody>
            </table>
        </div>


    </div>
</div>