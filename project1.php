<?php
$file = fopen('answers.csv', 'r');
$name = $_POST['fName'];
$lastName = $_POST['lname'];
$fnameValid = true;
$lnameValid = true;
$valEmail = true;
$q1 = true;
$q2 = true;
$q3 = true;
$q4 = true; 
$q5 = true;
$q6 = true; 
$q7 = true; 
$q8 = true; 
$q9 = true; 
$q10 = true;
if ($file == false) {
    echo 'No file found.';
    exit();
}
$answers = [];
while (($row = fgetcsv($file, 1000, ',')) !== false) {
    $answers[] = $row;
}
$_POST['q1'] == $answers[0][0];
$_POST['q2'] == $answers[1][0];
$_POST['q3'] == $answers[2][0];
$_POST['q4'] == $answers[3][0];
$_POST['q5'] == $answers[4][0];
$_POST['q6'] == $answers[5][0];
$_POST['q7'] == $answers[6][0];
$_POST['q8'] == $answers[7][0];
$_POST['q9'] == $answers[8][0];
$_POST['q10'] == $answers[9][0];

fclose($file);

if (isset($_POST) && !empty($_POST)) {
    $valid = true;
    if (isset($_POST['fName'])) {
        $firstName = htmlspecialchars($_POST['fName']);
        if (preg_match('/^[a-zA-Z]+$/', $firstName, $matches)) {            
        } else {
            echo '<script>alert("Please provide your first name.")</script>';
            $valid = false;
            $fnameValid = false;
        }
    }
    if (isset($_POST['lName'])) {
        $lastName = htmlspecialchars($_POST['lName']);
        if (preg_match('/^[a-zA-Z]+$/', $lastName, $matches)) {
        } else {
            echo '<script>alert("Please provide your last name.")</script>';
            $valid = false;
            $lnameValid = false;
        }
    } 
    if (empty($_POST['q1'])) {
        echo '<script>alert("Question 1 is unanswered!")</script>';
        $valid = false;
        $q1 = false;
    } 
    if (empty($_POST['q2'])) {
        echo '<script>alert("Question 2 is unanswered!")</script>';
        $valid = false;
        $q2 = false;
    } 
    if (empty($_POST['q3'])) {
        echo '<script>alert("Question 3 is unanswered!")</script>';
        $valid = false;
        $q3 = false;
    } 
    if (empty($_POST['q4'])) {
        echo '<script>alert("Question 4 is unanswered!")</script>';
        $valid = false;
        $q4 = false;
    } 
    if (empty($_POST['q5'])) {
        echo '<script>alert("Question 5 is unanswered!")</script>';
        $valid = false;
        $q5 = false;
    } 
    if (empty($_POST['q6'])) {
        echo '<script>alert("Question 6 is unanswered!")</script>';
        $valid = false;
        $q6 = false;
    }
    if (empty($_POST['q7'])) {
        echo '<script>alert("Question 7 is unanswered!")</script>';
        $valid = false;
        $q7 = false;
    } 
    if (empty($_POST['q8'])) {
        echo '<script>alert("Question 8 is unanswered!")</script>';
        $valid = false;
        $q8 = false;
    } 
    if (empty($_POST['q9'])) {
        echo '<script>alert("Question 9 is unanswered!")</script>';
        $valid = false;
        $q9 = false;
    }
    if (empty($_POST['q10'])) {
        echo '<script>alert("Question 10 is unanswered!")</script>';
        $valid = false;
        $q10 = false;
    }
}

?>
<?php
error_reporting(E_ALL);
define("TITLE", "Quiz Title");
define("NAME", "Zak");
define("STYLESHEET", "project1.css");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo TITLE ?></title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
        crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">    
        <link href="<?php echo STYLESHEET; ?>" rel="stylesheet">
        <meta property="og:title" content="Zak's Quiz" />
        <meta property="og:description" content="CMPS 3680 Project 1" />
        <meta property="og:image" content="" />
    </head>
    <body style="background-image: url('./images/background1.jpg');background-size: cover; background-repeat: no-repeat;
    background-position: center top; ">        
<?php 
if (!$valid) { ?>
        <div class="container-sm" id="title" ><h1><?php echo NAME; ?>'s <?php echo TITLE?></h1></div>
        <div class="container-sm" id="space"> <h1> </h1></div>
        
        <form method="POST">
        <div class="container-md" id="contents" >
        <!--Name Input-->
        <p><br><b>Name</b></p>
        <input type="text" name="fName" value="<?php echo $_POST['fName'] ?? ''; ?>"
        <?php 
        if (!$fnameValid) {
            echo "style='border: 1px solid red;'";
        } ?> />
        <p><b>Last Name</b></p>
        <input type="text" name="lName" value="<?php echo $_POST['lName'] ?? ''; ?>"
        <?php 
        if (!$lnameValid) {
            echo "style='border: 1px solid red;'";
        } ?> />
        <br><br>        
        </div>
        <div class="container-sm" id="space"> <h1> </h1></div>                     
        <div class="container-md" id="contents" ><br>
            
<!--TRUE OR FALSE SECTION-->
            <h1><u>True or False</u></h1>
                <!--Question 1-->
                <p><strong <?php 
                    if (!$q1) {
                        echo "style='color: red;'";
                    } ?>>
                Question 1:</strong><br>
                <input type="radio" id="tf1" name="q1" value="t1"
                <?php 
                if (isset($_POST['q1']) && $_POST['q1']=="t1") 
                    echo "checked";?>>
                <label for="true1">True</label><br>
                <input type="radio" id="tf1" name="q1" value="f1"
                <?php 
                if (isset($_POST['q1']) && $_POST['q1']=="f1") 
                    echo "checked";?>>
                <label for="false1">False</label><br>
                
                <!--Question 2-->
                <strong <?php 
                    if (!$q2) {
                        echo "style='color: red;'";
                    } ?>>Question 2:</strong><br>
                <input type="radio" id="tf2" name="q2" value="t2"
                <?php 
                if (isset($_POST['q2']) && $_POST['q2']=="t2") 
                    echo "checked";?>>
                <label for="true2">True</label><br>
                <input type="radio" id="tf2" name="q2" value="f2"
                <?php
                if (isset($_POST['q2']) && $_POST['q2']=="f2") 
                    echo "checked";?>>
                <label for="false2">False</label><br>

                <!--Question 3-->
                <strong <?php 
                    if (!$q3) {
                        echo "style='color: red;'";
                    } ?>>Question 3:</strong><br>
                <input type="radio" id="tf3" name="q3" value="t3" 
                <?php if (isset($_POST['q3']) && $_POST['q3']=="t3") 
                    echo "checked";?>>
                <label for="true3">True</label><br>
                <input type="radio" id="tf3" name="q3" value="f3" 
                <?php 
                if (isset($_POST['q3']) && $_POST['q3']=="f3") 
                    echo "checked";?>>
                <label for="false3">False</label><br>

                <!--Question 4-->
                <strong <?php 
                    if (!$q4) {
                        echo "style='color: red;'";
                    } ?>>Question 4:</strong><br>
                <input type="radio" id="tf4" name="q4" value="t4"
                <?php 
                if (isset($_POST['q4']) && $_POST['q4']=="t4") 
                    echo "checked";?>>
                <label for="true4">True</label><br>
                <input type="radio" id="tf4" name="q4" value="f4"
                <?php 
                if (isset($_POST['q4']) && $_POST['q4']=="f4") 
                    echo "checked";?>>
                <label for="false4">False</label><br>

                <!--Question 5-->
                <strong <?php 
                    if (!$q5) {
                        echo "style='color: red;'";
                    } ?>>Question 5:</strong><br>
                <input type="radio" id="tf5" name="q5" value="t5" 
                <?php if (isset($_POST['q5']) && $_POST['q5']=="t5") 
                    echo "checked";?>>
                <label for="tf5">True</label><br>
                <input type="radio" id="tf5" name="q5" value="f5"
                <?php 
                if (isset($_POST['q5']) && $_POST['q5']=="f5") 
                    echo "checked";?>>
                <label for="tf5">False</label><br>
        </div>
        <div class="container-sm" id="space"> <h1> </h1></div> 
            <div class="container-md" id="contents" >

<!--Multiple Choice Section-->

                <br><h1><u>Multiple Choice</u></h1>                
                <div class="container-md" id="contents" >

                <!--Question 6-->          
                <strong <?php 
                    if (!$q6) {
                        echo "style='color: red;'";
                    } ?>>Question 6:</strong><br>
                <input type="radio" id="mc1" name="q6" value="a1" 
                <?php if (isset($_POST['q6']) && $_POST['q6']=="a1") 
                    echo "checked";?>>
                <label for="mc1">A</label><br>
                <input type="radio" id="mc1" name="q6" value="b1"
                <?php 
                if (isset($_POST['q6']) && $_POST['q6']=="b1") 
                    echo "checked";?>>
                <label for="mc1">B</label><br>
                <input type="radio" id="mc1" name="q6" value="c1" 
                <?php if (isset($_POST['q6']) && $_POST['q6']=="c1") 
                    echo "checked";?>>
                <label for="mc1">C</label><br>
                <div>    

                <!--Question 7-->      
                <strong <?php 
                    if (!$q7) {
                        echo "style='color: red;'";
                    } ?>>Question 7:</strong><br>
                <input type="radio" id="mc2" name="q7" value="a2" 
                <?php if (isset($_POST['q6']) && $_POST['q6']=="a2") 
                    echo "checked";?>>
                <label for="mc2">A</label><br>
                <input type="radio" id="mc1" name="q7" value="b2"
                <?php 
                if (isset($_POST['q7']) && $_POST['q7']=="b2") 
                    echo "checked";?>>
                <label for="mc2">B</label><br>
                <input type="radio" id="mc1" name="q7" value="c2" 
                <?php if (isset($_POST['q7']) && $_POST['q7']=="c2") 
                    echo "checked";?>>
                <label for="mc2">C</label><br>
                
                <!--Question 8-->        
                <strong <?php 
                    if (!$q8) {
                        echo "style='color: red;'";
                    } ?>>Question 8:</strong><br>
                <input type="radio" id="mc1" name="q8" value="a3" 
                <?php if (isset($_POST['q8']) && $_POST['q8']=="a3") 
                    echo "checked";?>>
                <label for="mc1">A</label><br>
                <input type="radio" id="mc1" name="q8" value="b3"
                <?php 
                if (isset($_POST['q8']) && $_POST['q8']=="b3") 
                    echo "checked";?>>
                <label for="mc1">B</label><br>
                <input type="radio" id="mc1" name="q8" value="c3" 
                <?php if (isset($_POST['q8']) && $_POST['q8']=="c3") 
                    echo "checked";?>>
                <label for="mc1">C</label><br>
                
                <!--Question 9-->         
                <strong <?php 
                    if (!$q9) {
                        echo "style='color: red;'";
                    } ?>>Question 9:</strong><br>
                <input type="radio" id="mc1" name="q9" value="a4" 
                <?php if (isset($_POST['q9']) && $_POST['q9']=="a4") 
                    echo "checked";?>>
                <label for="mc1">A</label><br>
                <input type="radio" id="mc1" name="q9" value="b4"
                <?php 
                if (isset($_POST['q9']) && $_POST['q9']=="b4") 
                    echo "checked";?>>
                <label for="mc1">B</label><br>
                <input type="radio" id="mc1" name="q9" value="c4" 
                <?php if (isset($_POST['q9']) && $_POST['q9']=="c4") 
                    echo "checked";?>>
                <label for="mc1">C</label><br>
                
                <!--Question 10-->          
                <div>
                <strong <?php 
                    if (!$q10) {
                        echo "style='color: red;'";
                    } ?>>Question 10:</strong><br>
                <input type="radio" id="mc1" name="q10" value="a5" 
                <?php if (isset($_POST['q10']) && $_POST['q10']=="a5") 
                    echo "checked";?>>
                <label for="mc1">A</label><br>
                <input type="radio" id="mc1" name="q10" value="b5"
                <?php 
                if (isset($_POST['q10']) && $_POST['q10']=="b5") 
                    echo "checked";?>>
                <label for="mc1">B</label><br>
                <input type="radio" id="mc1" name="q10" value="c5" 
                <?php if (isset($_POST['q10']) && $_POST['q10']=="c5") 
                    echo "checked";?>>
                <label for="mc1">C</label><br>
                </p>
                </div>
                
                <div>                   
            <input class="button button2" name="submit" type="submit" />
                </div>
        </form>
<?php 
} 
else { 
    ?>
    <div class="container-sm" id="contents">
    <p><h1><?php echo 'Thank you, ' ?> <?php echo $name ?> <?php echo $lastName ?>!<br></h1></p>
    </div>
<?php 
} ?>
    </body>
</html>