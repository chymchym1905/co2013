<!-- Table student-course -->
<h2><?php echo $_GET['studentName'];?></h2>
<table class="mytable">
    <tr>
        <th>Course</th>
        <th>Assignment score</th>
        <th>Score</th>
    </tr>
    <?php if(!isset($_GET['studentID'])):?>
    <tr>
        <td colspan="3">No records</td>
    </tr>
    <?php else:
        $obj = new DatabaseClass();
        $res=$obj->getScorebyStudentID($_GET['studentID']);
        while($score=mysqli_fetch_assoc($res)){
        echo '
            <tr>
                <td>'.$score["CourseName"] .'</td>
                <td>'.$score["AssignmentScore"] .'</td>
                <td>'.$score["Grade"] .'</td>
            </tr>';
        }
    endif;?>
</table>

