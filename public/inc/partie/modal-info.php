<div class="modal fade fixed-right" id="modalDemo" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <form class="modal-content" id="demoForm">
            <div class="modal-body">

                <!-- Close -->
                <a class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>

                <div class="text-center">
                    <img src="<?= $main_logo_web ?>" alt="..." class="img-fluid mb-3">
                </div>

                <h2 class="text-center mb-2">
                    <?= str_replace(" - ", "", $main_name_web); ?>
                </h2>

                <p class="text-center mb-4">
                    Encore plus de pvp
                </p>

                <hr class="mb-4">

                <h4 class="mb-1">
                    Color Scheme
                </h4>

                <p class="small text-muted mb-3">
                    Overall light or dark presentation.
                </p>

                <div class="btn-group-toggle d-flex mb-4" data-toggle="buttons">
                    <label class="btn btn-white active col">
                        <input type="radio" name="colorScheme" id="colorSchemeLight" value="light" checked=""> <i class="fe fe-sun mr-2"></i> Light Mode
                    </label>
                    <label class="btn btn-white col ml-2">
                        <input type="radio" name="colorScheme" id="colorSchemeDark" value="dark"> <i class="fe fe-moon mr-2"></i> Dark Mode
                    </label>
                </div>

                <h4 class="mb-1">
                    Navigation Position
                </h4>

                <p class="small text-muted mb-3">
                    Select the primary navigation paradigm for your app.
                </p>

                <div class="btn-group-toggle d-flex mb-4" data-toggle="buttons">
                    <label class="btn btn-white active col">
                        <input type="radio" name="navPosition" id="navPositionSidenav" value="sidenav" checked=""> Sidenav
                    </label>
                    <label class="btn btn-white col ml-2">
                        <input type="radio" name="navPosition" id="navPositionTopnav" value="topnav"> Topnav
                    </label>
                    <label class="btn btn-white col ml-2">
                        <input type="radio" name="navPosition" id="navPositionCombo" value="combo"> Combo
                    </label>
                </div>

                <h4 class="mb-1">
                    Sidebar Color
                </h4>

                <p class="small text-muted mb-3">
                    Usually dictated by the color scheme, but can be overriden.
                </p>

                <div class="btn-group-toggle d-flex mb-4" data-toggle="buttons">
                    <label class="btn btn-white active col">
                        <input type="radio" name="sidebarColor" id="sidebarColorDefault" value="default" checked=""> Default
                    </label>
                    <label class="btn btn-white col ml-2">
                        <input type="radio" name="sidebarColor" id="sidebarColorVibrant" value="vibrant"> Vibrant
                    </label>
                </div>

            </div>
            <div class="modal-footer border-0">

                <button type="submit" class="btn btn-block btn-primary mt-auto">
                    Appliquer
                </button>

            </div>
        </form>
    </div>
</div>