<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body class="welcome flex-col outside-box">
  <div class="outside-box">
    <h1 class="aem-header">Academic Event Management Company</h1>
    <form class="signin-form container">
      <div>
        <label>Username</label>
        <input class="form-control" id="username" required>
      </div>
      <div>
        <label>Password</label>
        <input type="password" class="form-control" id="password" required>
      </div>
      <label class="danger" id="incorrect" style="display: none;">Incorrect username/password</label>
      <p>Need an account? <a href="./signup.html">Sign Up</a></p>
      <br>
      <button onclick="signIn(event)" class="btn">Sign In</button>
    </form>
  </div>
  
</body>
<script src="./script.js"></script>
</html>