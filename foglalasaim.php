<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('location:/login.php');
}

include('database.php');

  $db = Database::getDB();
  
  $stmt=$db->prepare("SELECT movie.title, projection.date FROM reservation INNER JOIN projection
  ON reservation.projection_id = projection.id inner join users on
  reservation.user_id=users.id inner join movie on projection.movie_id=movie.id where users.username=:username");
  $stmt->execute(["username" => $_SESSION['username']]);

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  

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
            
            foreach($rows as $value) {
                $str = $str."<td>".$value."</td>";

            }
            $str=$str."</tr>";
        }
        echo($str);
      ?>

    </tbody>
  </table>

</body>

</html>