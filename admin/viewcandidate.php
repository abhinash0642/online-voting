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
<div class="main-container">
    <a href="candidates.php">Back</a>
    <div class="input-section">

        <?php
        if (isset($_POST['viewbtn'])) {
            $tablename = $_POST['tablename'];
            $id = $_POST['candidateid'];

            $command = " SELECT * FROM $tablename WHERE candidateid='$id' ";
            $query_run = mysqli_query($con, $command);
            foreach ($query_run as $row) {

        ?>
                <div class="input-panel-body">
                    <div class="inputtitle">
                        <?php echo '<img src="../uploads/candidateavatar/' . $row['avatar'] . '" class="imgpreview" alt="Candidate Avatar"/>' ?>
                    </div>

                </div>

                <div class="input-panel">
                    <div class="input-panel-heading">
                        <h2>Personal Details</h2>
                    </div>
                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="name">Name
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" disabled />
                        </div>
                    </div>

                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="fathername">Father Name
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="fathername" id="fathername" value="<?php echo $row['fathername'] ?>" disabled />
                        </div>
                    </div>
                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="gender">Gender
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="gender" id="gender" value="<?php echo $row['gender'] ?>" disabled />
                        </div>
                    </div>
                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="dob">Date of Birth
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="Date" name="dob" id="dob" value="<?php echo $row['dob'] ?>" disabled />
                        </div>
                    </div>
                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="email">Email Id
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="email" id="email" value="<?php echo $row['email'] ?>" disabled />
                        </div>
                    </div>
                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="mobile">Phone No
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="mobile" id="mobile" value="<?php echo $row['phoneno'] ?>" disabled />
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
                            <input type="text" name="address" id="address" value="<?php echo $row['address'] ?>" disabled />
                        </div>
                    </div>
                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="state">State
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="state" id="state" value="<?php echo $row['state'] ?>" disabled />
                        </div>
                    </div>
                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="districtname">District
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="district" id="district" value="<?php echo $row['district'] ?>" disabled />

                        </div>
                    </div>
                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="pin">Pin Code
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="pin" id="pin" value="<?php echo $row['zip'] ?>" disabled />
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
                            <input type="text" name="constituency" id="constituency" value="<?php echo $row['constituency'] ?>" disabled />

                        </div>
                    </div>


                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="contestingfor">Election Constesting for
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="contestingfor" id="contestingfor" value="<?php echo $row['contestingfor'] ?>" disabled />

                        </div>
                    </div>
                    <div class="input-panel-body">
                        <div class="inputtitle">
                            <label for="partyname">Party Name
                                <span class="star">*</span>
                            </label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="partyname" id="partyname" value="<?php echo $row['partyname'] ?>" disabled />

                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

</div>
</div>
</body>

</html>