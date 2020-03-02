

        <form action="" method="POST" class="col-12 col-md-5 row align-items-start px-5" >

            <div class="col-12">
                <label class="font-weight-bold" for="name">Ім'я:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($name)) echo $name;?>" required>
            </div>
            <div class="col-12">
                <label class="font-weight-bold" for="surname">Фамілія:</label>
                <input type="text" class="form-control" name="surname" id="surname" value="<?php if(isset($surname)) echo $surname;?>" required>
            </div>
            <div class="col-12 mt-2">
                <input type="submit" class="btn btn-primary" value="Редагувати">
            </div>

        </form>

