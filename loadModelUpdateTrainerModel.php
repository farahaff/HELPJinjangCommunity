<?php

require_once("inc/dbcall.php");
$db = new Db();
$sessionID = $_POST['sessionid'];
$sql = "SELECT * FROM `tsessions` WHERE `idtable1` =" . $sessionID . " LIMIT 1";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
//$time =date('h:m A', strtotime($row['time'])); 
////get the session type mma,sport,dance
//$rowctype = mysqli_fetch_assoc($result2);
// set teh select box to default selected value
$one = null;
$two = null;
$three = null;
if ($row['status'] == 1) {
    $one = 'selected';
} elseif ($row['status'] == 2) {
    $two = 'selected';
} elseif ($row['status'] == 3) {
    $three = 'selected';
}
//class type set teh defaukt selected value
$sport = null;
$dance = null;
$mma = null;
/*
 *  1 	Sport 	sport
  2 	Dance 	dance
  3 	MMA 	mma
 */
if ($row['ctype'] == 1) {
    $sport = 'selected';
} elseif ($row['ctype'] == 2) {
    $dance = 'selected';
} elseif ($row['ctype'] == 3) {
    $mma = 'selected';
}
echo "<h3 class='text-uppercase'>{$row['title']}</h3><br>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='form-group'>
                        <input class='form-control' id='udate' type='date' placeholder='{$row['tdate']}' value='{$row['tdate']}'>
                        <p class='help-block text-danger'></p>
                    </div>
                    <div class='form-group'>
                        <input class='form-control' id='utime' type='time' placeholder='{$row['time']}' value='{$row['time']}' >
                        <p class='help-block text-danger'></p>
                    </div>
                    <div class='form-group'>
                        <input class='form-control' id='ufee' type='number' placeholder='{$row['fee']}' value='{$row['fee']}' >
                        <p class='help-block text-danger'></p>
                    </div>
                    <div class='form-group'>
                        <label for='classStatus' style='float:left;'>Status</label>
                            <select class='form-control' id='uclassStatus'>
                                <option value='1' $one >Available</option>
                                <option value='2' $two>Completed</option>
                                <option value='3' $three>Canceled</option>
                            </select>
                    </div>
                    <div class='form-group'>
                        <label for='classType' style='float:left;'>Class Type</label>
                            <select class='form-control' id='uclassType'>
                                <option value='1' $sport >Sport</option>
                                <option value='2' $dance >Dance</option>
                                <option value='3' $mma >MMA</option>
                            </select>
                    </div>
                    <div class='clearfix'></div>
                    <div class='col-lg-12 text-center'>
                    <br/>
                    <div id='success'></div>
                            <button class='btn btn-primary btn-md text-uppercase' data-dismiss='modal' onclick='updateTraningSession({$sessionID})'  style='padding-bottom:25px;'>Save</button>
                    </div>
                </div>

            </div>";


