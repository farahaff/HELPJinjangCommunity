function memType(mtype) {
    // 1 = member , 2= trainder
    $("#selmemtype").val(mtype);

}
//check if it display teh right value
function showID() {
    var selectedValue = $("#selmemtype").val();
    //alert(singleValues);

}


//member registeraion
function formSubmitm($usertype) {
    //var name = document.getElementById("name").value;
    var musername = $("#musername").val();
    var pwd = $("#mpassword").val();
    var fname = $("#mfullname").val();
    var memail = $("#memail").val();
    var mlevel = $("#level").val();
    //"1">Beginner</option>
    //"2">Advanced</option>
    //"3">Expert</option>
    var dataString = 'name=' + musername + '&pwd=' + pwd + '&fname=' + fname + '&memail=' + memail + '&mlevel=' + mlevel + '&utype=' + $usertype;
    $.ajax({
        type: "POST",
        url: "ssignup.php",
        data: dataString,
        success: function (response) {
            //after success display teh msg
            alert("Successfully Registered!");
            window.location = "Login.php";
        }

    });
    event.preventDefault();

}
//tariner registeration
function formSubmitT($usertype) {

    //var name = document.getElementById("name").value;
    var tusername = $("#tusername").val();
    var pwd = $("#tpwd").val();
    var fname = $("#tfullname").val();
    var temail = $("#temail").val();
    var tspecialty = $("#tspecialty").val();
    //"1">Beginner</option>
    //"2">Advanced</option>
    //"3">Expert</option>
    var dataString = 'name=' + tusername + '&pwd=' + pwd + '&fname=' + fname + '&memail=' + temail + '&tspecialty=' + tspecialty + '&utype=' + $usertype;
    $.ajax({
        type: "POST",
        url: "tsignup.php",
        data: dataString,
        success: function (response) {
            //after success display teh msg
            alert("Successfully Registered!");
            window.location = "Login.php";
        }

    });
    event.preventDefault();

}

/*
 * function to togle  the personal and group option
 *
 */
function  showGroupDiv() {
    //$("#group").fadeToggle( "slow", "linear" );
    $("#group").fadeIn("slow");
}
function hideGroup() {
    $("#group").fadeOut("slow");
}

//the model in resgiter session for members
function loadModel(id) {
    var dataString = 'id=' + id
    $.ajax({
        type: "POST",
        url: "registerSessionModel.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();
}

//register user for the seesion
function registerUser(userid, sessionid) {
    var dataString = 'userid=' + userid + '&sessionid=' + sessionid;
    $.ajax({
        type: "POST",
        url: "resgisterUser.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert(response);
        }

    });
    event.preventDefault();
}
// update trainer submited data
function loadModelUpdateTrainer(sessionid) {
    var dataString = 'sessionid=' + sessionid;
    $.ajax({
        type: "POST",
        url: "loadModelUpdateTrainerModel.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();

}
//update trainer set date through model
function updateTraningSession(id) {
    var udate = $("#udate").val();
    var utime = $("#utime").val();
    var ufee = $("#ufee").val();
    var uclassStatus = $("#uclassStatus").val();
    var uclassType = $("#uclassType").val();
    var dataString = 'sessionid=' + id + '&udate=' + udate + '&utime=' + utime + '&ufee=' + ufee + '&uclassStatus=' + uclassStatus + '&uclassType=' + uclassType;
    $.ajax({
        type: "POST",
        url: "updateTraningSessionModel.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert("Data Updated Successfully!");
            location.reload();
        }

    });
    event.preventDefault();
}
//load the member rewviwe model

function loadModelReviewMember(sessionid) {
    var dataString = 'sessionid=' + sessionid;
    $.ajax({
        type: "POST",
        url: "loadModelReviewMember.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();
}
//record user Review to Database
function recordReview(uniqueid, sessionID) {
    var comment = $("#rmessage").val();
    var rrate = $("#rrate:checked").val();
    var dataString = 'uniqueid=' + uniqueid + '&sessionID=' + sessionID + '&comment=' + comment + '&rrate=' + rrate;
    $.ajax({
        type: "POST",
        url: "recordReview.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert("Review Successfully Recorded!");
        }

    });
    event.preventDefault();
}

// validate function for record Traning session
function valideatRecordTraining() {
    var mtitle = $("#title").val();// need to be string
    if (!isNaN(mtitle)) {
        $("#mtitle").text("Title should be a text!");
    }else{
        $("#mtitle").text("");
    }
    var mdate = $("#date").val(); //need to be valid date
    var mdatecheck = Date.parse(mdate);
    if (!isNaN(mdatecheck) === false || mdate == " ") {
        $("#mdate").text("Please enter a date!");
    }else{
        $("#mdate").text("");
    }
    var mtime = $("#time").val(); // valide time
    if (isNaN(mtime) == false || mtime == " ") {
        $("#mtime").text("Please enter a time!");
    }else{
         $("#mtime").text("");
    }
    var mfee = $("#fee").val();//need to be a number


}
