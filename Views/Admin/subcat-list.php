
<div class="container-fluid">

    <!-- Breadcrumbs-->


    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Список підрозділів до <?php if(isset($parent))
                    $id = $parent["id"];
                    $name = $parent["name"];
                    $link = WEBROOT."admin/editCategory/$id";
                    echo "<a href='$link'>$name</a>";
                ?> </div>
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
                        foreach ($categories as $cat){
                            $id = $cat["id"];
                            $name = $cat["name"];
                            $editUrl = WEBROOT."admin/editCategory/$id";
                            $deleteUrl = WEBROOT."admin/deleteCategory/$id";
                            echo "<tr class=''>
                                        <td class='align-middle'>$id</td>
                                        <td class=''>$name</td>
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