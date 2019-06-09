<?php

include 'navbar1.php';

?>

<br><br><br><br><br>

<form method = 'POST' action = 'index.php'>
    <table width = '300px' align = 'center'>
        <tr align = 'center'>
            <td>
                <center>
                    <img src = './img/login.png' width = '200px' height = '200px'/>
                </center>
                <br>
                <input class = 'form-control' name = 'textbox1' id = 'p1' type = 'text' autofocus required placeholder = 'ชื่อผู้ใช้ หรือ เบอร์โทร : '/>
                <input class = 'form-control' name = 'textbox2' id = 'p1' type = 'password' required placeholder = 'รหัสผ่าน : '/>
                <input class = 'btn btn-primary btn-lg btn-block' name = 'button1' id = 'p1' type = 'submit' value = 'เข้าสู่ระบบ'/>
            </td>
        </tr>
    </table>
</form>

<?php

if (isset($_POST['button1'])){
    $user = $_POST['textbox1'];
    $pass = $_POST['textbox2'];
    $query = "select * from member where Username = ? or Telephone = ? and Password = ?";
    $result = $object1 -> prepare($query);
    $result -> bindParam('1', $user);
    $result -> bindParam('2', $user);
    $result -> bindParam('3', $pass);
    try {
        $result -> execute();
        $row = $result -> fetch(PDO::FETCH_ASSOC);
        if ($result -> rowCount() >= 1){
            $_SESSION['id'] = $row['id'];
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Telephone'] = $row['Telephone'];
            header('location: home1.php');
        }else{
            echo "<table width = '300px' align = 'center'><tr><td><p class = 'alert alert-danger' align = 'center'>ชื่อผู้ใช้งาน หรือ รหัสผ่าน ผิดพลาด</p></td></tr></table>";
        }
    } catch (\Throwable $th) {
        $error = $th -> getMessage();
    }
}

?>