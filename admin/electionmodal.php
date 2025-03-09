<?php
require '../database/security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Election</title>
    <link href="css/input.css" rel="stylesheet">
</head>

<body>
  <div class="main-container">
    <!-- Modal content -->
    <div class="page-heading">
      <h1>Add an Upcoming Elections</h1>
    </div>
    <div class="input-section">
      <form method="POST" action="insertelection.php" enctype="multipart/form-data">
        <div class="input-wrapper">
          <div class="input-panel">
            <div class="input-panel-heading">
              <h2>Upload Election Banner</h2>
            </div>
            <div id="input-imgpreview">
              <img id="imgpreview"></img>
            </div>
            <div class="input-panel-body">
              <div class="inputtitle">
                <label for="uploadimg">Choose Banner
                  <span class="star">*</span>
                </label>
              </div>
              <div class="input-field">
                <input type="file" name="banner" id="uploadimg" accept="image/*" required />
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
                <input type="text" name="electionname" class="inputbtn" id="electionname" placeholder="Enter Election Name" required/>
              </div>
            </div>


            <div class="input-panel-body">
              <div class="inputtitle">
                <label for="pollingdate">Polling Date
                  <span class="star">*</span>
                </label>
              </div>
              <div class="input-field">
                <input type="Date" name="pollingdate" class="inputbtn" id="pollingdate" required/>
              </div>
            </div>


            <div class="input-panel-body">
              <div class="inputtitle">
                <label for="electiontype">Elecion Type
                  <span class="star">*</span>
                </label>
              </div>
              <div class="input-field">
                <select name="electiontype" id="electiontype" required>

                  <option value="National">National</option>
                  <option value="State">State</option>

                </select>
              </div>
            </div>
            <style>
              #election-state {
                display: none;
              }
            </style>
            <div class="input-panel-body" id="election-state">
              <div class="inputtitle">
                <label for="electionstate">Select the State applying For
                  <span class="star">*</span>
                </label>
              </div>
              <div class="input-field">
                <select id="electionstate" name="electionstate" required>
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
              let electtype = document.getElementById('electiontype');

              let elecstate = document.getElementById('election-state');

              electtype.onchange = function() {

                var getval = electtype.value;
                console.log(getval);
                if (getval == "State") {
                  elecstate.style.display = "flex";
                } else {
                  elecstate.style.display = "none";
                }
              }
            </script>
           
          </div>

          <div class="input-panel-body">
                        <button type="submit" name="addelection" class="submitbtn">Register</button>
                    </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>