<?php if(!isset($_GET['courseID'])):?>
    <div class="searchbar">
        <form action="" method="post" class="searchbox">
            <input type="text" id="search-course" onfocusin="searchOn()" onfocusout="searchOff()">
            <div class="search"><i class="fa fa-search"></i></div>
        </form>
        <div class="dropdownsearch">
            <div class="mylist1">
            </div>
        </div>
    </div>
<?php else: ?>
    <h2><?php echo $_GET['courseName'] ?></h2>
<table class="mytable">
    <tr>
        <th>Lesson ID</th>
        <th>Lesson name</th>
        <th>Course</th>
    </tr>
    <?php if(!isset($_GET['courseID'])):?>
    <tr>
        <td colspan="3">No records</td>
    </tr>
    <?php else:
        $obj = new DatabaseClass();
        $res = $obj->getLessonsbyCourseID($_GET['courseID']);
        while($lesson = mysqli_fetch_assoc($res)){
        echo '
            <tr>
                <td>'.$lesson["ID"] .'</td>
                <td><a href="./index.php?page=lessonsc='.$lesson["Course_Name"].'&lesson='.$lesson["ID"].'">'.$lesson["Lesson_Name"] .'</a></td>
                <td>'.$lesson["Course_Name"] .'</td>
            </tr>';
        }
    endif;?>
</table>
<?php endif;?>

