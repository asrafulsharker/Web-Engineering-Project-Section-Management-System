<?php
// $servername = "localhost";
// $username= "root";
// $password="";
// $dbname="pb";


// $link = mysqli_connect($servername, $username,$password, $dbname);

// $con= mysqli_select_db($link,$dbname);

// if($con){
//     echo("Database Connected successfully!");
// }
// else{
//     die("Not Connected".mysqli_connect_error());
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Information</title>
</head>
<body>
    <form name="prayma bs" action="" method="POST" >
        <table align="center">
        <tr>
            <td>Please Enter Your ID:</td>
            <td><input type="number" name="id" placeholder="201153168" ></td>
        </tr>
        <tr>
            <td>Please Enter Name:</td>
            <td><input type="text" name="username" placeholder="prayma" ></td>
        </tr>
        <tr>
            <td>Please Enter Your Email</td>
            <td><input type="email" name="email" placeholder="prayma15-3168@diu.edu.bd" ></td>
        </tr>
            <td>Please Enter CPA:</td>
            <td><input type="number" name="cgpa" placeholder="" ></td>
        </tr>
        <tr>
            <td>Guardian Name:</td>
            <td><input type="text" name="guardian" placeholder="Gradian Name" ></td>
        </tr>
        <tr>
            <td>Semester:</td>
            <td><input type="text" name="semester" placeholder="10th" ></td>
        </tr>

        <tr>
            <td>
                <input type="submit" value="Insert Data" name="submit1">
                <input type="submit" value="Show Data" name="submit2" >
                <input type="submit" value="Update data" name="submit3" >
                <input type="submit" value="Delete Data" name="submit4" >
            </td>
        </tr>
        </table>

    </form>
    
</body>
</html>

<?php
if (isset($_POST["submit1"])){



    mysqli_query($link, "INSERT INTO st VALUES('$_POST[id]', '$_POST[username]', '$_POST[email]', '$_POST[cgpa]')");


    echo"Insert Data Successfully";
}
if(isset($_POST["submit2"])){
    $res = mysqli_query($link,"SELECT * FROM student_information");
    echo"<table border=1>";
  echo "<tr>";
  echo "<th>"; echo"ID" ; echo"</th>";
  echo "<th>"; echo"Name" ; echo"</th>";
  echo "<th>"; echo"Email" ; echo"</th>";
  echo "<th>"; echo"CGPA" ; echo"</th>";
  echo "<th>"; echo"Guardian" ; echo"</th>";
  echo "<th>"; echo"Semester" ; echo"</th>";
  echo "</tr>";
  while($row =mysqli_fetch_array($res)){
    echo"<tr>";
    echo"<td>"; echo "$row[id]"; echo"</td>";
    echo"<td>"; echo "$row[username]"; echo"</td>";
    echo"<td>"; echo "$row[email]"; echo"</td>";
    echo"<td>"; echo "$row[cgpa]"; echo"</td>";
    echo"<td>"; echo "$row[guardian]"; echo"</td>";
    echo"<td>"; echo "$row[semester]"; echo"</td>";
    echo"</tr>";
 
  }
  echo "</table>";
}
if(isset($_POST["submit3"])){
    mysqli_query($link, "UPDATE student_information SET email='$_POST[email]' WHERE id='$POST[id]' ");
}
if(isset($_POST["submit4"])){
    mysqli_query($link, "DELETE FROM student_information WHERE id='$_POST[id]' ");
}


?>