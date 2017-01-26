<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info using POST and HTML FORMS.SOURCE FILE</title>
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
      <!-- FORM -->
      <!-- As a rule we always use method="post" -->
      <!-- action="post_destinationt" indicates the url where we are sending form data -->
      <form action="formulario1_post_destination.php" method="post">
        <fieldset>
          <legend>Login</legend>
          <span>User:</span><input type="text" name="user" required><br>
          <span>Password:</span><input type="password" name="pasword" required><br>
          <p><input type="submit" value="Send"></p>
        </fieldset>
      </form>
  </body>
</html>
