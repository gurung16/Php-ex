<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Styles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>

<form class="user" action="index.php" method="POST">
  <input type="text" name="x" value="" placeholder="Product Id">
  <input type="submit" name="Submit" value="Submit">
</form>
<div class="test">
  <?php
      include 'db_conn.php';
      if(!empty($_POST['x'])){
      $user = $_POST["x"];
      $sql = "SELECT * FROM stock WHERE product_id = '$user'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          echo "<table><tr><th>ID</th>
                           <th>Name</th>
                           <th>qty</th>
                           <th>Restock Date</th>
                           <th>Restock Qty</th</tr>";
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["product_id"].
                  "</td><td>" . $row["product_name"].
                   "</td><td>". $row["product_name"].
                   "</td><td>". $row["re_date"].
                   "</td><td>".$row["re_qty"].
                    "</td></tr>";
          }
          echo "</table>";
      } else {
          echo "0 results";
      };
    };



    $conn->close();
?>


  </body>
</html>
