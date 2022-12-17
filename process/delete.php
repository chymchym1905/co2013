<?php
include("database.php");

if(isset($_GET['lessonid'])){
    $lessonid = $_GET['lessonid'];
    $sql = "DELETE FROM lesson where id = '$lessonid'";
    $obj = new DatabaseClass();
    $obj->queryExecutor($sql);
    header('Location: ../index.php?adminpage=lesson');
}elseif(isset($_GET['courseid'])){
    $courseid = $_GET['courseid'];
    $sql = "DELETE FROM course where id = '$courseid'";
    $obj = new DatabaseClass();
    $obj->queryExecutor($sql);
    header('Location: ../index.php?adminpage=course');
}elseif(isset($_GET['studentid'])){
    $studentid = $_GET['studentid'];
    $sql = "DELETE FROM student where id = '$studentid'";
    $obj = new DatabaseClass();
    $obj->queryExecutor($sql);
    header('Location: ../index.php?adminpage=student');
}elseif(isset($_GET['instructorid'])){
    $instructorid = $_GET['instructorid'];
    $sql = "DELETE FROM instructor where id = '$instructorid'";
    $obj = new DatabaseClass();
    $obj->queryExecutor($sql);
    header('Location: ../index.php?adminpage=teacher');
}

