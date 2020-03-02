

        <div class="container-fluid">
            <?php if(isset($comment)) {
                $name = $comment["user"];
                $id = $comment["userId"];
                $link = WEBROOT."admin/userComments/$id";
                echo "<div>Відгук користувача <a href=\"$link\">$name</a></div>";
            }?>

            <form action="" method="POST" class="col-12 col-md-8 mx-0 px-0 pt-2">
                <div class="form-group" style="min-height: 200px;">
                    <textarea name="text" id="text" cols="30" rows="8" class="form-control h-100"><?php if(isset($comment)) echo $comment["text"]?></textarea>
                </div>
                <input type="submit" value="Редагувати" class="btn btn-primary">
            </form>


        </div>

