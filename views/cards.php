<?php
// On détermine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}
include './views/modals/modalCreateArticle.php';
//include './views/modals/modalEditArticle.php';
//include './views/modals/modalDeleteArticle.php';
?>


<!-- Liste de card -->
<div class="container pb-4">
    <div class="col-md-12 text-center">
        <h4>Listes des articles</h4>
    </div>
    <div class="col-md-12 text-center">
        <button class='btn btn-primary' data-target='#modalCreateArticle' data-toggle="modal">create</button>
    </div>

    <ul id='cardListBlog' class='row'>

        <?php
        // import de la connexion Connexion à la DB
        include 'db/database.php';
        // Appel de la class Database et de ça fontion connect()
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*) AS nb_articles FROM `articles`;';
        $q = $pdo->prepare($sql);
        $q->execute();

        $result = $q->fetch();
        $nbArticles = (int) $result['nb_articles'];
        // On détermine le nombre d'articles par page
        $parPage = 8;
        // On calcule le nombre de pages total
        $pages = ceil($nbArticles / $parPage);
        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;

        $sql = 'SELECT * FROM `articles` ORDER BY `id` DESC LIMIT :premier, :parpage;';
        $q = $pdo->prepare($sql);
        $q->bindValue(':premier', $premier, PDO::PARAM_INT);
        $q->bindValue(':parpage', $parPage, PDO::PARAM_INT);
        // On exécute
        $q->execute();
        // On récupère les valeurs dans un tableau associatif
        $articles = $q->fetchAll(PDO::FETCH_ASSOC);

        foreach ($articles as $row) {
        ?>

            <li class="card col-md-3 col-sm-12">
                <a href="descriptionID.php">
                    <img src="/public/images/creative1.jpg" class="card-img-top" alt="..." />
                </a>
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
                <button data-target='#modalEditArticle' class="btn btn-warning btn-sm" data-toggle="modal" data-id="<?php echo $row['id'] ?>" data-title="<?php echo $row['title'] ?>" data-subtitle="<?php echo $row['subtitle'] ?>" data-description="<?php echo $row['description'] ?>">
                    <i class="far fa-edit"></i>
                </button>
                <button data-target='#modalDeleteArticle' class="btn btn-danger btn-sm" data-toggle="modal" data-id="<?php echo $row['id'] ?>" data-title="<?php echo $row['title'] ?>">
                    <i class="far fa-trash-alt"></i>
                </button>
            </li>

        <?php } ?>

    </ul>

    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for ($page = 1; $page <= $pages; $page++) : ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>

    <?php
    // Appel de la class Database et de ça fontion disconnect()
    Database::disconnect();
    ?>

</div>
<!-- / Liste de card -->