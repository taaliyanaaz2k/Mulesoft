<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulesoft</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mulesoft";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("DB CONNECT UNSUCCESSFULL!!");
}


?>
<?php
    if(isset($_GET['insert'])&& $_GET['insert']==true)
    {
      echo '<h1>Inserted</h1>';
   }
    if($_SERVER["REQUEST_METHOD"]=='POST')
    {
        $name=$_POST['name'];
        $act=$_POST['actor'];
        $acts=$_POST['actress'];
        $dir=$_POST['director'];
        $yop=$_POST['yor'];

        $sql="INSERT INTO `movies` (`name`, `actor`, `actress`, `director`, `year_of_release`) VALUES ('$name', '$act', '$acts', '$dir', '$yop')";
        $result=mysqli_query($conn,$sql);

        if($result)
            {
                header('Location:index.php?insert=true');
                
            }


    }
?>
<hr>
<h1>Insert</h1>
    <form action="index.php" method="POST">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="actor" placeholder="Actor"><br>
    <input type="text" name="actress" placeholder="Actress"><br>
    <input type="text" name="director" placeholder="Director"><br>
    <input type="text" name="yor" placeholder="yor"><br>
<button type="submit">
Insert
</button>
    </form>

    <hr>
    <h1>Fetch All</h1>

    <table >
        <thead>
            <tr>
                <th>Movie Name</th>
                <th>Actor</th>
                <th>Actress</th>
                <th>Director Name</th>
                <th>Year of release</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $sql = "SELECT * FROM `movies`";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)){
                echo "
                <tr>
                    <td>". $row['name'] . "</td>
                    <td>". $row['actor'] . "</td>
                    <td>". $row['actress'] . "</td>
                    <td>". $row['director'] . "</td>
                    <td>". $row['year_of_release'] . "</td>
                </tr>";
              } 
            ?>
        </tbody>
        </table>

<br><br><hr>




</body>
</html>