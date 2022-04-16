<html>
<body>
    
<?php
    
    $user = $_POST["username"];
    $pass = $_POST["password"];
    
    $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "muhammad_haikal_website";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      } 



    // check empty
    if (empty($user) && empty($pass)) {
      echo "<br>Empty input! ...";
    }
    else{
      echo "
        <script> 
        document.cookie = '$user';
        </script>
      ";

      echo "Cookie Created<br>Username: ". $user;

      
      

      
      
      $sql = "INSERT INTO person (`username`, `pass`)
      VALUES ('$user', '$pass')";

      if ($conn->query($sql) === FALSE) {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    

      $conn->close();

      header("Refresh: 2; url=index.php");
      // header("Location: index.php");
    

      
?>


<button onclick="back()" id="homeBut">Back home</button>

    <script>
      function back() { 
        window.location.href = "index.php";
       }
    </script>

</body>
</html>

