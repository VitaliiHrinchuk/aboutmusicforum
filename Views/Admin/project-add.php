
        <div class="container-fluid">
            <h4>Додати нову композицію</h4>
            <form id="upload-form" action="" method="POST" class="col-12 col-md-8 mx-0 px-0"  enctype="multipart/form-data">
                <div class="form-group" style="">

                    <label for="file " class="d-block">Файл композиції</label>
                    <input accept="audio/*"  type="file" data-max-size="7340032" class="form-control-file" id="file" name="file" required>

                </div>
                <div class="form-group">
                    <label for="name">Назва проекту:</label>
                    <input type="text" class="form-control" name="name" id="name" value="" required>
                </div>
                <input type="submit" value="Зберегти" class="btn btn-primary">
            </form>


        </div>


<script>
    $(function(){
        let fileInput = $('#file');
        let maxSize = fileInput.data('max-size');
        $('#upload-form').submit(function(e){
            if(fileInput.get(0).files.length){
                let fileSize = fileInput.get(0).files[0].size; // in bytes
                if(fileSize>maxSize){
                    alert('Файл перебільшує максимально допустипий розмір в ' + maxSize + ' байт');
                    return false;
                }else{
                }
            }else{
                alert('Оберіть файл');
                return false;
            }

        });
    });
</script>
