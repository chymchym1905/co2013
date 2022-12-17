<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "stylesheet" type="text/css" href="css/style.css">
    <link rel = "stylesheet" type="text/css" href="css/table.css">
    <link rel = "stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designer1905</title>
</head>
<?php
require("process/database.php")
?>

<body>
    <div class="header">
        <div class="topnavbar">
            <div class="linknav"><a style="text-decoration: none; color: black;" 
            href="index.php?page=home">Home</a></div>
            
            <div class="linknav"><a style="text-decoration: none; color: black;" 
            href="index.php?page=course" onmouseover="openDropDown()" onmouseout="removeDropDown()"  >Courses</a>
            <div onmouseout="removeDropDown()" class="dropdown"  id=submenu>
                <div onmouseover="openDropDown()" class="mylist">
                   <?php
                        $obj = new DatabaseClass();
                        $res=$obj->getAllCourse();
                        $i=4;
                        while(($row = mysqli_fetch_assoc($res)) && ($i>0)){
                        echo '
                        <a onmouseover="openDropDown()" href="?page=course&courseID='.$row['id'].'&courseName='.$row['name'].'"
                        style="text-decoration: none; color: black;">'.$row['name'].'</a>';
                        $i=$i-1;
                        }
                   ?>
                </div>
            </div>
            </div>
            
            <div class="linknav"><a style="text-decoration: none; color: black;" 
            href="index.php?page=lessons">Lessons</a></div>
            
            <div class="linknav"><a style="text-decoration: none; color: black;" 
            href="index.php?page=manage" onmouseover="openDropDown1()" onmouseout="removeDropDown1()" >Manage</a>
            <div onmouseout="removeDropDown1()" class="dropdown"  id=submenu1>
                <div onmouseover="openDropDown1()" class="mylist">
                    <a onmouseover="openDropDown1()" href="?adminpage=course" style="text-decoration: none; color: black;">Manage courses</a>
                    <a onmouseover="openDropDown1()" href="?adminpage=student" style="text-decoration: none; color: black;">Manage students</a>
                    <a onmouseover="openDropDown1()" href="?adminpage=lesson" style="text-decoration: none; color: black;">Manage lessons</a>
                    <a onmouseover="openDropDown1()" href="?adminpage=teacher" style="text-decoration: none; color: black;">Manage instructors</a>
                </div>
            </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
            if($page == "home"){
                include "views/home.php";
            }elseif($page == "lessons"){
                include "views/lessonviewer.php";
            }elseif($page == "course"){
                include "views/courseviewer.php";
            }elseif($page == "manage"){
                include "views/manage.php";
            }elseif($page == "score"){
                include "views/scoretable.php";
            }else{
                die("Where is the page?");
            }
        }

        if(isset($_GET['adminpage'])){
            $admin = $_GET['adminpage'];
            if($admin == "course"){
                include "views/manage/managecourse.php";
            }elseif($admin == "lesson"){
                include "views/manage/managelesson.php";
            }elseif($admin == "student"){
                include "views/manage/managestudent.php";
            }elseif($admin == "teacher"){
                include "views/manage/manageinstructor.php";
            }else{
                die("Where is the page?");
            }
        }

        if(isset($_GET['addpage'])){
            $add = $_GET['addpage'];
            if($add == "course"){
                include "views/add/addcourse.php";
            }elseif($add == "lesson"){
                include "views/add/addlesson.php";
            }elseif($add == "student"){
                include "views/add/addstudent.php";
            }elseif($add == "teacher"){
                include "views/add/addinstructor.php";
            }else{
                die("Where is the page?");
            }
        }

        if(isset($_GET['editpage'])){
            $edit = $_GET['editpage'];
            if($edit == "course"){
                include "views/edit/editcourse.php";
            }elseif($edit == "lesson"){
                include "views/edit/editlesson.php";
            }elseif($edit == "student"){
                include "views/edit/editstudent.php";
            }elseif($edit == "teacher"){
                include "views/edit/editinstructor.php";
            }else{
                die("Where is the page?");
            }
        }
    ?>

    <div class="footer"></div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/script.js"></script>
<script src="./js/searchlesson.js"></script>
<script src="./js/searchcourse.js"></script>