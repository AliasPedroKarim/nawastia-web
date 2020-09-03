<div class="container-fluid p-0">
    <div class="container-fluid padding-header-top-default vh-100 d-flex align-items-center">
        <div class="container-fluid">
            <div class="col-md-8">
                <section class="jumbotron text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="jumbotron-heading">Encore plus de pvp</h1>
                                <small style="font-family: sans-serif;">Rejoigner-nous sur, ip : <a style="text-decoration: underline;">play.nawastia.com</a> | port : <span style="text-decoration: underline;">19145</span></small>
                                <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam asperiores aspernatur culpa dolorem ea, eveniet, in modi neque nihil odio officia pariatur quae quibusdam quos reprehenderit sequi suscipit tempore!</p>
                                <?php if (!isset($_SESSION['_1'])): ?>
                                    <p>
                                        <a href="connexion.php" class="btn btn-outline-primary my-2">Se connecter</a>
                                        <a href="inscription.php" class="btn btn-outline-secondary my-2">S'inscrire</a>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                &nbsp;
            </div>
        </div>
    </div>

    <?php require_once 'inc/partie/main/footer.php'; ?>
</div>