<section class="py-2">
    <h2 class="text-center">Мої проекти</h2>
    <div class="row">
        <?php if(isset($projects)){
            foreach ($projects as $prj){
                $file = $prj["filename"];
                $url = PUBLIC_DIR."/audio/$file";
                $name = $prj["project_name"];
                $download = "";
                if(isset($isAuthorized) && !$isAuthorized) $download = "controlsList=\"nodownload\"";
                echo "<div class='col-12 px-5'><div>$name</div><audio $download controls src=\"$url\"></audio></div>";
            }
        }?>
    </div>
</section>