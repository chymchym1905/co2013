<?php
if(isset($_GET['courseid'])){
    $obj = new DatabaseClass();
    $res = $obj->getCourseByID($_GET['courseid']);
    $course = mysqli_fetch_assoc($res);
}
if(isset($_POST["editcourse"])){
    $name = $_POST["name"];
    $fee = $_POST["fee"];
    $level = $_POST["level"];
    $startdate = date("Y-m-d", strtotime($_POST["startdate"]));
    $enddate = date("Y-m-d", strtotime($_POST["enddate"]));
    $res = $obj->checkCourseName($name);
    $num = mysqli_num_rows($res);
    if($num==1){
        echo "Course name must be unique";
    }else{
        $courseint = (int) $course['id'];
        $obj->editCourse($courseint,$name,$fee,$level,$startdate,$enddate);
    }
}
?>
<h2>Edit course</h2>
<form action="" method="post">
<div class="addform">
    <div class="col1">
        <div class="input-grp">
            <label for="name">Course Name</label>
            <input type="text" id= "name" name="name"  class="input-control">
        </div>
        <div class="input-grp">
            <label for="fee">Course fee</label>
            <input type="text" id= "fee" name="fee" class="input-control">
        </div>
        <div class="input-grp">
            <label for="level">Level</label>
            <input type="text" id= "level" name = "level"  class="input-control">
        </div>
    </div>

    <div class="col2">
        <div class="input-grp">
            <label for="startdate">Starting date</label>
            <input type="date" name="startdate" class="input-control">
        </div>
        <div class="input-grp">
            <label for="enddate">End date</label>
            <input type="date" name="enddate"  class="input-control">
        </div>
        <input type="submit" name="editcourse" value="Save">
    </div>
</div>
</form>
