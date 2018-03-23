<?php require_once './template/header.php'; ?>
<?php
$name = $_SESSION['name'];
$uniqueid = $_SESSION['uniqueID'];
$sql = "SELECT * FROM `employer` WHERE `userID` =" . $uniqueid . " LIMIT 1";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
$pwd = $row['ePassword'];

$one = null;
$two = null;
$three = null;
$four = null;
$five = null;
$six = null;
$seven = null;
$eight = null;
$nine = null;
$ten = null;
$eleven = null;
$twelve = null;
$thirteen = null;
$fourteen = null;
$fifteen = null;
if ($row['industry'] == 'Agriculture') {
    $one = "SELECTED";
} elseif ($row['industry'] == 'Automotive') {
    $two = "SELECTED";
} elseif ($row['industry'] == 'Construction') {
    $three = "SELECTED";
} elseif ($row['industry'] == 'Cosmetics') {
    $four = "SELECTED";
} elseif ($row['industry'] == 'Education') {
    $five = "SELECTED";
} elseif ($row['industry'] == 'Engineering') {
    $six = "SELECTED";
} elseif ($row['industry'] == 'Entertainment') {
    $seven = "SELECTED";
} elseif ($row['industry'] == 'Finance') {
    $eight = "SELECTED";
} elseif ($row['industry'] == 'Food') {
    $nine = "SELECTED";
} elseif ($row['industry'] == 'Health Care') {
    $ten = "SELECTED";
} elseif ($row['industry'] == 'Information Technology') {
    $eleven = "SELECTED";
} elseif ($row['industry'] == 'Marketing') {
    $twelve = "SELECTED";
} elseif ($row['industry'] == 'Media & Communication') {
    $thirteen = "SELECTED";
} elseif ($row['industry'] == 'Pharmaceutical') {
    $fourteen = "SELECTED";
} elseif ($row['industry'] == 'Others') {
    $fifteen = "SELECTED";
}


$profitable = null;
$nonprofit = null;
if ($row['profitability'] == 'Profitable') {
    $profitable = "CHECKED";
} elseif ($row['profitability'] == 'Non-Profit') {
    $nonprofit = "CHECKED";
}


?>

<!-- Contact -->
<section id="signup">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Edit Profile</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php
                if (isset($_POST['update'])) {
                        if (isset($_POST['ePassword']) && !empty($_POST['ePassword'])) {
                            $upwd = $db->makepwd($_POST['ePassword']);
                            $sql = "UPDATE `employer` SET `password` = '{$upwd}', `orgName` = '{$_POST['orgName']}', `industry` = '{$_POST['industry']}', `profitability` = '{$_POST['ctype']}',
                             `email` = '{$_POST['empEmail']}', `phoneNo` = '{$_POST['phoneNo']}' WHERE `employer`.`userID` = " . $uniqueid;
                        } else {
                            $sql = "UPDATE `employer` SET  `orgName` = '{$_POST['orgName']}', `industry` = '{$_POST['industry']}', `profitability` = '{$_POST['ctype']}',
                            `email` = '{$_POST['empEmail']}', `phoneNo` = '{$_POST['phoneNo']}' WHERE `employer`.`userID` = " . $uniqueid;
                        }
                        echo '<div class="alert alert-success">
                                    <strong>Success!</strong> Your profile has been updated!
                            </div>';
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
                                        <input class="form-control" id="eUsername" type="text" placeholder="<?php echo $name; ?>" disabled="disabled" required data-validation-required-message="Please enter your username." required>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="ePassword" type="password" name="ePassword" placeholder="Enter new password or leave blank to keep existing password" required data-validation-required-message="Please enter your password.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="orgName" type="text" name="orgName" value="<?php echo $row['orgName']; ?>" placeholder="Name of Organization*">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="industry" name="industry">
                                            <option value="" disabled>Type of Organization</option>
                                            <option value="Agriculture" <?php echo $one; ?>>Agriculture</option>
                                            <option value="Automotive" <?php echo $two; ?>>Automotive</option>
                                            <option value="Construction" <?php echo $three; ?>>Construction</option>
                                            <option value="Cosmetics" <?php echo $four; ?>>Cosmetics</option>
                                            <option value="Education" <?php echo $five; ?>>Education</option>
                                            <option value="Engineering" <?php echo $six; ?>>Engineering</option>
                                            <option value="Entertainment" <?php echo $seven; ?>>Entertainment</option>
                                            <option value="Finance" <?php echo $eight; ?>>Finance</option>
                                            <option value="Food" <?php echo $nine; ?>>Food</option>
                                            <option value="Health Care" <?php echo $ten; ?>>Health Care</option>
                                            <option value="Information Technology" <?php echo $eleven; ?>>Information Technology</option>
                                            <option value="Marketing" <?php echo $twelve; ?>>Marketing</option>
                                            <option value="Media & Comunication" <?php echo $thirteen; ?>>Media & Comunication</option>
                                            <option value="Pharmaceutical" <?php echo $fourteen; ?>>Pharmaceutical</option>
                                            <option value="Others" <?php echo $fifteen; ?>>Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="radio-inline"><input type="radio" id="ctype" onclick="test();" value="Profitable" name="ctype" <?php echo $profitable; ?>>&nbsp;Profitable</label>
                                      <label class="radio-inline"><input type="radio" id="ctype" value="Non-Profit" name="ctype" <?php echo $nonprofit; ?>>&nbsp;Non-Profit</label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="empEmail" type="email" name="empEmail" value="<?php echo $row['email']; ?>" placeholder="Email*" required data-validation-required-message="Please enter your email.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="phoneNo" type="number" name="phoneNo" value="<?php echo $row['phoneNo']; ?>" placeholder="Phone No*" required data-validation-required-message="Please enter your mobile number.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                    <br/>

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
