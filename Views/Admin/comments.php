

        <div class="container-fluid">

            <!-- Breadcrumbs-->


            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Коментарі</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Автор</th>
                                <th>Текст</th>
                                <th>Дата публікації</th>
                                <th>Редагувати</th>
                                <th>Видалити</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Автор</th>
                                <th>Текст</th>
                                <th>Дата публікації</th>
                                <th>Редагувати</th>
                                <th>Видалити</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if(isset($comments)){
                                foreach ($comments as $comment){
                                    $id = $comment["id"];
                                    $author = $comment["user"];
                                    $text = $comment["text"];
                                    $date = date("d.m.Y H.i", strtotime($comment["date"]));
                                    $userId =WEBROOT."admin/user/".$comment["userId"];
                                    $editUrl = WEBROOT."admin/editComment/$id";
                                    $deleteUrl = WEBROOT."admin/deleteComment/$id";
                                    echo "<tr class=''>
                                        <td class='align-middle'>$id</td>
                                        <td class='align-middle'><a href='$userId'>$author</a></td>
                                        <td class=''>$text</td>
                                        <td>$date</td>
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
