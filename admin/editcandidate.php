<?php
require '../database/security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/input.css">
</head>

<body>
<div class="page-heading">
      <h1>Update Candidate</h1>
    </div>
    <div class="input-section">
        <?php
        if (isset($_POST['updatebtn'])) {
            $tablename = $_POST['tablename'];
            $id = $_POST['candidateid'];

            $command = " SELECT * FROM $tablename WHERE candidateid='$id' ";
            $query_run = mysqli_query($con, $command);
            foreach ($query_run as $row) {

        ?>
                <form method="POST" action="CandidateUDC.php" enctype="multipart/form-data">

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
                                <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" required/>
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="fathername">Father Name
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="fathername" id="fathername" value="<?php echo $row['fathername'] ?>" required />
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
                                <input type="Date" name="dob" id="dob" value="<?php echo $row['dob'] ?>" required />
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="email">Email Id
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>" required/>
                            </div>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="mobile">Phone No
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="mobile" id="mobile" value="<?php echo $row['phoneno'] ?>" required/>
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
                                <input type="text" name="address" id="address" value="<?php echo $row['address'] ?>" required />
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
                                            <option id="<?php echo $row['statecode'] ?>" value="<?php echo $row['name'] ?>" ><?php echo $row['name'] ?></option>

                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
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
                            <label for="pin">Pin Code
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="number" name="pin" id="pin" value="<?php echo $row['zip'] ?>" required  />
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
                                <label for="electionname">Election Constesting for
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <select id="electionname" name="electionname">
                                    <option value="-1">Select Elections</option>

                                    <?php
                                    $sql = " SELECT * FROM elections ";
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
                                    <option value="-1">Party Name</option>
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

                    <div class="input-panel-body ">
                        <input type="hidden" name="cndid" value="<?php echo $id ?>" />
                        <button name="updatecandidate" type="submit" class="submitbtn">Update Candidate</button>
                    </div>
                </form>
        <?php

            }
        }
        ?>

    </div>

        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/selects.js"></script>
</body>

</html>