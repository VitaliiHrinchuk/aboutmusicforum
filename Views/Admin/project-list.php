<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редагування назви</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Назва:</label>
                        <input type="text" class="form-control" id="recipient-name" name="name" required>
                    </div>
                    <input type="hidden" name="id" class="project-id">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                <input type="submit" class="btn btn-primary" value="Зберегти">
            </div>
            </form>
        </div>
    </div>
</div>


        <div class="container-fluid">

            <!-- Breadcrumbs-->


            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Мої проекти</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th>Редагувати</th>
                                <th>Видалити</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th>Редагувати</th>
                                <th>Видалити</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if(isset($projects)){
                                foreach ($projects as $proj){
                                    $id = $proj["id"];
                                    $name = $proj["project_name"];

                                    $editUrl = WEBROOT."admin/projectEdit/$id";
                                    $deleteUrl = WEBROOT."admin/deleteProject/$id";

                                    echo "<tr class=''>
                                                <td>$id</td>
                                                <td>$name</td>
                                                <td class='text-center'><button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-id='$id' data-target=\"#editModal\" data-name=\"$name\">Редагувати</button>
</td>
                                                <td class='text-center'><a href='$deleteUrl' class='btn btn-danger btn-sm'>Видалити</a></td>
                                            </tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Оновлено сьогодні</div>
            </div>



        </div>



</div>
<!-- /#wrapper -->
<script>
    $('#editModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let recipient = button.data('name')
        let id = button.data('id')
        let modal = $(this)
        modal.find('.modal-body input[name="name"]').val(recipient)
        modal.find('.modal-body input[name="id"]').val(id)
    })
</script>
