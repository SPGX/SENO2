<?php

include 'navbar2.php';

?>

<br><br>
<h1 align = 'center'>ข้อมูลส่วนตัว</h1>

<table width = '800px' align = 'center'>
    <tr>
        <td>
            <table class = 'table table-bordered'>
                <tr>
                    <td>
                        <label for="id">ไอดี</label>
                        <input class = 'form-control' name = 'id' id = 'p1' type = 'text' value = "<?php echo $_SESSION['id']; ?>" readonly/>
                        <label for="user">ชื่อผู้ใช้งาน</label>
                        <input class = 'form-control' name = 'username' id = 'p1' type = 'text' value = "<?php echo $_SESSION['Username']; ?>" readonly/>
                        <label for="call">เบอร์โทรศัพท์</label>
                        <input class = 'form-control' name = 'tel' id = 'p1' type = 'text' value = "<?php echo $_SESSION['Telephone']; ?>" readonly/>
                        <label for="mail">อีเมล</label>
                        <input class = 'form-control' name = 'email' id = 'p1' type = 'text' value = "<?php echo $_SESSION['Email']; ?>" readonly/>
                        
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>