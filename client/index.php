<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <?php
    require 'config.php';
    $angle = 0;
    if(isset($_POST['angle']) && isset($_POST['submit'])){
        $angle = mysqli_real_escape_string($mysqli, $_POST['angle']);
        $mysqli->query("UPDATE servo_control SET angle = $angle WHERE id = 1") or die(mysqli_error($mysqli));
    }else if(isset($_POST['reset'])){
        $mysqli->query("UPDATE servo_control SET angle = 0 WHERE id = 1") or die(mysqli_error($mysqli));
    }
    ?>
    <body>
        <div class="landing">
            <div class="container">
                <h1>Servo Control</h1>
                <form method="POST">
                    <input type="number" min='0' max='180' name="angle" value="<?php echo $angle;?>"/>
                    <button type="submit" name="submit">Go</button>
                    <button type="submit" name="reset" class="reset-btn">Reset</button>
                </form>
            </div>
        </div>
        
        <script src="" async defer></script>
    </body>
</html>