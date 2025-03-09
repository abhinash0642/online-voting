        <?php
        session_start();
        include 'database/connection.php';
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>VOTER REGISTRATION</title>

            <!-- Font Icon -->
            <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

            <!-- Main css -->
            <link rel="stylesheet" href="admin/css/input.css">

            <style>
                .main-container {
                    position: relative;
                    width: 100%;
                    min-height: 100vh;
                    background: var(--mainbg);
                }
                .errormsgcss{
                    color:red;
                    margin-left:1rem;
                    font-size:1.7rem;
                    font-weight:600;
                }
            </style>
        </head>

        <body>
            <div class="main-container">
                <div class="page-heading">
                    <h1>REGISTRATION</h1>
                </div>
                <div class="input-section">
                    <form method="POST" action="voterregister.php" enctype="multipart/form-data">
                        <div class="input-wrapper">

                            <div class="input-panel">
                                <div class="input-panel-heading">
                                    <h2>Upload Profile Picture</h2>
                                </div>
                                <div id="input-imgpreview">
                                    <img id="imgpreview"></img>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="voterpicupload">Profile Pic
                                            <span class="star">*</span>

                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="file" name="voterpic" id="voterpicupload" accept="image/*" required />

                                    </div>

                                </div>

                            </div>
                            <script>
                                let imgcont = document.getElementById("input-imgpreview");
                                let imgpreview = document.getElementById("imgpreview");
                                let imginput = document.getElementById("voterpicupload");
                                imginput.addEventListener("change", function(event) {
                                    if (event.target.files.length == 0) {
                                        return;
                                    }
                                    imgcont.style.display = "block";
                                    let tempurl = URL.createObjectURL(event.target.files[0]);
                                    //imgpreview.removeAttribute("src");
                                    imgpreview.setAttribute("src", tempurl);

                                });
                            </script>
                            <div class="input-panel">
                                <div class="input-panel-heading">
                                    <h2>Enter Your Personal Details</h2>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="votername">Name
                                            <span class="star">*</span>

                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="text" name="votername" id="votername" placeholder="Enter Your Name" required/>

                                       
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="fathername">Father Name
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="text" name="fathername" id="fathername" placeholder="Enter Your Father's Name" required/>
                                        
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="gender">Gender
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <select name="gender" id="gender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="dob">Date of Birth
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <?php
                                    $cd = date("d-m-Y");
                                    $before = date('Y-m-d', strtotime($cd.' - 18 year'));
                                    ?>
                                    
                                    <div class="input-field">
                                        <input type="Date" name="dob" id="dob" max="<?php echo $before ?>" required/>
                                      
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="email">Email Id
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="email" name="email" id="email" placeholder="Enter Your EmailId" required/>
                                       
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="mobile">Phone No
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="tel" name="mobile" id="mobile" placeholder="1010101010" pattern="[0-9]{10}" required/>
                                       
                                    </div>
                                </div>

                            </div>

                            <div class="input-panel">
                                <div class="input-panel-heading">
                                    <h2>Upload Document</h2>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="dobdoctype">Type of Document
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <select name="dobdoctype" id="dobdoctype" required>
                                            <option value="PAN Card">PAN card</option>
                                            <option value="Aadhar Card">Aadhar Card</option>
                                            <option value="Voter Id">Voter Id</option>
                                            <option value="Passport">Passport</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="dobproof">Date of Birth Proof
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="file" name="dobproof" id="dobproof" accept="image/*" required/>
                                    </div>
                                </div>


                            </div>

                            <div class="input-panel">
                                <div class="input-panel-heading">
                                    <h2>State</h2>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="state">Select the State applying For
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <select id="state" name="state" required>
                                            <option id="abc" selected>Select State</option>
                                            <?php
                                            $sql = " SELECT * FROM `state` ";
                                            $query = mysqli_query($con, $sql);

                                            if (mysqli_num_rows($query) > 0) {
                                                while ($state = mysqli_fetch_assoc($query)) {
                                            ?>
                                                    <option id="<?php echo $state['statecode'] ?>" value="<?php echo $state['name'] ?>"><?php echo $state['name'] ?></option>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-panel">
                                <div class="input-panel-heading">
                                    <h2>Postal Address</h2>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="district">District
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <select id="district" name="district" required>
                                            <option id="abc">Select District</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="constituency">Constituency
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <select id="constituency" name="constituency" required>
                                            <option id="abc">Select Constituency</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="house">House No
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="text" name="house" id="house" placeholder="House No" required/>
                                      
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="street">Street/Area/Locality
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="text" name="street" id="street" placeholder="Street/Area/Locality" required/>
                                        
                                     
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="pin">Pin Code
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="text" name="pin" id="pin" inputmode="numeric" pattern="[0-9]{6}" placeholder="098765" required/>
                                      
                                    </div>
                                </div>


                            </div>
                            <div class="input-panel">
                                <div class="input-panel-heading">
                                    <h2>Upload Document</h2>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="addprftype">Type of Document
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <select name="addprftype" id="addprftype" required>
                                            <option value="PAN Card">PAN card</option>
                                            <option value="Aadhar Card">Aadhar Card</option>
                                            <option value="Voter Id">Voter Id</option>
                                            <option value="Passport">Passport</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-panel-body">
                                    <div class="inputtitle">
                                        <label for="addproof">Address Proof
                                            <span class="star">*</span>
                                        </label>
                                    </div>
                                    <div class="input-field">
                                        <input type="file" name="addproof" id="addproof" accept="image/*" required/>
                                    </div>
                                </div>


                            </div>
                            <div class="input-panel-body">
                                <button type="submit" name="register" class="submitbtn">Register</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    jQuery('#state').change(function() {
                        var id = jQuery(this).children(":selected").attr("id");
                        if (id == 'abc') {
                            jQuery('#district').html('<option id="abc">Select District</option>');
                            jQuery('#constituency').html('<option id="abc">Select Constituency</option>');
                        } else {
                            jQuery('#district').html('<option id="abc">Select District</option>');
                            jQuery('#constituency').html('<option id="abc">Select Constituency</option>');
                            jQuery.ajax({

                                type: 'POST',
                                url: 'code.php',
                                data: 'id=' + id + '&type=district',
                                success: function(result) {

                                    jQuery('#district').append(result);

                                }

                            });
                        }
                    });
                    jQuery('#district').change(function() {
                        var id = jQuery(this).children(":selected").attr("id");
                        if (id == 'abc') {
                            jQuery('#constituency').html('<option id="abc">Select Constituency</option>');
                        } else {
                            jQuery('#constituency').html('<option id="abc">Select Constituency</option>');
                            jQuery.ajax({

                                type: 'POST',
                                url: 'code.php',
                                data: 'id=' + id + '&type=constituency',
                                success: function(result) {
                                    jQuery('#constituency').append(result);
                                }

                            });
                        }
                    });

                });
            </script>
        </body>

        </html>