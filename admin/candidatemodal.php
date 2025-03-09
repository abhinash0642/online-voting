<?php
require '../database/security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Candidate</title>
    <link href="css/input.css" rel="stylesheet">
       <!-- add jquery cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!--  Add Voter Modal   -->
    <div class="main-container">
        <div class="page-heading">
            <h1>Add New Candidates</h1>
        </div>
        <!-- Modal content -->

        <div class="input-section">

            <!--modal to add new candidates-->
            <form method="POST" action="insertcandidate.php" enctype="multipart/form-data">
                <div class="input-wrapper">
                    <div class="input-panel">
                        <div class="input-panel-heading">
                            <h2>Upload Profile Picture</h2>
                        </div>
                        <div class="input-panel-wrapper">
                            <div class="input-panel-body">
                                <div class="inputtitle">
                                    <label for="avatar">Profile Pic
                                        <span class="star">*</span>
                                    </label>
                                </div>
                                <div class="input-field">
                                    <input type="file" name="avatar" id="avatar" accept="image/*" required/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-panel">
                        <div class="input-panel-heading">
                            <h2>Enter Your Personal Details</h2>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="name">Name
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="name" id="name" placeholder="Enter candidate Name" required />
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="fathername">Father Name
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="fathername" id="fathername" placeholder="Enter Candidate Father's Name" required/>
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
                            <div class="input-field">
                                <input type="Date" name="dob" id="dob" required/>
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="email">Email Id
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="email" name="email" id="email" placeholder="qwert@mno.com" required/>
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="mobile">Phone No
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="tel" name="mobile" id="mobile" pattern="[0-9]{10}" placeholder="9000000009" required/>
                            </div>
                        </div>

                    </div>

                    <div class="input-panel">
                        <div class="input-panel-heading">
                            <h2>Postal Address</h2>
                        </div>

                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="address">Address
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="address" id="address" placeholder="Address" required />
                            </div>
                        </div>


                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="state">Select the State applying For
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <select id="state" name="state">
                                    <option id="abc">Select State</option>
                                    <?php
                                    $sql = " SELECT * FROM `state` ";
                                    $query = mysqli_query($con, $sql);

                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <option id="<?php echo $row['statecode'] ?>" value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>

                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="district">State/UT
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
                                <label for="pin">Pin Code
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="pin" id="pin" placeholder="854762" required/>
                            </div>
                        </div>

                    </div>



                    <div class="input-panel">
                        <div class="input-panel-heading">
                            <h2>Election Details</h2>
                        </div>

                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="constituency">Constituency
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <select id="constituency" name="constituency">
                                    <option id="abc">Select Constituency</option>
                                </select>
                            </div>
                        </div>


                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="contestingfor">Election Constesting for
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <select id="contestingfor" name="contestingfor">
                                    <option selected>Select Elections</option>
                                    <?php
                                    $sql = " SELECT * FROM elections  where status='active' ";
                                    $query = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <option value="<?php echo $row['electionname'] ?>"><?php echo $row['electionname'] ?></option>

                                    <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="partyname">Party Name
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <select id="partyname" name="partyname">
                                    <option value="-1" Selected>Select Party Name</option>
                                    
                                    <?php
                                    $sql = " SELECT * FROM politicalparty ";
                                    $query = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <option value="<?php echo $row['partyname'] ?>"><?php echo $row['partyname'] ?></option>

                                    <?php
                                        }
                                    }
                                    ?>
                                  
                                </select>
                            </div>
                        </div>


                    </div>

                    <div class="input-panel-body">
                        <button type="submit" name="addcandidate" class="submitbtn">Register</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script src="scripts/selects.js"></script>
</body>

</html>