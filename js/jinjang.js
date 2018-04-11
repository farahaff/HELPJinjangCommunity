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

    if (username==""){
      return false;
    }
    else if (password==""){
      return false;
    }
    else if (fullName==""){
      return false;
    }
    else if (email==""){
      return false;
    }
    else if (mobileNo==""){
      return false;
    }
    else if (qualifications==""){
      return false;
    }
    else if (skills==""){
      return false;
    }

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
    var ctype = $("#ctype").val();
    var empEmail = $("#empEmail").val();
    var phoneNo = $("#phoneNo").val();

    if (eUsername==""){
      return false;
    }
    else if (ePassword==""){
      return false;
    }
    else if (orgName==""){
      return false;
    }
    else if (industry==""){
      return false;
    }
    else if (empEmail==""){
      return false;
    }
    else if (phoneNo==""){
      return false;
    }


    var dataString = '&eUsername=' + eUsername + '&ePassword=' + ePassword + '&orgName=' + orgName + '&industry=' + industry + '&empEmail=' + empEmail + '&phoneNo=' + phoneNo + '&ctype=' + ctype;
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

function test() {
    var username = $("#username").val();// need to be string
    alert("Title");
    if (!isNaN(username)) {
        $("#username").text("Title should be a text!");
    } else {
        $("#jtitle").text("");
    }
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
function loadModel(jobID) {
    var dataString = 'jobID=' + jobID
    $.ajax({
        type: "POST",
        url: "applyJobModal.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();
}

//register user for the seesion
function applyJob(userID, jobID) {
    var dataString = 'userID=' + userID + '&jobID=' + jobID;
    $.ajax({
        type: "POST",
        url: "applyJob.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert(response);
        }

    });
    event.preventDefault();
}
// update trainer submited data
function editJobModal(jobID) {
    var dataString = 'jobID=' + jobID;
    $.ajax({
        type: "POST",
        url: "loadEditJobModal.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();

}
//update trainer set date through model
function editJob(jobID) {
    var jobtitle = $("#jobtitle").val();
    var jobdescription = $("#jobdescription").val();
    var reqqualification = $("#reqqualification").val();
    var reqskills = $("#reqskills").val();
    var starttime = $("#starttime").val();
    var endtime = $("#endtime").val();
    var address = $("#address").val();
    var salary = $("#salary").val();
    var preferences = $("#preferences").val();

    var dataString = 'jobID=' + jobID + '&jobtitle=' + jobtitle + '&jobdescription=' + jobdescription + '&reqqualification=' + reqqualification + '&reqskills=' + reqskills + '&starttime=' + starttime + '&endtime=' + endtime + '&address=' + address + '&salary=' + salary + '&preferences=' + preferences;
    $.ajax({
        type: "POST",
        url: "editJobSubmission.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert("Job Updated Successfully.");
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
function validateJobTitle() {

    var jobtitle = $("#jobtitle").val(); //need to be valid date
    if (!isNaN(jobtitle)) {
        $("#jtitle").text("Please enter the job title.");
    } else {
        $("#jtitle").text("");
    }
}

function validateJobDescription() {


    var jobdescription = $("#jobdescription").val(); //need to be valid date
    if (!isNaN(jobdescription)) {
        $("#jdescription").text("Please enter the job description.");
    } else {
        $("#jdescription").text("");
    }
}

function validateJobQualification() {

    var reqqualification = $("#reqqualification").val();// need to be string
    if (!isNaN(reqqualification)) {
        $("#rqualification").text("Please enter the required qualifications.");
    } else {
        $("#rqualification").text("");
    }
}

function validateJobSkills() {
    var reqskills = $("#reqskills").val(); //need to be valid date
    if (!isNaN(reqskills)) {
        $("#rskills").text("Please enter the required skills.");
    } else {
        $("#rskills").text("");
    }
}

function validateJobTimings() {
    var startTime = $("#starttime").val(); //need to be valid date
    if (!isNaN(startTime)) {
        $("#sTime").text("Please enter the job timings.");
    } else {
        $("#sTime").text("");
    }
    var endTime = $("#endtime").val(); //need to be valid date
    if (!isNaN(endTime)) {
        $("#sTime").text("Please enter the job timings.");
    } else {
        $("#sTime").text("");
    }
}

function validateJobAddress() {
    var address = $("#address").val(); //need to be valid date
    if (!isNaN(address)) {
        $("#jaddress").text("Please enter the job address.");
    } else {
        $("#jaddress").text("");
    }
}
/*
function validateJobSalary() {
    var salary = $("#salary").val(); //need to be valid date
    if (!isNaN(salary)) {
        $("#jsalary").text("Please enter the job salary.");
    } else {
        $("#jsalary").text("");
    }
}
*/

function validateJobPreferences() {
    var preferences = $("#preferences").val(); //need to be valid date
    if (!isNaN(preferences)) {
        $("#jpreferences").text("Please enter any job preferences.");
    } else {
        $("#jpreferences").text("");
    }
}
