function memType(mtype) {
    // 1 = member , 2= trainder
    $("#selmemtype").val(mtype);

}
//check if it display the right value
function showID() {
    var selectedValue = $("#selmemtype").val();
    //alert(singleValues);

}

//job seeker registration
function formSubmitJ() {
    //var name = document.getElementById("name").value;
    var jusername = $("#jusername").val();
    var pwd = $("#jpassword").val();
    var fname = $("#jfullname").val();
    var jemail = $("#jemail").val();
    var jmobileno = $("#jmobileno").val();
    var qualification = $("#qualification").val();
    var skills = $("#skills").val();
    var starttime = $("#starttime").val();
    var endtime = $("#endtime").val();

    var dataString = '&username=' + jusername + '&pwd=' + pwd + '&fname=' + fname + '&jemail=' + jemail + '&jmobileno=' + jmobileno + '&qualification=' + qualification + '&skills=' + skills + '&starttime=' + starttime + '&endtime=' + endtime;
    $.ajax({
        type: "POST",
        url: "jobseekersignup.php",
        data: dataString,
        success: function (response) {
            //after success display the msg
            alert("Successfully Registered!");
            window.location = "login.php";
        }

    });
    event.preventDefault();

}
//employer registration
function formSubmitE() {

    //var name = document.getElementById("name").value;
    var name = $("#eusername").val();
    var pwd = $("#epassword").val();
    var orgname = $("#orgname").val();
    var industry = $("#industry").val();
    //var type = $("#type").val();
    var empemail = $("#empemail").val();
    var emobileno = $("#emobileno").val();

    var dataString = '&username=' + name + '&pwd=' + pwd + '&orgname=' + orgname + '&industry=' + industry + '&empemail=' + empemail + '&emobileno=' + emobileno;
    $.ajax({
        type: "POST",
        url: "employersignup.php",
        data: dataString,
        success: function (response) {
            //after success display teh msg
            alert("Successfully Registered!");
            window.location = "login.php";
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
function validateRecordTraining() {
    var jtitle = $("#jobtitle").val();// need to be string
    if (!isNaN(mjitle)) {
        $("#jtitle").text("Title should be a text!");
    }else{
        $("#jtitle").text("");
    }
    var jdescription = $("#jobdescription").val(); //need to be valid date
    if (!isNaN(jdescription)) {
        $("#jdescription").text("Please enter a description!");
    }else{
        $("#jdescription").text("");
    }

    var reqqualification = $("#reqqualification").val();// need to be string
    if (!isNaN(reqqualification)) {
        $("#reqqualification").text("Please enter required qualification!");
    }else{
        $("#reqqualification").text("");
    }
    var reqskills = $("#reqskills").val(); //need to be valid date
    if (!isNaN(reqskills)) {
        $("#reqskills").text("Please enter required skills!");
    }else{
        $("#reqskills").text("");
    }


}
