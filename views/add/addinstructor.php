<h2>Add instructor</h2>
<form action="" method="post">
<div class="addform">
    <div class="col1">
        <div class="input-grp">
            <label for="name">Name</label>
            <input type="text" id= "name" name="name" placeholder="Instructor Name" class="input-control">
        </div>
        <div class="input-grp">
            <label for="email">Email</label>
            <input type="text" id= "email" name="email" placeholder="Instructor Email" class="input-control">
        </div>
        <div class="input-grp">
            <label for="wage">Wage</label>
            <input type="text" id= "wage" name="wage" placeholder="Wage" class="input-control">
        </div>
    </div>

    <div class="col2">
        <div class="input-grp">
            <label for="phone">Phone number</label>
            <input type="text" id= "phone" name="phone" placeholder="Phone number" class="input-control">
        </div>
        <div class="input-grp">
            <label for="address">Address</label>
            <input type="text" id= "address" name="address" placeholder="Address" class="input-control">
        </div>
        <input type="submit" name="addinstructor" value="Add">
    </div>
</div>

</form>

<?php
    if(isset($_POST["addinstructor"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $salary = $_POST['wage'];
        $address = $_POST["address"];
        $obj = new DatabaseClass();
        $obj->addInstructor($name,$email,$phone,$salary,$address);
    }

?>