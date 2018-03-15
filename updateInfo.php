<?php require_once './template/header.php'; ?>
<?php
$name = $_SESSION['name'];
$userType = $_SESSION['usertype']; // USER TYpe = 1 member , 2= trainer 
$uniqueid = $_SESSION['uniqueID'];
$sql = "SELECT * FROM `users` WHERE `idusers` =" . $uniqueid . " LIMIT 1";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
$pwd = $row['password'];
//set the defualt user level 
//1">Beginner</option>
//2">Advanced</option>
//3">Expert</option>
$one = null;
$two = null;
$three = null;
if ($row['level'] == 1) {
    $one = "SELECTED";
} elseif ($row['level'] == 2) {
    $two = "SELECTED";
} elseif ($row['level'] == 3) {
    $three = "SELECTED";
}
//get speciality if trainer 
if ($userType == 2) {
    $sql = "SELECT * FROM `usrspeciality` WHERE `users_idusers` =" . $uniqueid . " LIMIT 1";
    $result2 = $db->query($sql);
    $row2 = mysqli_fetch_assoc($result2);
}
?>

<!-- Contact -->
<section id="signup">
    <br>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Update Info</h2><br/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php
                if (isset($_POST['update'])) {
                    if ($userType == 1) {
                        if (isset($_POST['password']) && !empty($_POST['password'])) {
                            $upwd = $db->makepwd($_POST['password']);
                            $sql = "UPDATE `users` SET `password` = '{$upwd}', `fname` = '{$_POST['fname']}', `email` = '{$_POST['email']}', `level` = '{$_POST['level']}' WHERE `users`.`idusers` = " . $uniqueid;
                        } else {
                            $sql = "UPDATE `users` SET  `fname` = '{$_POST['fname']}', `email` = '{$_POST['email']}', `level` = '{$_POST['level']}' WHERE `users`.`idusers` = " . $uniqueid;
                        }
                        echo '<div class="alert alert-success">
                                    <strong>Success!</strong> The information has been updated successfully!
                            </div>';
                    } else {
                        if (isset($_POST['password']) && !empty($_POST['password'])) {
                            $upwd = $db->makepwd($_POST['password']);
                            $sql = "UPDATE `users` SET `password` = '{$upwd}', `fname` = '{$_POST['fname']}', `email` = '{$_POST['email']}'  WHERE `users`.`idusers` = " . $uniqueid;
                        } else {
                            $sql = "UPDATE `users` SET  `fname` = '{$_POST['fname']}', `email` = '{$_POST['email']}' WHERE `users`.`idusers` = " . $uniqueid;
                        }
                        echo '<div class="alert alert-success">
                                    <strong>Success!</strong> The information has been updated successfully!
                            </div>';
                        $sql2 = "UPDATE `usrspeciality` SET `speciality` = '{$_POST['speciality']}' WHERE `usrspeciality`.`idusrspeciality` = " . $uniqueid . " AND `usrspeciality`.`users_idusers` =" . $uniqueid . " LIMIT 1";
                        $db->query($sql2);
                    }
                    $db->query($sql);
                }
                ?>
            </div>

        </div>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="member" role="tabpanel"><br/></br>
                <div class="row">
                    <div class="col-lg-12 offset-md-3">
                        <form  name="sentMessage" novalidate method="POST" action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="username" type="text" disabled="disabled" placeholder="<?php echo $name; ?>">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="password" type="password" placeholder="Password *" required value="">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="fullname" type="text" name="fname" required value="<?php echo $row['fname']; ?>">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="email" type="email" name="email" required value="<?php echo $row['email']; ?>">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <?php if ($userType == 1): ?>
                                        <div class="form-group">
                                            <label for="level" style="color:white;">Level</label>
                                            <select class="form-control" id="level" name="level">
                                                <option value="1"  <?php echo $one; ?>>Beginner</option>
                                                <option value="2"  <?php echo $two; ?>>Advanced</option>
                                                <option value="3" <?php echo $three; ?>>Expert</option>
                                            </select>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-group">
                                            <input class="form-control" name="speciality" type="text" placeholder=""  required value="<?php echo $row2['speciality']; ?>">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    <?php endif; ?>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <br/>
                                        <div id="success"></div>
                                        <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" name="update" type="submit">Update</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
</section>

<?php
require_once './template/footer.php';
