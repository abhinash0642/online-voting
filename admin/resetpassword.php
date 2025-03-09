<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style>
  body{
    margin:0;
    padding:0;
    max-width:100%;
    max-height:100%;
    background:#a8a8a8;
  }

 .container{
   position: absolute;
   width:50%;
   height:auto;
   margin:30px 11rem;
   padding: 20px 100px;
   text-align:center;
   border-radius: 17px;
   background:tomato;
  
 }
 .forgot-form{
      width:50%;
      height:100%;
      margin: 0 auto;
 }
 
 label{
   font-size:4rem;
 }
 input{
    width:100%;
    padding:7px 14px;
    outline: none;
    display:block;
 }

  </style>
</head>

<body>
 <div class="container">
    <div class="forgot-form">
      <h1>Reset Password</h1>
      <p>Please enter your Email Id below to rest your password</p>
      <label class="label-default" for="un">Email Id</label>
      <input id="email_addy" name="email_addy" class="form-control" type="text"><br>
      <button id="mybad" class="btn btn-primary" role="button">I FORGOT</button>
    </div>
 </div>
</body>

</html>