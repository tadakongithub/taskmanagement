<?php
try {
    $db = new PDO ('mysql:dbname=progress;host=localhost;charset=utf8', 'mamp', 'tadashi');
} catch (PDOException $e) {
    echo 'DB接続エラー: '.$e->getMessage();
}

session_start();

if (isset($_SESSION['username'])){
    $login = true;
} else {
    header('Location: login.php');
}

if (!empty($_POST)){

for($j=1;$j<=40;$j++){
    switch ($j){
        case 1:
        $table = "a110";
        break;

        case 2:
        $table = "a120";
        break;

        case 3:
        $table = "a150";
        break;

        case 4:
        $table = "a210";
        break;

        case 5:
        $table = "a220";
        break;

        case 6:
        $table = "a250";
        break;

        case 7:
        $table = "a320";
        break;

        case 8:
        $table = "a350";
        break;

        case 9:
        $table = "a450";
        break;

        case 10:
        $table = "a570";
        break;

        case 11:
        $table = "b110";
        break;

        case 12:
        $table = "b120";
        break;

        case 13:
        $table = "b150";
        break;

        case 14:
        $table = "b210";
        break;

        case 15:
        $table = "b220";
        break;

        case 16:
        $table = "b250";
        break;

        case 17:
        $table = "b320";
        break;

        case 18:
        $table = "b350";
        break;

        case 19:
        $table = "b450";
        break;

        case 20:
        $table = "b570";
        break;

        case 21:
        $table = "c110";
        break;

        case 22:
        $table = "c120";
        break;

        case 23:
        $table = "c150";
        break;

        case 24:
        $table = "c210";
        break;

        case 25:
        $table = "c220";
        break;

        case 26:
        $table = "c250";
        break;

        case 27:
        $table = "c320";
        break;

        case 28:
        $table = "c350";
        break;

        case 29:
        $table = "c450";
        break;

        case 30:
        $table = "c570";
        break;

        case 31:
        $table = "d110";
        break;

        case 32:
        $table = "d120";
        break;

        case 33:
        $table = "d150";
        break;

        case 34:
        $table = "d210";
        break;

        case 35:
        $table = "d220";
        break;

        case 36:
        $table = "d250";
        break;

        case 37:
        $table = "d320";
        break;

        case 38:
        $table = "d350";
        break;

        case 39:
        $table = "d450";
        break;

        case 40:
        $table = "d570";
        break;
    }

    for($i=0;$i<=2;$i++){
    $course = $db->prepare('UPDATE '."$table".' SET progress=? WHERE term="'.$_POST['term'][$i].'"'.' AND course="'.$_POST['course'][$i].'"'.' AND week='.$_POST['week'][$i]);
    $course->execute(array($_POST['progress'][$i]));
    }
}

header('Location: thanks.php');
}
?>

<html>

<head class="progress_header">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<p class="logout"><a href="logout.php">LOGOUT</a></p>

<body class="progress_body">

<div class="form_container">

<form action="" method="post">

<h3 class="head_form">TERM</h3>
<h3 class="head_form">COURSE</h3>
<h3 class="head_form">WEEK</h3>
<h3 class="head_form">PROGRESS</h3>

<br>

<?php $i=1;
while ($i<=3):?>


 <select name="term[]" id="term">
 <option value="">Choose Term</option>
 <option value="A">A</option>
 <option value="B">B</option>
 <option value="C">C</option>
 <option value="D">D</option>
 </select>


 <select name="course[]" id="course">
 <option value="">Choose Course</option>
 <option value="110">110</option>
 <option value="120">120</option>
 <option value="150">150</option>
 <option value="210">210</option>
 <option value="220">220</option>
 <option value="250">250</option>
 <option value="320">320</option>
 <option value="350">350</option>
 <option value="450">450</option>
 <option value="570">570</option>
 </select>

 
 <select name="week[]" id="week">
 <option value="">Choose Week</option>
 <?php $j=1;
 while($j <= 11) :?>
 <option value=<?php echo $j;?>><?php echo $j;?></option>
 <?php $j++;?>
 <?php endwhile ;?>
 </select>

 
 <select name="progress[]" id="progress">
 <option value="">Choose Progress</option>
 <option value="complete">完成</option>
 <option value="question_done">解説・選定以外完成</option>
 <option value="working">作問中</option>
 <option value="not_touched">未着手</option>
 </select>

 <br>

<?php $i++;?>
<?php endwhile ;?>

<input type="submit" value="UPDATE" class="submit">
</form>

<div class="to_table to_table_2"><a href="index.php">TABLE</a></div>

</div>

</body>

</html>

