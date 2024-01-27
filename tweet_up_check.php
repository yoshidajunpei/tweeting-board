<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Tweeting Board</title>
    <link href="css/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="css/assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="tweet_view.php">Tweeting Board</a>
        </div>
        
      </div>
    </nav>

        <div class="col-md-3">
          <h4>以下のツイート内容でOK？</h4>
          <br>
          <form action="tweet_view.php" method="GET">
           <?php
            //DB接続
            $connect = mysqli_connect("localhost","root","pass1","test");
            //tweet_upからtweet内容を表示
            $contents =  $_GET['contents'];  
            $tweet_id = $_GET['tweet_id'];
            echo $contents;
            $query = "update tweet_tbl set contents = '$contents' where tweet_id = '$tweet_id'";
            mysqli_query($connect, $query);
           ?>
           <br>
           <br>
           <br>
            <input type="submit" value="登録してTOPへ戻る" class="btn btn-primary" >
          </form>
        </div>

        <div class="col-md-9">

          <div class="table-responsive">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>名前</th>
                  <th>投稿内容</th>
                  <th>投稿時間</th>
                </tr>
              </thead>
              <tbody>
<?php
$connect = mysqli_connect("localhost","root","pass1","test");
//ここにツイート内容を表示する
$sql = "select * from tweet_tbl order by input_datetime desc";

$rs = mysqli_query($connect,$sql);

while($row = mysqli_fetch_assoc($rs)){
                echo "<tr>";
                echo "<td>{$row['account']}</td>";
                echo "<td>{$row['contents']}</td>";
                echo "<td>{$row['input_datetime']}</td>";
                echo "</tr>";  
}

//データベースとの接続を切る
mysqli_close($connect); 

?>

              </tbody>
            </table>
          </div>
        </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="css/dist/js/bootstrap.min.js"></script>
    <script src="css/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="css/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
