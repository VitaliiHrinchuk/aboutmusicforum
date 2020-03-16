

<div class="container-fluid">

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Відомі композиції</div>
        <a href="<?php echo WEBROOT."admin/compositionCreate"?>" class="btn-primary btn btn-sm ml-auto text-light">Додати композицію</a>
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
                    if(isset($compositions)){
                        foreach ($compositions as $composition){
                            $id = $composition["id"];
                            $name = $composition["name"];

                            $editUrl = WEBROOT."admin/compositionEdit/$id";
                            $deleteUrl = WEBROOT."admin/compositionDelete/$id";

                            echo "<tr class=''>
                                                <td>$id</td>
                                                <td>$name</td>
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


