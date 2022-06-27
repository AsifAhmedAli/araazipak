<?php
include("db.php");
  session_start();
  $userloggedin = 0;
  $loggedin = 0;
  if(!empty($_SESSION['email1'])){
    $loggedin = 1;
        // echo "<script>alert('asdfasdf');</script>";
  }
  if(!empty($_SESSION['employee_username1'])){
      $userloggedin = 1;
  }
?>
<div class="bbc1 mt-0 mt-md-4">
    <div class="row mx-0">
        <div class="col-12">
            <nav class="navbar navbar-light navbar-expand-lg mynav">
                <div class="container">
                    <div class="d-flex flex-lg-row flex-column w-100 align-items-center justify-content-between">
                        <div class="d-flex align-items-center justify-content-between w-100 me-3">
                            <a class="navbar-brand" href="./index.php"><img class="col-12" src="./img/3.png" /></a>
                            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navcol-1" aria-controls="navcol-1" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="d-flex align-items-center w-100">
                            <div class="collapse navbar-collapse my-2 my-lg-0 me-lg-4 m-0" id="navcol-1">
                                <ul class="navbar-nav ms-auto text-center text-md-start">
                                    <!-- <li class="nav-item">
                                        <a class="nav-link active px-md-2 px-lg-3" href="./product_tour.php">Product
                                            Tour</a>
                                    </li> -->
                                    <?php
                                    if($loggedin == 1){
                                        ?>
                                    <li class="nav-item">
                                        <a class="nav-link active  px-md-2 px-lg-3" href="./app/admin">Dashboard</a>
                                    </li>
                                    <?php
                                    }
                                    if($userloggedin == 1){
                                        ?>
                                    <li class="nav-item">
                                        <a class="nav-link active  px-md-2 px-lg-3" href="./app">Dashboard</a>
                                    </li>
                                    <?php
                                    }

                                    if($loggedin == 0 and $userloggedin == 0){
                                        ?>
                                    <li class="nav-item">
                                        <a class="nav-link active  ps-md-2 ps-lg-3 pe-lg-4" href="#"
                                            data-bs-toggle="modal" data-bs-target="#exampleModall1">Sign Up</a>
                                    </li>
                                    <?php
                                    }
                                    if($loggedin == 0 and $userloggedin == 0){
                                        ?>
                                    <li class="nav-item">
                                        <a class="nav-link active  px-md-2 px-lg-3" href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModall2">Agent Login</a>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <?php
                                    if($loggedin == 0 and $userloggedin == 0){
                                        ?>
                                <button class="btn btn-success px-4 mk ms-auto col-12 col-lg-3" type="button"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Login
                                </button>
                                <?php
                                    }
                                    if($loggedin == 1 or $userloggedin == 1){
?>
                                <ul class="navbar-nav text-center text-md-start">
                                    <li class="nav-item">
                                        <a class="nav-link active  ps-md-2 ps-lg-3 pe-lg-4"
                                            href="./logout.php">Logout</a>
                                    </li>
                                </ul>
                                <?php                                        
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
                                <!-- Login Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="text-end m-3">
                                                <button type="button" id="cloc1" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container px-2 px-md-2">
                                                    <div class="row mx-auto">
                                                        <div class="col-12 px-0">
                                                            <div class="col-12 mx-auto px-md-5 py-5 bbs px-2 my-5">
                                                                <form id="login_form">
                                                                    <div>
                                                                        <p class="qc text-center text-md-start"
                                                                            style="font-size: 35px">
                                                                            <strong>Log In</strong>
                                                                        </p>
                                                                    </div>
                                                                    <div>
                                                                        <p class="text-center text-md-start"
                                                                            style="font-size: 25px">
                                                                            <strong>Welcome back!</strong>
                                                                        </p>
                                                                    </div>
                                                                    <div class="my-4">
                                                                        <input class="form-control GTY py-3"
                                                                            type="email" name="loginemail"
                                                                            placeholder="Email Address" />
                                                                    </div>
                                                                    <div class="mt-4">
                                                                        <input class="form-control GTY py-3"
                                                                            type="password" name="loginpassword"
                                                                            placeholder="Password" />
                                                                    </div>
                                                                    <div class="row col-12 mx-0 mt-2">
                                                                        <div class="col-6 jujq px-0">
                                                                            <a href=""
                                                                                class="gtqm text-start float-start text-decoration-none">Forgot
                                                                                password?</a>
                                                                        </div>
                                                                        <!-- <div class="col-6 jujq px-0">
                                                                                <a href=""
                                                                                    class="text-end gtqm text-decoration-none">Support</a>
                                                                            </div> -->
                                                                    </div>
                                                                    <button
                                                                        class="btn btn-success col-12 my-3 py-3 bbvn"
                                                                        type="submit" style="font-size: 18px">
                                                                        Login
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- .....................end............................. -->
                                </div>
                                <!-- Demo Modal -->
                                <div class="modal fade" id="exampleModall" tabindex="-1"
                                    aria-labelledby="exampleModalLabell" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="text-end m-3">
                                                <button type="button" id="cloc3" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12 px-2 px-md-3">
                                                    <div
                                                        class="c mx-auto px-md-3 px-2 text-center text-md-start">
                                                        <div>
                                                                <p class="zx text-center text-md-start"
                                                                    style="font-size: 25px">
                                                                    Developers, Real-Estate Marketers, Property Dealers, and Real-Estate Agencies
                                                                    <br> Request a Demonstration
                                                                </p>
                                                            </div>
                                                        <form id="demonstration_form">

                                                            <!-- <div>
                                                                <p class="tio text-center text-md-start">
                                                                    Or
                                                                    <span style="text-decoration: underline">get
                                                                        in touch</span>
                                                                    with our team to find out
                                                                    more.<br />
                                                                </p>
                                                            </div> -->
                                                            <div class="my-4 mt-5">
                                                                <input class="form-control GTY py-3" name="fullname" type="text"
                                                                    placeholder="Full Name" required/>
                                                            </div>
                                                            <div class="mt-4">
                                                                <input class="form-control GTY py-3" name="email1" type="email"
                                                                    placeholder="E-mail Address" required/>
                                                            </div>
                                                            <div class="mt-4">
                                                                <input class="form-control GTY py-3" name="phone1" type="tel"
                                                                    placeholder="Contact Number" required/>
                                                            </div>
                                                            <div class="mt-4">
                                                            <input class="form-control GTY py-3" name="city1" type="text"
                                                                    placeholder="City" required/>
                                                                <!-- <div class="mt-4">
                                                                    <input class="form-control GTY py-3" type="email"
                                                                        placeholder="COUNTRY" />
                                                                </div> -->
                                                            </div>
                                                            <!-- <div class="row col-12 my-4 mx-0">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="formCheck-2" /><label
                                                                        class="form-check-label px-2"
                                                                        for="formCheck-2">By submitting
                                                                        the above, you have read,
                                                                        understood and agreed to our
                                                                        Terms of use,
                                                                        Privacy policy and Privacy
                                                                        Collection
                                                                        Notice.</label>
                                                                </div>
                                                            </div> -->
                                                            <input type="text" style="visibility: hidden;" name="demo_request">
                                                            <button class="btn btn-success col-12 my-3 py-3 tz"
                                                                type="submit">
                                                                Proceed
                                                            </button>
                                                        </form>
                                                        <div style="visibility: hidden;" id="demodetails">
                                                        <hr>
                                                            <p> URL: <a href="https://mexil.it/" target="_blank">URL to the demo</a></p>
                                                            <p> Email: asif@mexil.it</p>
                                                            <p> Password: 123456</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sign Up Modal -->
                                <div class="modal fade" id="exampleModall1" tabindex="-1"
                                    aria-labelledby="exampleModalLabell" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="text-end m-3">
                                                <button type="button" id="cloc" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>


                                            <div class="modal-body">

                                                <div class="col-12 px-2 px-md-3">
                                                    <h2 class="text-center">Registration</h2>
                                                    <div class="text-center text-md-start">
                                                        <form id="signupform">
                                                            <div class="mb-3">
                                                                <label for="fullname" class="form-label">Full
                                                                    Name</label>
                                                                <input type="text" class="form-control" name="fullname"
                                                                    id="fullname" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Email
                                                                    address</label>
                                                                <input type="email" class="form-control" required
                                                                    name="email1" id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp">
                                                                <div id="emailHelp" class="form-text">We'll never share
                                                                    your email with anyone else.</div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Password</label>
                                                                <input type="password" name="pass1" required
                                                                    class="form-control" id="exampleInputPassword1">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="number" class="form-label">Contact
                                                                    Number</label>
                                                                <input type="tel" name="cnumber" required
                                                                    class="form-control" id="number">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="companyname" class="form-label">Company
                                                                    Name</label>
                                                                <input type="text" name="companyname" required
                                                                    class="form-control" id="companyname"
                                                                    aria-describedby="companyname">
                                                                <div id="companyname" class="form-text">Company name
                                                                    will be used by your agents to login.</div>
                                                            </div>
                                                            <input type="text" style="visibility: hidden;"
                                                                name="signupform1" value="asdf">
                                                            <br>
                                                            <button type="submit"
                                                                class="btn btn-md btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- agent login modal -->
                                <div class="modal fade" id="exampleModall2" tabindex="-1"
                                    aria-labelledby="exampleModalLabell" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="text-end m-3">
                                                <button type="button" id="cloc2" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>


                                            <div class="modal-body">

                                                <div class="col-12 px-2 px-md-3">
                                                    <h2 class="text-center">Agent Login</h2>
                                                    <div class="text-center text-md-start">
                                                        <form id="agent_login">
                                                            <div class="mb-3">
                                                                <select class="form-select" name="companyselect"
                                                                    aria-label="Default select example">
                                                                    <option selected>Select Your Company</option>
                                                                    <?php
                                                                                    $sql = "CALL ".$seleced_db.".select_company_with_db_name()";
                                                                                    $result = $conn1->query($sql);

                                                                                    if ($result->num_rows > 0) {
                                                                                      // output data of each row
                                                                                      while($row = $result->fetch_assoc()) {
                                                                                          ?>
                                                                    <option value="<?php echo $row['company']; ?>">
                                                                        <?php echo $row['company']." [".$row['full_name']."]"; ?>
                                                                    </option>
                                                                    <?php
                                                                                      }
                                                                                    }
                                                                                ?>

                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Email
                                                                    address</label>
                                                                <input type="email" class="form-control" required
                                                                    name="agentloginemail">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Password</label>
                                                                <input type="password" name="agentloginpass" required
                                                                    class="form-control">
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-md btn-primary">Login</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Payment Modal-->
                                <div class="modal fade" id="exampleModalll" tabindex="-1" aria-labelledby="exampleModalLabelll"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="container px-0 px-md-2">
                                                <div class="row mx-auto">
                                                <div class="col-12 px-0">
                                                    <div class="col-12 mx-auto px-md-5 bbs px-2 my-5 py-md-5 bbs py-4 mb-5">
                                                        <form style="font-size: 20px">
                                                    <div>
                                                    <p class="lo text-center text-md-start" style="font-size: 30px">
                                                        <strong>Add Payment Method</strong><br />
                                                    </p>
                                                    </div>
                                                    <div class="row col-12 mx-0">
                                                    <div id="demo" class="col-2 tro mx-auto mx-md-0 yoot">
                                                        <img src="assets/img/Icon%20awesome-cc-visa.png" />
                                                    </div>
                                                    <div class="col-2 tis mx-2 mx-md-3 mx-auto yoot">
                                                        <img src="assets/img/Mastercard-logo.png" />
                                                    </div>
                                                    <div class="col-2 qal hola mx-auto mx-md-0 yoot">
                                                        <img src="assets/img/Icon%20metro-paypal.png" />
                                                    </div>
                                                    </div>
                                                    <div class="my-4">
                                                    <input class="form-control GTY py-3" type="email" placeholder="CARD NUMBER" />
                                                    </div>
                                                    <div class="mt-4">
                                                    <input class="form-control GTY py-3" type="email" placeholder="CARDHOLDER NAME" />
                                                    </div>
                                                    <div class="row col-12">
                                                    <div class="mt-4 col-6">
                                                        <input class="form-control GTY py-3" type="email" placeholder="SORT CODE" />
                                                    </div>
                                                    <div class="mt-4 col-6">
                                                        <input class="form-control GTY py-3" type="email" placeholder="DATE" />
                                                    </div>
                                                    </div>
                                                    <div class="row col-12 mx-0 my-5">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="formCheck-1" /><label
                                                        class="form-check-label px-2 ioioi" for="formCheck-1"
                                                        style="font-size: 16px">SAVE FOR THE NEXT PAYMENT</label>
                                                    </div>
                                                    </div>
                                                    <button class="btn btn-success col-12 my-2 py-3 ere" type="submit">
                                                    CREATE
                                                    </button>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
<div id="div11" class="d-none"></div>
<div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
<script>
    $("#demonstration_form").submit(function (event) {
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
        document.getElementById('cloc3').click();
        document.getElementById("loader1").style.visibility = "visible";
        $.ajax({
            type: "post",
            data: serializedData,
            url: "controller.php",
            success: function (result) {
                $("#div11").html(result);
                document.getElementById("demonstration_form").style.display = "none";
                document.getElementById("demodetails").style.visibility = "visible";
                document.getElementById("demobutton").click();
                document.getElementById("loader1").style.visibility = "hidden";
            }
        });
});

</script>