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
function formSubmitJS() {
    //var name = document.getElementById("name").value;
    var username = $("#username").val();
    var password = $("#password").val();
    var fullName = $("#fullName").val();
    var email = $("#email").val();
    var mobileNo = $("#mobileNo").val();
    var qualifications = $("#qualifications").val();
    var skills = $("#skills").val();
    var startTime = $("#startTime").val();
    var endTime = $("#endTime").val();
    var preferredSalary = $("#preferredSalary").val();
    var healthConditions = $("#healthConditions").val();

    var dataString = '&username=' + username + '&password=' + password + '&fullName=' + fullName + '&email=' + email + '&mobileNo=' + mobileNo + '&qualifications=' + qualifications + '&skills=' + skills + '&startTime=' + startTime + '&endTime=' + endTime + '&preferredSalary=' + preferredSalary + '&healthConditions=' + healthConditions;
    $.ajax({
        type: "POST",
        url: "jobSeekerSignup.php",
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
    var eUsername = $("#eUsername").val();
    var ePassword = $("#ePassword").val();
    var orgName = $("#orgName").val();
    var industry = $("#industry").val();
    //var type = $("#type").val();
    var empEmail = $("#empEmail").val();
    var phoneNo = $("#phoneNo").val();

    var dataString = '&eUsername=' + eUsername + '&ePassword=' + ePassword + '&orgName=' + orgName + '&industry=' + industry + '&empEmail=' + empEmail + '&phoneNo=' + phoneNo;
    $.ajax({
        type: "POST",
        url: "employerSignup.php",
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
