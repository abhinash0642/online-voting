<?php
require '../database/security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Voter</title>
    <link rel="stylesheet" href="css/input.css">
    <!-- add jquery cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="main-container">
    <div class="page-heading">
      <h1>Add New Voter</h1>
    </div>
        <div class="input-section">
            <form method="POST" action="insertvoter.php" enctype="multipart/form-data">
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
                                <label for="uploadimg">Profile Pic
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="file" name="voterpic" id="uploadimg" accept="image/*" required />
                            </div>
                        </div>
                    </div>
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
                                <input type="text" name="votername" id="votername" placeholder="Enter Voter Name" required/>
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="fathername">Father's Name
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="fathername" id="fathername" placeholder="Enter Voter Father's Name" required/>
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="gender">Gender
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <select name="gender" id="gender">
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
                                <label for="emailid">Email Id
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="email" name="email" id="emailid" placeholder="abcname@xyz.com" required/>
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="mobile">Phone No
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="tel" name="mobile" pattern="[0-9]{3}" id="mobile" placeholder="0000000000" required />
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
                                <select id="state" name="state">
                                    <option value="-1">Select State</option>
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
                                <select id="district" name="district">
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
                                <select id="constituency" name="constituency">
                                    <option value="abc">Select Constituency</option>

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
                                <input type="text" name="pin" id="pin" placeholder="987654" required/>
                            </div>
                        </div>
                    </div>


                    <div class="input-panel-body">
                            <button type="submit" name="addvoter" class="submitbtn">Register</button>
                        </div>

                    <!-- input wrapper ended -->
                </div>
            </form>
            <!-- input section ended -->
        </div>
        <!--main Container ended -->
    </div>
    <script src="scripts/selects.js"></script>
   
</body>

</html>