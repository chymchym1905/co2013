<?php $obj = new DatabaseClass()?>
<!-- Table student -->
<h2>Manage student</h2>
<button class="add"><a href="././index.php?addpage=student">Add</a></button>
<table class="mytable">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>GPA</th>
        <th>Manage</th>
    </tr>
    <?php if($obj->getAllStudents()==null):?>
    <tr>
        <td colspan="7">No records</td>
    </tr>
    <?php elseif($obj->getAllStudents()):
        $res= $obj->getAllStudents();
        while($student=mysqli_fetch_assoc($res)){
        echo '
            <tr>
                <td>'.$student["id"] .'</td>
                <td>'.$student["name"] .'</td>
                <td>'.$student["email"] .'</td>
                <td>'.$student["phone"] .'</td>
                <td>'.$student["address"] .'</td>
                <td><a href="././index.php?page=score&studentID='.$student["id"].'&studentName='.$student["name"].'">
                '.$student["GPA"] .'</a></td>
                
                <td>
                <button class="edit"><a href=././index.php?editpage=student&studentid='.$student['id'].'>Edit</a></button>
                <button class="delete"> <a href=././process/delete.php?studentid='.$student['id'].'>Delete</a> </button>
                </td>
            </tr>';
        }
    endif;?>
</table>

