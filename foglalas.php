<?php
  session_start();

  if (!isset($_SESSION['username'])) {
    header('location:/login.php');
  }

  include('database.php');

  $db = Database::getDB();
  
  $stmt=$db->prepare("SELECT projection.id, title, date FROM projection INNER JOIN movie
  ON projection.movie_id = movie.id");

  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if(isset($_GET["movie"])) {
      
      $projection_id = ($_GET["movie"]);
      
      $username = $_SESSION['username'];
      $stmt=$db->prepare("SELECT id FROM users WHERE username = :username");
      $stmt->execute(["username" => $username]);
      $result2 = $stmt->fetch(PDO::FETCH_ASSOC);
      
      $user_id=$result2["id"];

      $stmt=$db->prepare("INSERT INTO reservation (user_id,projection_id) VALUES(:userid , :projectionid) ");
      $stmt->execute(["userid" => $user_id, "projectionid" => $projection_id]);


  }

 

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">


  
  table {
    border-collapse:collapse;
    table-layout:fixed;
    width:100%;
    height: 50%;
    color:white;
    
  }

  th {
    display:none;
  }

  td, th {
    height:53px
  }

  

  td,th {
     border:1px solid #DDD;
     padding:10px;
     empty-cells:show;
  }
  td,th {
    text-align:left;
  }

  td+td, th+th {
    text-align:center;
    display:none;
  }

  td.default {
    display:table-cell;
  }


  .sep {
    
    font-weight:bold;
    font-size: 150%;
    color: #ffffff;
  }

  @media (min-width: 640px) {

    td,th {
      display:table-cell !important;
    }

    td,th {
      width: 330px;

    }

    td+td, th+th {
      width: auto;
    }

  }

  </style>

<body>
<?php include("menu.php") ?> 
<table>

    <thead>
      <tr class="sep">
        <th>Film címe</th>
        <th>Vetítés ideje</th>
      </tr>
    </thead>
    
    <tbody>
      <?php
        $str = ""; 
        foreach ($result as $rows) {
            $str = $str."<tr>";
            $id = "";
            foreach($rows as $key => $value) {
                if($key == "id") {
                    $id = $value;
                }
                if($key == "title") {
                    $str = $str."<td>".$value."</td>";
                }

                if($key == "date") {
                    $str = $str."<td><a href='?movie=".$id."'>".$value."</a></td>";
                }
            }
            $str=$str."</tr>";
        }
        echo($str);
      ?>

    </tbody>
  </table>


</body>

</html>