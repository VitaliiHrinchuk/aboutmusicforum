
<div  id="addModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" >
            <div class="modal-header">
                <h5 class="modal-title">Створити нову категорію</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <label for="name">Назва</label>
                    <input type="text" class="form-control txt-field my-2" name="name" placeholder="Назва">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Зберегти</button>
                <button  type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div  id="editModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="./editCategory" method="post" >
                <div class="modal-header">
                    <h5 class="modal-title">Редагувати категорію</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="name">Назва</label>
                    <input id="editInput" type="text" class="form-control txt-field my-2" name="name" placeholder="Назва">
                    <input id="editId" type="hidden" class="form-control txt-field my-2" name="id" placeholder="Назва">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                    <button  type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Категорії</div>
        <button class="btn-primary ml-auto p-2 m-2" data-toggle="modal" data-target="#addModal">Створити нову категорію</button>
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
                    if(isset($categories)){
                        foreach ($categories as $category){
                            $id = $category["id"];
                            $name = $category["name"];

                            $editUrl = WEBROOT."admin/editComment/$id";
                            $deleteUrl = WEBROOT."admin/deleteCategory/$id";
                            $nameArg = '"'. $name.'"';
                            echo "<tr class=''>
                                        <td class='align-middle'>$id</td>
                                        <td class=''>$name</td>
                                        <td class='text-center'><button onclick='openEdit($id,$nameArg)' class='btn btn-primary btn-sm'>Редагувати</button></td>
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
<script>
    function openEdit (id, name) {
        $('#editModal').modal('toggle');
        document.getElementById('editInput').value = name;
        document.getElementById('editId').value = id;
    }
</script>
