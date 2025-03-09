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
    <style>
        #input-imgpreview{
            padding:2rem;
        }
    </style>
</head>

<body>
<div class="page-heading">
      <h1>Update Election</h1>
    </div>
    <div class="input-section">
        <form method="POST" action="electionUDC.php" enctype="multipart/form-data" style="clear:both">
            <?php

            if (isset($_POST['updatebtn'])) {
                $eid = $_POST['electionid'];
                $command = " SELECT * FROM elections WHERE electionid='$eid' ";
                $query_run = mysqli_query($con, $command);
                foreach ($query_run as $row) {
            ?>
                    <div class="form-group">
                        <div class="form-group">
                            <input type="hidden" name="electionid" value="<?php echo $row['electionid'] ?>" />
                        </div>

                        <div class="input-panel">
                            <div class="input-panel-heading">
                                <h2>Update Election Banner</h2>
                            </div>
                            <div id="input-imgpreview">
                                <?php echo '<img src="../uploads/electionposter/' . $row['poster'] . '"  id="imgpreview" width="250px" height="80px"  alt="Election Banner"/>' ?>
                            </div>
                            <div class="input-panel-body">
                                <div class="inputtitle">
                                    <label for="uploadimg">Election Banner
                                        <span class="star">*</span>
                                    </label>
                                </div>
                                <div class="input-field">
                                    <input type="file" name="banner" id="uploadimg" accept="image/*" required/>
                                </div>
                            </div>

                        </div>
                        <div class="input-panel">
                            <div class="input-panel-heading">
                                <h2>Enter Election Details</h2>
                            </div>
                            <div class="input-panel-body">
                                <div class="inputtitle">
                                    <label for="electionname">Election Name
                                        <span class="star">*</span>
                                    </label>
                                </div>
                                <div class="input-field">
                                    <input type="text" name="electionname" id="electionname" value="<?php echo $row['electionname'] ?>" required />
                                </div>
                            </div>


                            <div class="input-panel-body">
                                <div class="inputtitle">
                                    <label for="pollingdate">Polling Date
                                        <span class="star">*</span>
                                    </label>
                                </div>
                                <div class="input-field">
                                    <input type="Date" name="pollingdate" id="pollingdate" required />
                                </div>
                            </div>


                            <div class="input-panel-body">
                                <div class="inputtitle">
                                    <label for="electiontype">Elecion Type
                                        <span class="star">*</span>
                                    </label>
                                </div>
                                <div class="input-field">
                                    <input type="text" id="electiontype" value="<?php echo $row['electiontype'] ?>" disabled/>
                                </div>
                            </div>

                            <div class="input-panel-body" id="election-state">
                                <div class="inputtitle">
                                    <label for="electionstate">Select the State applying For
                                        <span class="star">*</span>
                                    </label>
                                </div>
                                <div class="input-field">
                                    <input type="text" id="electiontype" value="<?php echo $row['electionstate'] ?>" disabled />
                                </div>
                            </div>

                           
                        </div>
                        <div class="input-panel-body">
                            <button type="submit" name="updateelction" id="add"  class="submitbtn">Update Election</button>
                        </div>

                <?php
                }
            }
                ?>
        </form>
    </div>
    <script src="scripts/previewimg.js"></script>
</body>

</html>