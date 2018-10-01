<!DOCTYPE html>
<html>
<head>
  <title>details</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>
<body>
  <div class="container">
    <br />
    <h4>Records Found:</h4>
    <br />
  <?php
    include("./connect.php");
    $name = $_POST['name'];
    $sql = "SELECT * FROM details WHERE name='".$name."'";
    $result = $conn->query($sql);
    if($result) {
      if($result->num_rows>0)
      {
        echo "<table class=\"table table-striped\">" .
            "<tr><th>Name</th><th>Phone</th><th>Email</th></tr>";
        while($row=$result->fetch_assoc())
        {
          echo "<tr><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["email"]."</td></tr>";
        }
        echo "</table>";
      }
      else {
          echo "There is no record with the name ".$name;
      }
    }
    else {
      echo "There is no record with the name ".$name;
    }
   ?>
   <br />
   <br />
   <a href="./index.php"><button class="btn btn-primary">Go back</button></a>
 </div>
</body>