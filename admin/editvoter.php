        <?php
        require '../database/security.php';
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>VOTER VIEW</title>

          <!-- Font Icon -->
          <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
             
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    
</script>
    
<link rel="stylesheet" href="css/input.css">
          <!-- Main css -->
          <style>
            .imgpreview {
              display: block;
              width: 150px;
              height: 150px;
              border-radius: 50%;
              margin: 0 auto;

            }

            #image {
              display: block;
              width: 80%;
              position: relative;
              width: 80%;
              background-color: #29B5FF;
              color: white;
              text-align: center;
              padding: 0.5rem 0.5rem;
              font-family: sans-serif;
              border-radius: 0.3rem;
              cursor: pointer;
              margin: 0 auto;
              margin-top: 2rem;

            }
          </style>
        </head>

        <body>
          <div class="main-container">
          <div class="page-heading">
      <h1>Update Voter</h1>
    </div>
                <div class="signup-form">



        <div class="input-section">
                    
                    <form action="VoterUDC.php" method="POST" enctype="multipart/form-data">
                      <?php


            if(isset($_POST['updatebtn'])){
                $vid = $_POST['voterid'];
                $command = " SELECT * FROM voters WHERE voterid='$vid' "; 
                $query_run = mysqli_query($con,$command);
                
                foreach($query_run as $row)
                {

                    ?>
                    <div class="input-field">
                    <input type="hidden" name="voterid" class="inputbtn"  value="<?php echo $row['voterid'] ?>"/>
                    </div>
                   <div class="input-panel">
                              <div class="input-panel-heading">
                                  <h2>Update Profile Picture</h2>
                              </div>
                              <div class="input-panel-wrapper">
                                  <div class="input-panel-body">
                                      <div class="inputtitle">
                                          <label for="voterpic">Profile Pic
                                              <span class="star">*</span>
                                          </label>
                                      </div>
                                      <div class="input-field">
                                          <input type="file" name="voterpic" id="voterpic" accept="image/*" required/>
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
                                    <label for="votername">Name
                                        <span class="star">*</span>
                                    </label>
                                </div>
                                <div class="input-field">
                                    <input type="text" name="votername" id="votername" value="<?php echo $row['votername'] ?>" required/>
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
                                      <input type="tel" name="mobile" id="mobile" pattern="[0-9]{10}" value="<?php echo $row['phoneno'] ?>" required/>
                                  </div>
                              </div>
                          </div>

                          <div class="input-panel">
                              <div class="input-panel-heading">
                                  <h2>Update Postal Address</h2>
           
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
                                      <label for="state">Select the State applying For
                                          <span class="star">*</span>
                                      </label>
                                  </div>
                                  <div class="input-field">
                                      <select id="state" name="state">
                                          <option id="abc" Selected>Select State</option>
                                          <?php
                                          $sql = " SELECT * FROM `state` ";
                                          $query = mysqli_query($con, $sql);

                                          if (mysqli_num_rows($query) > 0) {
                                              while ($rows = mysqli_fetch_assoc($query)) {
                                          ?>
                                                  <option id="<?php echo $rows['statecode'] ?>" value="<?php echo $rows['name'] ?>" <?php echo $rows['name'] == $row['state'] ? 'selected' : '' ?>><?php echo $rows['name'] ?></option>

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
                                      <input type="text" name="pin" id="pin" value="<?php echo $row['pincode'] ?>"  />
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
                                          <option id="abc">Select Constituency</option>
                                         
                                      </select>
                                  </div>
                              </div>
                              
                            
                           
                              
                          </div>
                          <div class="input-panel-body">
                    <button name="updatevoterinfo" class="submitbtn">  Update  </button> 
                    </div>            
                    </form>
                  </div>
                   <?php
                }

            }
        ?>
            </div>
          </div>
          <script src="scripts/selects.js"></script>
          <script>
          let imgpreview = document.getElementById("previewimg");
            let imginput = document.getElementById("imgupload");
            imginput.addEventListener("change", function(event) {

              if(event.target.files.length == 0) {
                return;
              }


              let tempurl = URL.createObjectURL(event.target.files[0]);
              //imgpreview.removeAttribute("src");
              imgpreview.setAttribute("src", tempurl);

            });
        </script>
        </body>

        </html>