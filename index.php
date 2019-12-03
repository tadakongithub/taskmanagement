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
  header('Location: login.php');//If not logged in, jump to login page.
}

$a110s = $db->query('SELECT * FROM a110');//各テーブル
$a120s = $db->query('SELECT * FROM a120');
$a150s = $db->query('SELECT * FROM a150');
$a210s = $db->query('SELECT * FROM a210');
$a220s = $db->query('SELECT * FROM a220');
$a250s = $db->query('SELECT * FROM a250');
$a320s = $db->query('SELECT * FROM a320');
$a350s = $db->query('SELECT * FROM a350');
$a450s = $db->query('SELECT * FROM a450');
$a570s = $db->query('SELECT * FROM a570');

$b110s = $db->query('SELECT * FROM b110');//各テーブル
$b120s = $db->query('SELECT * FROM b120');
$b150s = $db->query('SELECT * FROM b150');
$b210s = $db->query('SELECT * FROM b210');
$b220s = $db->query('SELECT * FROM b220');
$b250s = $db->query('SELECT * FROM b250');
$b320s = $db->query('SELECT * FROM b320');
$b350s = $db->query('SELECT * FROM b350');
$b450s = $db->query('SELECT * FROM b450');
$b570s = $db->query('SELECT * FROM b570');

$c110s = $db->query('SELECT * FROM c110');//各テーブル
$c120s = $db->query('SELECT * FROM c120');
$c150s = $db->query('SELECT * FROM c150');
$c210s = $db->query('SELECT * FROM c210');
$c220s = $db->query('SELECT * FROM c220');
$c250s = $db->query('SELECT * FROM c250');
$c320s = $db->query('SELECT * FROM c320');
$c350s = $db->query('SELECT * FROM c350');
$c450s = $db->query('SELECT * FROM c450');
$c570s = $db->query('SELECT * FROM c570');

$d110s = $db->query('SELECT * FROM d110');
$d120s = $db->query('SELECT * FROM d120');
$d150s = $db->query('SELECT * FROM d150');
$d210s = $db->query('SELECT * FROM d210');
$d220s = $db->query('SELECT * FROM d220');
$d250s = $db->query('SELECT * FROM d250');
$d320s = $db->query('SELECT * FROM d320');
$d350s = $db->query('SELECT * FROM d350');
$d450s = $db->query('SELECT * FROM d450');
$d570s = $db->query('SELECT * FROM d570');

?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>

<div class="container a">

<p class="logout"><a href="logout.php">LOGOUT</a></p>

  <table class="a">
    <caption>TERM A</caption>
    <tr class="week">
        <th>WEEK</th>
        <?php $i=1;
              while ($i<=11) :?>
              <th><?php echo $i ;?></th>
              <?php $i++ ;?>
              <?php endwhile ;?>
    </tr>

    <?php $i=1;
          while ($i <= 10) :?>
        
        <?php switch ($i) {
            case 1:
            $course = "110";//Just for printint out the name of each course
            $records = $a110s;//records of term A for ES110
            break;

            case 2:
            $course = "120";
            $records = $a120s;
            break;

            case 3:
            $course = "150";
            $records = $a150s;
            break;

            case 4:
            $course = "210";
            $records = $a210s;
            break;

            case 5:
            $course = "220";
            $records = $a220s;
            break;

            case 6:
            $course = "250";
            $records = $a250s;
            break;

            case 7:
            $course = "320";
            $records = $a320s;
            break;

            case 8:
            $course = "350";
            $records = $a350s;
            break;

            case 9:
            $course = "450";
            $records = $a450s;
            break;

            case 10:
            $course = "570";
            $records = $a570s;
            break;
        } ?>

        <tr>
        <td><?php echo $course ;?></td><!-- Print out the coourse name on the left -->
        <?php while ($record = $records -> fetch()) :?><!-- Pull each week's data -->
              <td style="background-color:

              <?php switch ($record['progress']) {
                  case "complete":
                  echo "#00ff00";
                  break;

                  case "question_done":
                  echo "#bbff00";
                  break;

                  case "working":
                  echo "#ff9900";
                  break;

                  case "not_touched":
                  echo "#ff0000";
                  break;
              } ?>
              
              "></td>
        <?php endwhile ;?>
        </tr>

    <?php $i++ ;?>
    <?php endwhile ;?>
  </table>

<div class="to_progress"><a href="progress.php">UPDATE</a></div>

</div>

<div class="container b">

  <table class="b">
    <caption>TERM B</caption>
    <tr class="week">
        <th>WEEK</th>
        <?php $i=1;
              while ($i<=11) :?>
              <th><?php echo $i ;?></th>
              <?php $i++ ;?>
              <?php endwhile ;?>
    </tr>

    <?php $i=1;
          while ($i <= 10) :?>
        
        <?php switch ($i) {
            case 1:
            $course = "110";//Just for printint out the name of each course
            $records = $b110s;//records of term C for ES110
            break;

            case 2:
            $course = "120";
            $records = $b120s;
            break;

            case 3:
            $course = "150";
            $records = $b150s;
            break;

            case 4:
            $course = "210";
            $records = $b210s;
            break;

            case 5:
            $course = "220";
            $records = $b220s;
            break;

            case 6:
            $course = "250";
            $records = $b250s;
            break;

            case 7:
            $course = "320";
            $records = $b320s;
            break;

            case 8:
            $course = "350";
            $records = $b350s;
            break;

            case 9:
            $course = "450";
            $records = $b450s;
            break;

            case 10:
            $course = "570";
            $records = $b570s;
            break;
        } ?>

        <tr>
        <td><?php echo $course ;?></td><!-- Print out the coourse name on the left -->
        <?php while ($record = $records -> fetch()) :?><!-- Pull each week's data -->
              <td style="background-color:

              <?php switch ($record['progress']) {
                  case "complete":
                  echo "#00ff00";
                  break;

                  case "question_done":
                  echo "#bbff00";
                  break;

                  case "working":
                  echo "#ff9900";
                  break;

                  case "not_touched":
                  echo "#ff0000";
                  break;
              } ?>
              
              "></td>
        <?php endwhile ;?>
        </tr>

    <?php $i++ ;?>
    <?php endwhile ;?>
  </table>

<div class="to_progress"><a href="progress.php">UPDATE</a></div>

</div>

<div class="container c">

  <table class="c">
    <caption>TERM C</caption>
    <tr class="week">
        <th>WEEK</th>
        <?php $i=1;
              while ($i<=11) :?>
              <th><?php echo $i ;?></th>
              <?php $i++ ;?>
              <?php endwhile ;?>
    </tr>

    <?php $i=1;
          while ($i <= 10) :?>
        
        <?php switch ($i) {
            case 1:
            $course = "110";//Just for printint out the name of each course
            $records = $c110s;//records of term C for ES110
            break;

            case 2:
            $course = "120";
            $records = $c120s;
            break;

            case 3:
            $course = "150";
            $records = $c150s;
            break;

            case 4:
            $course = "210";
            $records = $c210s;
            break;

            case 5:
            $course = "220";
            $records = $c220s;
            break;

            case 6:
            $course = "250";
            $records = $c250s;
            break;

            case 7:
            $course = "320";
            $records = $c320s;
            break;

            case 8:
            $course = "350";
            $records = $c350s;
            break;

            case 9:
            $course = "450";
            $records = $c450s;
            break;

            case 10:
            $course = "570";
            $records = $c570s;
            break;
        } ?>

        <tr>
        <td><?php echo $course ;?></td><!-- Print out the coourse name on the left -->
        <?php while ($record = $records -> fetch()) :?><!-- Pull each week's data -->
              <td style="background-color:

              <?php switch ($record['progress']) {
                  case "complete":
                  echo "#00ff00";
                  break;

                  case "question_done":
                  echo "#bbff00";
                  break;

                  case "working":
                  echo "#ff9900";
                  break;

                  case "not_touched":
                  echo "#ff0000";
                  break;
              } ?>
              
              "></td>
        <?php endwhile ;?>
        </tr>

    <?php $i++ ;?>
    <?php endwhile ;?>
  </table>

<div class="to_progress"><a href="progress.php">UPDATE</a></div>

</div>

<div class="container d">

  <table class="d">
    <caption>TERM D</caption>
    <tr>
        <th>WEEK</th>
        <?php $i=1;
              while ($i<=11) :?>
              <th><?php echo $i ;?></th>
              <?php $i++ ;?>
              <?php endwhile ;?>
    </tr>

    <?php $i=1;
          while ($i <= 10) :?>
        
        <?php switch ($i) {
            case 1:
            $course = "110";
            $records = $d110s;
            break;

            case 2:
            $course = "120";
            $records = $d120s;
            break;

            case 3:
            $course = "150";
            $records = $d150s;
            break;

            case 4:
            $course = "210";
            $records = $d210s;
            break;

            case 5:
            $course = "220";
            $records = $d220s;
            break;

            case 6:
            $course = "250";
            $records = $d250s;
            break;

            case 7:
            $course = "320";
            $records = $d320s;
            break;

            case 8:
            $course = "350";
            $records = $d350s;
            break;

            case 9:
            $course = "450";
            $records = $d450s;
            break;

            case 10:
            $course = "570";
            $records = $d570s;
            break;
        } ?>

        <tr>
        <td><?php echo $course ;?></td>
        <?php while ($record = $records -> fetch()) :?>
              <td style="background-color:

              <?php switch ($record['progress']) {
                  case "complete":
                  echo "#15ff00";
                  break;

                  case "question_done":
                  echo "#f4f142";
                  break;

                  case "working":
                  echo "#ff9900";
                  break;

                  case "not_touched":
                  echo "#ff0000";
                  break;
              } ?>
              
              "></td>
        <?php endwhile ;?>
        </tr>

    <?php $i++ ;?>
    <?php endwhile ;?>
  </table>

<div class="to_progress"><a href="progress.php">UPDATE</a></div>

</div>
      
</body>
</html>