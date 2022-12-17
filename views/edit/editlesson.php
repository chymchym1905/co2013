<?php
if(isset($_GET['lessonid'])){
    $obj = new DatabaseClass();
    $res = $obj->getLessonByID($_GET['lessonid']);
    $lesson = mysqli_fetch_assoc($res);
}
if(isset($_POST["editlesson"])){
    $name = $_POST["name"];
    $course = $_POST["course"];
    $videoData = addslashes(file_get_contents($_FILES['video']['tmp_name']));
    $lessonint = (int) $lesson['id'];
    $obj->editLesson($lessonint, $name, $course, $videoData);
}
?>
<h2>Edit lesson</h2>
<form action="" method="post" enctype="multipart/form-data">
<div class="addform">
    <div class="col1">
        <div class="input-grp">
            <label for="name">Lesson Name</label>
            <input type="text" id= "name" name="name" placeholder="Lesson name" class="input-control">
        </div>
        <div class="input-grp">
            <label for="video">Upload video (mp4 only)</label>
            <input type="file" id= "video"  name="video" class="input-control">
        </div>
        <input type="submit" name="editlesson" value="Save">
    </div>

    <div class="col2">
        <div class="input-grp">
            <label for="course">Course</label>
            <select name="course" id="course">
            <?php
                $option = new DatabaseClass();
                $res = $option->getAllCourse();
                while($c = mysqli_fetch_assoc($res)){
                    echo'<option value="'.$c['id'].'">'.$c['name'].'</option>';
                }
            ?>
            </select>
        </div>
    </div>
</div>

</form>