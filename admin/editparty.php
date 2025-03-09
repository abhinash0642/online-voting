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
      <h1>Update Political Party</h1>
    </div>

<div class="input-section">
    <form method="POST" action="partyUDC.php" enctype="multipart/form-data" style="clear:both">
        <?php

        if (isset($_POST['updatebtn'])) {
            $pid = $_POST['id'];

            $command = " SELECT * FROM politicalparty WHERE partycode='$pid' ";
            $query_run = mysqli_query($con, $command);
            foreach ($query_run as $row) {

        ?>
                <div class="form-group">
                    <div class="form-group">
                <input type="hidden" name="id" class="inputbtn" value="<?php echo $row['partycode'] ?>" />    
                    </div>

                    <div class="input-panel">
                        <div class="input-panel-heading">
                            <h2>Update Party Symbol</h2>
                        </div>
                        <div id="input-imgpreview">
                            <?php echo '<img src="../uploads/partysymbols/' . $row['symbol'] . '" id="imgpreview" width="85px" height="85px"  alt="Party Symbol"/>' ?>
                    </div>

                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="uploadimg">Party Symbol
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="file" name="symbol" id="uploadimg" required accept="image/*" />
                            </div>
                        </div>

                    </div>

                    <div class="input-panel">
                        <div class="input-panel-heading">
                            <h2>Update Party Details</h2>
                        </div>
                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="partyname">Party Name</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="partyname" class="inputbtn" id="partyname" value="<?php echo $row['partyname'] ?>" required />
                            </div>
                        </div>

                        <div class="input-panel-body">
                            <div class="inputtitle">
                                <label for="Partytype">Party Type</label>
                            </div>
                            <div class="input-field">
                                <select name="partytype" id="partytype">
                                    <option value="National">National</option>
                                    <option value="State">State</option>
                                </select>
                            </div>
                        </div>
                        <style>
                            #party-state {
                                display: none;
                            }
                        </style>
                        <div class="input-panel-body" id="party-state">
                            <div class="inputtitle">
                                <label for="partystate">Select the Party State
                                    <span class="star">*</span>
                                </label>
                            </div>
                            <div class="input-field">
                                <select id="partystate" name="partystate">
                                    <option value="-1">Select State</option>
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
                        <script>
                            let partyty = document.getElementById("partytype");
                            // const district = document.getElementsByClassName('dist');
                            let prstate = document.getElementById('party-state');

                            partyty.onchange = function() {
                                var getval = partyty.value;
                                if (getval == "State") {
                                    prstate.style.display = "flex";
                                } else {
                                    prstate.style.display = "none";
                                }
                            }
                        </script>
                    </div>

                   
                    <div class="input-panel-body">
            <button type="submit" name="updateparty" id="add"  class="submitbtn">Update Party</button>
          </div>

    </form>
</div>
<?php
            }
        }
?>
<script src="scripts/previewimg.js"></script>
</body>
</html>