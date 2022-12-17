<?php $obj = new DatabaseClass()?>
<!-- Table lesson -->
<h2>Manage lesson</h2>
<button class="add"><a href="././index.php?addpage=lesson">Add</a></button>
<table class="mytable">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Video</th>
        <th>CourseID</th>
        <th>Manage</th>
    </tr>
    <?php if($obj->getAllLessons()==null):?>
    <tr>
        <td colspan="7">No records</td>
    </tr>
    <?php elseif($obj->getAllLessons()):
        $res= $obj->getAllLessons();
        while($lesson=mysqli_fetch_assoc($res)){
        echo '
            <tr>
                <td>'.$lesson["id"] .'</td>
                <td><a href="././index.php?page=lessons&lesson='.$lesson["id"].'">
                '.$lesson["name"].'</a></td>
                <td><a href="index.php?page=lessons&c='.$lesson["courseID"].'&lesson='.$lesson["id"].'">
                <p>Video</p></a></td>
                <td>'.$lesson['courseID'].'</td>

                <td>
                <button class="edit"><a href=././index.php?editpage=lesson&lessonid='.$lesson['id'].'>Edit</a></button>
                <button class="delete"> <a href=././process/delete.php?lessonid='.$lesson['id'].'>Delete</a> </button>
                </td>
            </tr>';
        }
    endif;?>
</table>

