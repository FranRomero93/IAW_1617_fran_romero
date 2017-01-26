<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passing info with POST and HTML FORMS using a single file.</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>

      <!-- PHP STRUCTURE FOR CONDITIONAL HTML -->
      <!-- FIRST TIME. NO DATA IN THE POST (checking a required form field) -->
      <!-- So we must show the form -->

      <?php if (!isset($_POST["user"])) : ?>
        <form method="post">
        <fieldset>
          <legend>Login</legend>
          <span>User:</span><input type="text" name="user" required><br>
          <span>Password:</span><input type="password" name="pasword" required><br>
          <p><input type="submit" value="Send"></p>
        </fieldset>
      </form>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else: ?>

        <?php
        echo "<h3>Información</h3>";
        var_dump($_POST);
      ?>

      <?php endif ?>

  </body>
</html>