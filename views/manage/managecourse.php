<?php $obj = new DatabaseClass()?>
<h2>Manage course</h2>
<button class="add"><a href="././index.php?addpage=course">Add</a></button>
<table class="mytable">
    <tr>
        <th>ID</th>
        <th>Course name</th>
        <th>Course fee</th>
        <th>Course level</th>
        <th>Start date</th>
        <th>End date</th>
        <th>Manage</th>
    </tr>
    <?php
     if($obj->getAllCourse()==null):?>
    <tr>
        <td colspan="7">No records</td>
    </tr>
    <?php elseif($obj->getAllCourse()!=null):
        $res= $obj->getAllCourse();
        while($course=mysqli_fetch_assoc($res)){
        echo '
            <tr>
                <td>'.$course["id"] .'</td>
                <td>'.$course["name"] .'</td>
                <td>'.$course["fee"] .'</td>
                <td>'.$course["level"] .'</td>
                <td>'.$course["startdate"] .'</td>
                <td>'.$course["enddate"] .'</td>

                <td>
                <button class="edit"><a href=././index.php?editpage=course&courseid='.$course['id'].'>Edit</a></button>
                <button class="delete"> <a href=././process/delete.php?courseid='.$course['id'].'>Delete</a> </button>
                </td>
            </tr>';
        }
endif;?>
</table>

