<div class="card">
    <div class="card-body">

        <form enctype="multipart/form-data" method="post" action="inc/traitement/activite/manage_activite.php">
            <input type="text" class="form-control form-control-flush pt-3 pb-3" placeholder="Nom de la nouvelle activité" name="nom_activite">
            <div data-toggle="quill" data-quill-placeholder="Nouvelle activité" class="text_activite"></div>
            <button name="nouvelle-activite" type="submit" class="btn btn-primary mt-3 float-right">
                Poster
            </button>
        </form>

    </div>
</div>