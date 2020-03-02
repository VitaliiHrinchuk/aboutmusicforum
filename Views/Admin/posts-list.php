
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->


            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Список Публікацій</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Тема</th>
                                <th>Дата</th>
                                <th>Коментарі</th>
                                <th>Редгувати</th>
                                <th>Видалити</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Тема</th>
                                <th>Дата</th>
                                <th>Коментарі</th>
                                <th>Редгувати</th>
                                <th>Видалити</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if(isset($posts)){
                                    foreach ($posts as $post){
                                        $id = $post["id"];
                                        $theme = $post["theme"];

                                        $date = date("d.m.Y H.i", strtotime($post["creation_date"]));
                                        $editUrl = WEBROOT."admin/post/$id";
                                        $deleteUrl = WEBROOT."admin/deletePost/$id";
                                        $commentsUrl = WEBROOT."admin/comments/$id";
                                        echo "<tr class=''>
                                                <td>$id</td>
                                                <td>$theme</td>
                                                <td>$date</td>
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

