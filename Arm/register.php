<?php

include 'navbar1.php';

?>

<br><br>

<form method = 'POST' action = 'register.php'>
    <center>
        <img src = './img/register.png' width = '200px' height = '200px'/>
    <table width = '300px' align = 'center'>
        <tr>
            <td>
				<input class = 'form-control' name = 'username' id = 'p1' type = 'text' autofocus required placeholder = 'ชื่อผู้ใช้งาน'/>
                <input class = 'form-control' name = 'password' id = 'p1' type = 'password' required placeholder = 'รหัสผ่าน'/>
                <input class = 'form-control' name = 'repassword' id = 'p1' type = 'password' required placeholder = 'ยืนยันรหัสผ่าน'/>
                <input class = 'form-control' name = 'telephone' id = 'p1' type = 'number' required placeholder = 'เบอร์โทร'/>
                <input class = 'form-control' name = 'email' id = 'p1' type = 'email' required placeholder = 'อีเมล'/>
                <input class = 'btn btn-primary btn-lg btn-block' name = 'button1' id = 'p1' type = 'submit' value = 'สมัครสมาชิก'/>
            </td>
        </tr>
    </table>
</form>

<?php

if (isset($_POST['button1'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $query = "insert into member (Username, Password, Telephone, Email) values (?, ?, ?, ?)";
    $result = $object1 -> prepare($query);
    $result -> bindParam('1', $user);
    $result -> bindParam('2', $pass);
    $result -> bindParam('3', $telephone);
    $result -> bindParam('4', $email);
    
    if ($pass != $repass){
        echo "<table width = '300px' align = 'center'><tr><td><p class = 'alert alert-danger' align = 'center'>รหัสผ่านไม่ตรงกัน</p></td></tr></table>";
        exit();
    }

    try {
        if ($result -> execute() && $pass == $repass){
            echo "<table width = '300px' align = 'center'><tr><td><p class = 'alert alert-danger' align = 'center'>สมัครสมาชิกสำเร็จ!!</p></td></tr></table>";
        }else{
            echo "<table width = '300px' align = 'center'><tr><td><p class = 'alert alert-danger' align = 'center'>ชื่อผู้ใช้งาน หรือ Email ถูกใช้งานไปแล้ว</p></td></tr></table>";
        }
    } catch (\Throwable $th) {
        $error = $th -> getMessage();
    }
}

?>