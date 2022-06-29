
var request;

$("#signupform").submit(function (event) {

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();
    // serializedData.append("signupform1");
    document.getElementById('cloc').click();
    document.getElementById("loader1").style.visibility = "visible";
    $.ajax({
        type: "post",
        data: serializedData,
        url: "controller.php",
        success: function (result) {
            $("#div11").html(result);
            document.getElementById("loader1").style.visibility = "hidden";
        }
    });
});

$("#login_form").submit(function (event) {
// alert("asdfas");
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();
    // serializedData.append("signupform1");
    document.getElementById('cloc1').click();
    document.getElementById("loader1").style.visibility = "visible";
    $.ajax({
        type: "post",
        data: serializedData,
        url: "controller.php",
        success: function (result) {
            $("#div11").html(result);
            document.getElementById("loader1").style.visibility = "hidden";
        }
    });
});

$("#agent_login").submit(function (event) {
    // alert("asdfas");
        // Prevent default posting of form - put here to work in case of errors
        event.preventDefault();
    
        // Abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);
    
        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");
    
        // Serialize the data in the form
        var serializedData = $form.serialize();
        // serializedData.append("signupform1");
        document.getElementById('cloc2').click();
        document.getElementById("loader1").style.visibility = "visible";
        $.ajax({
            type: "post",
            data: serializedData,
            url: "app/logincall.php",
            success: function (result) {
                $("#div11").html(result);
                document.getElementById("loader1").style.visibility = "hidden";
            }
        });
});

