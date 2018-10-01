<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "details";
    $mysqli = new mysqli($servername,$username,$password);
    $doesDBExist=$mysqli->select_db($dbname);
    $mysqli->close();
    if(!$doesDBExist)
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('No DB found. Press OK to create DB and tables');
        window.location='./create.php';
        </script>");
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Stage-6</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>
  <script>
    function showUser(str) {
      if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","getuser.php?q="+str,true);
          xmlhttp.send();
    }
}
</script>
<body>
  <div class="container">
    <br />
    <h4><center>Records</center></h4>
    <label class="mr-sm-2"><h5>Enter name to search:</h5></label>
    <input type="text" class="form-control mb-2 mr-sm-2" name="name" onChange="showUser(this.value)">
    <br />
    <div id="txtHint"></div>
    <br />
    <h4><center>All Records</center></h4>
    <br />
    <?php
      include("./connect.php");
      $sql = "SELECT * FROM details";
      $result = $conn->query($sql);
      if($result) {
        if($result->num_rows>0)
        {
          echo '<table class=\"table table-striped\">' .
              '<tr><th>Name</th><th>Phone</th><th>Email</th><th></th></tr>';
          while($row=$result->fetch_assoc())
          {
            echo '<tr><td>'.$row["name"].
            '</td><td>'.$row["phone"].
            '</td><td>'.$row["email"].
            '</td><td><a href=\"./delete.php?del='.$row["email"].'\"><button class="btn btn-danger btn-small">Delete</button></a></td></tr>';
          }
          echo "</table>";
        }
        else {
          echo "There are no records in the database";
        }
      }
    else {
      echo "There are no records in the database";
    }
   ?>
   <hr />

   <h4>Enter values of new record to insert into database:</h4>
   <br />
   <form action="./insert.php" method="post">
     <label class="mr-sm-2">Name:</label>
     <input type="text" class="form-control mb-2 mr-sm-2" name="name">
     <label class="mr-sm-2">Phone:</label>
     <input type="number" class="form-control mb-2 mr-sm-2" name="phone">
     <label class="mr-sm-2">Email:</label>
     <input type="email" class="form-control mb-2 mr-sm-2" name="email">
     <button type="submit" class="btn btn-success mb-2">Submit</button>
   </form>
   <br />

 </div>
</body>
</html>
