<h2>Add course</h2>
<form action="" method="post">
<div class="addform">
    <div class="col1">
        <div class="input-grp">
            <label for="name">Course Name</label>
            <input type="text" id= "name" name="name" placeholder="Name" class="input-control">
        </div>
        <div class="input-grp">
            <label for="fee">Course fee</label>
            <input type="text" id= "fee" name="fee" placeholder="Fee" class="input-control">
        </div>
        <div class="input-grp">
            <label for="level">Level</label>
            <input type="text" id= "level" name = "level" placeholder="level" class="input-control">
        </div>
    </div>

    <div class="col2">
        <div class="input-grp">
            <label for="startdate">Starting date</label>
            <input type="date" name="startdate" class="input-control">
        </div>
        <div class="input-grp">
            <label for="enddate">End date</label>
            <input type="date" name="enddate" class="input-control">
        </div>
        <input type="submit" name="addcourse" value="Add">
    </div>
</div>
</form>

<?php
    if(isset($_POST["addcourse"])){
        $name = $_POST["name"];
        $fee = $_POST["fee"];
        $level = $_POST["level"];
        $startdate = date("Y-m-d H:i:s", strtotime($_POST["startdate"]));
        $enddate = date("Y-m-d H:i:s", strtotime($_POST["enddate"]));
        $obj = new DatabaseClass();
        $res = $obj->checkCourseName($name);
        $num = mysqli_num_rows($res);
        if($num==1){
            echo "Course name must be unique";
        }else{
            $obj->addCourse($name,$fee,$level,$startdate,$enddate);
        }
    }

?>

