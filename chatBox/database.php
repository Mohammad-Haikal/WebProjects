<html>
<body>
<style>
  body{
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  table {
    margin: auto;
    margin-top: 50px;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
    border-radius: 60px;
  }
  
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  
  tr:nth-child(even) {
    background-color: #dddddd;
  }
  form{
    text-align: center;
    margin-top: 100px;
  }
  button, input[name="button"]{
    font-size: 1rem;
    margin: auto;
    border-radius: 20px;
    padding: 5px;
    color: white;
    background-color: #007BFF;
    width: 50%;
    border: 2px solid black;
  }
  input[name="button"]{
    background-color: red;
  }
  input[name="button"]:hover{
    background-color: #ff0800af;
  }

  button:hover{
    background-color: #218afae5;
  }  
  </style>    



<?php
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

$q = "SELECT username, pass FROM `person` WHERE 1";
$result = $conn->query($q);
echo '
    <table>
    <tr>
        <th>Username</th>
        <th>Password</th>
    </tr>
    ';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr><td>'.$row["username"].'</td>'. " <td> ". $row["pass"]."</td></tr>";
    }
} else {
    echo "0 results";
}

echo '</tr></table>';


$conn->close();


// header("Refresh: 2; url=index.php");

?>
<form action="./deleteData.php" method="post">
        <input id="formBtn" onclick="deletionSure(event)" type="submit" name="button" value="Delete Table Data"/>
</form>
<button onclick="back()" id="homeBut">Back home</button>

    <script>
      function back() { 
        window.location.href = "index.php";
       }

      function deletionSure(event) {
        var txt;
        if (confirm("Are you sure that you want to delete the database !?")) {
          document.getElementById("formBtn").submit();
        } else {
          event.preventDefault();
        }
        document.getElementById("demo").innerHTML = txt;
      }
       
    </script>



</body>
</html>