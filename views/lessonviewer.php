<?php if(!(isset($_GET['lesson']))):?>
    <div class="searchbar">
        <form action="" method="post" class="searchbox">
            <input type="text" id="search-input" onfocusin="searchOn()" onfocusout="searchOff()">
            <div class="search"><i class="fa fa-search"></i></div>
        </form>
        <div class="dropdownsearch">
            <div class="mylist1">

            </div>
        </div>
    </div>
<?php else: ?>
    <?php
        $obj = new DatabaseClass();
        $res = $obj->getVideoLessonByID($_GET['lesson']);
        $video = mysqli_fetch_assoc($res);
        echo '
        <video class = "video" controls> 
        <source src="data:video/mp4;base64,'.base64_encode($video['video']).'" >
        </video>';
    ?>
    


<?php endif; ?>

