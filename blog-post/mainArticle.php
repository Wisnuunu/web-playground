<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <!-- <h1>Hello, world!</h1>-->
      <div class="container">
          <div class="row">
              <?php
                include 'database.php';
                $pdo = Database::connect();
                $sql = "SELECT * FROM `articles` ORDER BY `articles`.`id_article` ASC";

                foreach ($pdo->query($sql) as $row) {
                    if ($row['isHighlight'] != 0 ) {
                        echo '<div class="col-md-4">';
                        echo '<h2>'.$row['title'].'</h2>';
                        echo '<h6>'.$row['post_date'].'</h6>';
                        
                        //split article until find the separator
                        $separator = "<!-- pagebreak -->";
                        $article = explode($separator, $row['article']);
                        
                        echo '<p>'.$article[0].'</p>';
                        echo '<a href="post.php?p='.$row['id_article'].'">read more</a>';
                        echo '</div>';
                    }
                }

                Database::disconnect();
              ?>
              
          </div>
      </div>
              
              
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>