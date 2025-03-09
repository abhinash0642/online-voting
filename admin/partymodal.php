<?php
require '../database/security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Party</title>
  <link rel="stylesheet" href="css/input.css">
</head>

<body>


  <!--  Add Voter Modal   -->
  <div class="main-container">

  <div class="page-heading">
      <h1>Add Party</h1>
    </div>
    <div class="input-section">
      <form method="POST" action="partyUDC.php" enctype="multipart/form-data">
        <div class="input-wrapper">
          <div class="input-panel">
            <div class="input-panel-heading">
              <h2>Upload Party Symbol</h2>
            </div>
            <div id="input-imgpreview">
              <img id="imgpreview"></img>
            </div>
            <div class="input-panel-wrapper">
              <div class="input-panel-body">
                <div class="inputtitle">
                  <label for="uploadimg">Party Symbol
                    <span class="star">*</span>
                  </label>
                </div>
                <div class="input-field">
                  <input type="file" name="symbol" id="uploadimg" accept="image/*" required/>
                </div>
              </div>
            </div>
          </div>

          <div class="input-panel">
            <div class="input-panel-heading">
              <h2>Enter Party Details</h2>
            </div>
            <div class="input-panel-body">
              <div class="inputtitle">
                <label for="partyname">Party Name
                  <span class="star">*</span>
                </label>
              </div>
              <div class="input-field">
                <input type="text" name="partyname" id="partybname" placeholder="Enter Party Name" required/>
              </div>
            </div>

            <div class="input-panel-body">
              <div class="inputtitle">
                <label for="partytype">Party Type
                  <span class="star">*</span>
                </label>
              </div>
              <div class="input-field">
                <select name="partytype" id="partytype" required>
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
                                <select id="partystate" name="partystate" required>
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
            <button type="submit" name="addparty" class="submitbtn">Register</button>
          </div>
        </div>
      </form>

    </div>

  </div>
</body>

</html>