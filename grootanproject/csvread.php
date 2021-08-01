<?php  
$connect = mysqli_connect("localhost", "root", "", "ecommerce_datacsv");
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
                $item1 = mysqli_real_escape_string($connect, $data[0]);  
                $item2 = mysqli_real_escape_string($connect, $data[1]);
                $item3 = mysqli_real_escape_string($connect, $data[2]);  
                $item4 = mysqli_real_escape_string($connect, $data[3]);
                $item5 = mysqli_real_escape_string($connect, $data[4]);
                $item6 = mysqli_real_escape_string($connect, $data[5]);  
                $item7 = mysqli_real_escape_string($connect, $data[6]);
                $query = "INSERT into products_detailsordered(Order_ID,Customer_ID,Customer_Name,Country,State,Product_Name) values('$item1','$item2','$item3','$item4','$item5','$item6')";
                mysqli_query($connect, $query);
   }
   fclose($handle);
   echo "<script>alert('Data Pushed into Database Successfully');</script>";
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Order Details</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head> 
 <style>
img {
  float:left;
  margin: 0px 0px 15px 40px;
}
div {
  text-align: justify;
  text-justify: inter-word;
  font-size: 20px;
}
</style> 
 <body>  
  <br>
  <h1 align="center" style="color:darkblue;"><strong>A2Z Data Skimmer</strong></h1><br/>
<marquee direction="left" style="color:red";><p>In this web page we can upload the csv file to dynamically enter the data into the database.Please upload the file below.....</p>
</marquee>
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <p><img src="image/bg_img.png" width="700" height="550"></p><div><br><br><br><br><br>
    <label><p style="color:black";>Select CSV File read and insert data into the DataBase</p></label><br><br>
    <center><input type="file" name="file" /></center>
    <br/>
   <center><input type="submit" name="submit" value="Import" class="btn btn-success" /></center>
   </div></form></div>
  </form>
 </body>  
</html>