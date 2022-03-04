<!-- Modal Modulation -->
<div class="modal fade" id="modalCreateArticle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content fetch-data">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sur de vouloir éditer ${data.data('name')} ?</p>
                <form action="./controller/create.php" method='post'>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">title:</label>
                            <input type="text" name='title' class="form-control " id="recipient-name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">subtitle:</label>
                            <input type="text" name='subtitle' class="form-control " id="recipient-name">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="recipient-name" class="col-form-label">Description:</label>
                        <textarea type="text" name='description' class="form-control" />
                    </div>
                    <div>
                        <button class='btn btn-primary' type='submit'>Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- / Modal Modulation -->