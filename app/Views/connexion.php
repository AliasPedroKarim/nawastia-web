<div class="container">
    <div class="row">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4">

            <div class="modal fade show" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: block;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form id="form_sign_in" class="needs-validation" style="text-align: center;" method="post" action="inc/traitement/connexion-inscription.php" novalidate>

                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="\">
                                        <span class="badge badge-primary" style="font-size: 100%;"><i class="fe fe-home"></i></span>
                                    </a>
                                    <a href="inscription">
                                        <span class="badge badge-secondary" style="font-size: 100%;"><i class="fe fe-edit"></i></span>
                                    </a>
                                </div>

                                <div class="col-md-12" style="display: flex; justify-content: center; align-content: center;">
                                    <div class="mb-4 covered-top-center" style="width: 71px; height: 71px; background-image: url('assets/img/icon/icon-website.webp'); text-align: center;">

                                    </div>
                                </div>

                                <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>

                                <?php if (isset($_GET['userNoExist']) && $_GET['userNoExist'] == "true"): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Attention, l'utilisateur n'existe pas !
                                    </div>
                                <?php endif; ?>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="identificateur">Nom D'utilisateur ou Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" class="form-control" id="identificateur" name="identificateur" placeholder="Identifiant" aria-describedby="inputGroupPrepend">
                                            <div class="invalid-feedback">
                                                Veuillez s'il vous plait précisez un Nom D'utilisateur ou Email.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="motDePasse">Mot de passe</label>
                                        <input type="password" class="form-control" id="motDePasse" name="motDePasse" placeholder="Mot de passe">
                                        <div class="invalid-feedback">
                                            Veuillez s'il vous plait donnez votre mot de passe.
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-primary" name="connexion" type="submit">Connexion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">&nbsp;</div>
    </div>
</div>
<?php

$supplies_footer_script = "
<script type='text/javascript'>
    try {
        $(window).load(function() {
            $('#connexionModal').modal('show');
        });

        $(window).on('hidden.bs.modal', function() {
            $('#connexionModal').modal('show');
        });
    }catch (e) {
        
    }
</script>
"; ?>