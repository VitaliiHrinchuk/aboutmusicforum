
        <div class="container-fluid">

            <!-- Breadcrumbs-->

            <a href="<?php echo WEBROOT."admin/albumCreate"?>" class="btn btn-primary mb-3">Створити альбом</a>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Альбоми</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th>Дата створення</th>
                                <th>Редгувати</th>
                                <th>Видалити</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th>Дата створення</th>
                                <th>Редгувати</th>
                                <th>Видалити</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if(isset($albums)){
                                foreach ($albums as $album){
                                    $id = $album["id"];
                                    $name = $album["name"];

                                    $date = date("d.m.Y", strtotime($album["creation_date"]));
                                    $editUrl = WEBROOT."admin/albumEdit/$id";
                                    $deleteUrl = WEBROOT."admin/deleteAlbum/$id";
                                    echo "<tr class=''>
                                                <td>$id</td>
                                                <td>$name</td>
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

