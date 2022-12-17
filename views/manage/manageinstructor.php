<?php $obj = new DatabaseClass()?>
<h2>Manage instructor</h2>
<button class="add"><a href="././index.php?addpage=teacher">Add</a></button>
<table class="mytable">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Manage</th>
    </tr>
    <?php if($obj->getAllInstructor()==null):?>
    <tr>
        <td colspan="7">No records</td>
    </tr>
    <?php elseif($obj->getAllInstructor()):
        $res= $obj->getAllInstructor();
        while($instructor=mysqli_fetch_assoc($res)){
        echo '
            <tr>
                <td>'.$instructor["id"] .'</td>
                <td>'.$instructor["name"] .'</td>
                <td>'.$instructor["email"] .'</td>
                <td>'.$instructor["phone"] .'</td>
                <td>'.$instructor["address"] .'</td>

                <td>
                <button class="edit"><a href=././index.php?editpage=teacher&instructorid='.$instructor['id'].'>Edit</a></button>
                <button class="delete"> <a href=././process/delete.php?instructorid='.$instructor['id'].'>Delete</a> </button>
                </td>
            </tr>';
        }
    endif;?>
</table>

