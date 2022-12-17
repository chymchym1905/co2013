<h2>Add student</h2>
<form action="" method="post">
<div class="addform">
    <div class="col1">
        <div class="input-grp">
            <label for="name">Name</label>
            <input type="text" id= "name" name="name" placeholder="Student Name" class="input-control">
        </div>
        <div class="input-grp">
            <label for="email">Email</label>
            <input type="text" id= "email" name="email" placeholder="Student Email" class="input-control">
        </div>
        <div class="input-grp">
            <label for="gpa">GPA</label>
            <input type="text" id= "gpa" name="gpa" placeholder="Score" class="input-control">
        </div>
    </div>

    <div class="col2">
        <div class="input-grp">
            <label for="phone">Phone number</label>
            <input type="text" id= "phone" name="phone" placeholder="Phone number" class="input-control">
        </div>
        <div class="input-grp">
            <label for="address">Address</label>
            <input type="text" id= "address"  name="address" placeholder="Address" class="input-control">
        </div>
        <input type="submit" name="addstudent" value="Add">
    </div>
</div>

</form>

<?php
    if(isset($_POST["addstudent"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $gpa = $_POST['gpa'];
        $address = $_POST["address"];
        $obj = new DatabaseClass();
        $obj->addStudent($name,$email,$phone,$address,$gpa);
    }

?>
