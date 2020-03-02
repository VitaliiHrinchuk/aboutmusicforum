

        <div class="container-fluid">

            <!-- Breadcrumbs-->


            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Користувачі</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Фамілія</th>
                                <th>Ім'я</th>
                                <th>Коментарі</th>
                                <th>Редагувати</th>
                                <th>Видалити</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Фамілія</th>
                                <th>Ім'я</th>
                                <th>Коментарі</th>
                                <th>Редагувати</th>
                                <th>Видалити</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if(isset($users)){
                                foreach ($users as $user){
                                    $id = $user["id"];
                                    $name = $user["name"];
                                    $surname = $user["surname"];
                                    $editUrl = WEBROOT."admin/userEdit/$id";
                                    $deleteUrl = WEBROOT."admin/deleteUser/$id";
                                    $commentsUrl = WEBROOT."admin/userComments/$id";
                                    echo "<tr class=''>
                                                <td>$id</td>
                                                <td>$surname</td>
                                                <td>$name</td>
                                                <td class='text-center'><a href='$commentsUrl' class='btn btn-dark btn-sm'>Коментарі</a></td>
                                                <td class='text-center'><a href='$editUrl' class='btn btn-primary btn-sm'>Редагувати</a></td>
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
        <!-- /.container-fluid -->


