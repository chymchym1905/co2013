<?php
require("process/database.php");
$res = new DatabaseClass();

if(isset($_POST['query'])){
    $input = $_POST['query'];
    $result = $res->getSearchLesson($input);
    $i=10;
    if($num = mysqli_num_rows($result)>0){
        while (($row = mysqli_fetch_assoc($result))&&($i>0)) {
            echo '<a href="index.php?page=lessons&c='.$row["courseID"].'&lesson='.$row["id"].'">
            <p>'. $row['name'] .'</p></a>';
            $i=$i-1;
        }
    }else{
        echo '<p>No results</p>';
    }

}

if(isset($_POST['courses'])){
    $input = $_POST['courses'];
    $result = $res->getSearchCourse($input);
    $i=10;
    if($num = mysqli_num_rows($result)>0){
        while (($row = mysqli_fetch_assoc($result))&&($i>0)) {
            echo '<a href="index.php?page=course&courseID='.$row["id"].'&courseName='.$row['name'].'"><p>'. $row['name'] .'</p></a>';
            $i=$i-1;
        }
    }else{
        echo '<p>No results</p>';
    }

}
?>