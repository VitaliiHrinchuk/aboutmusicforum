<h3 class="ml-4">Налаштування композиції</h3>
<form action="" method="POST" class="col-12 col-md-10 row align-items-start px-5" enctype="multipart/form-data">


    <div class="col-12">
        <label class="font-weight-bold" for="name">Назва композиції:</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($name)) echo $name?>" required>
    </div>
    <div class="col-12">
        <label class="font-weight-bold" for="link">Посилання на YouTube-відео:</label>
        <input type="text" class="form-control" name="link" id="link" value="<?php if(isset($link)) echo $link?>" required>
    </div>
    <div class="col-12">
        <label class="font-weight-bold" for="desc">Опис:</label>
        <textarea  class="form-control" name="desc" id="desc"  required><?php if(isset($description)) echo $description?></textarea>
    </div>
    <div class="col-12" >

        <h5 class="font-weight-bold" >Атрибути композиції:</h5>
        <button class="btn-primary btn-sm" id="addAttrBtn">Додати атрибут</button>
        <div id="attrContainer" class="row py-2">
            <?php
            if(isset($attributes)){
                foreach ($attributes as $attribute){
                    $id = $attribute['id'];
                    $key = $attribute['attr_key'];
                    $value = $attribute['attr_value'];
                    echo "<div class=\"col-6\">
                        <label class=\"font-weight-bold\" for=\"attr_key\">Назва:</label>
                        <input type=\"text\"  class=\"form-control\" name=\"attr_key[$id]\" id=\"attr_key\" value='$key' required>
                    </div>
                    <div class=\"col-6\">
                        <label class=\"font-weight-bold\" for=\"attr_value\">Значення:</label>
                        <input type=\"text\"  class=\"form-control\" name=\"attr_value[$id]\" id=\"attr_value\" value='$value' required>
                    </div>";
                }
            }
            ?>
        </div>


    </div>

    <div class="col-12">
        <input type="submit" class="btn btn-primary" value="Зберегти">
    </div>

</form>

<script>
    function uuidv4() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }
    const addBtn = document.getElementById('addAttrBtn');
    addBtn.addEventListener('click', (e)=>{
        e.preventDefault();
        const container = document.getElementById('attrContainer');
        const id = uuidv4();
        container.insertAdjacentHTML('beforeend', `<div class="col-6">
                                    <label class="font-weight-bold" for="attr_key">Назва:</label>
                                    <input type="text"  class="form-control" name="attr_key[${id}]" id="attr_key"  required>
                                </div>
                                <div class="col-6">
                                    <label class="font-weight-bold" for="attr_value">Значення:</label>
                                    <input type="text"  class="form-control" name="attr_value[${id}]" id="attr_value"  required>
                                </div>`) ;
    })
</script>