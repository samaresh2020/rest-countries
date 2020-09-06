<?php
// Create connection
$connection = mysqli_connect('localhost','root','','exam');
// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

$query1 = "SELECT * FROM rest_countries";
$results = mysqli_query($connection,$query1);
foreach ($results as $result) {
	$d = json_decode($result['country']);
}
?>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<table>
  <tr>
    <th>Name</th>
    <th>Capital</th>
    <th>Nativename</th>
    <th>Region</th>
    <th>Action</th>
 
  </tr><?php
  foreach ($d as $s) {?>
  <tr>
    <td><input type="text" name="<?php print_r($s->name); ?>" value="<?php print_r($s->name); ?>"></td>
    <td><input type="text" name="<?php print_r($s->name); ?>" value="<?php print_r($s->capital); ?>"></td>
    <td><input type="text" name="<?php print_r($s->name); ?>" value="<?php print_r($s->nativeName); ?>"></td>
    <td><input type="text" name="<?php print_r($s->name); ?>" value="<?php print_r($s->region); ?>"></td>
    <td><form action="#" method="POST"> <input type="submit" value="Update" name="submit"></form></td>
    
  </tr>
  <?php } ?>
</table>

</body>
</html>

<?php

   if(isset($_POST['submit'])){
   /*  $query =  "UPDATE rest_countries SET country = JSON_MODIFY(rest_countries,'$.name','afganisthan1') 
     WHERE key = name";
     $result = mysqli_query($connection,$query);
     if($result)
      echo "done";
    else
      echo "not";n*/

    //  print_r($d);
      $update_array = $d;

      foreach ($update_array as $key => $testimonials) {
    $name = mysql_real_escape_string($testimonials->name);
    $capital = mysql_real_escape_string($testimonials->capital);
   // $id = intval($testimonials->id);

    $sql = "UPDATE testimonials SET name='$name', capital='$capital' WHERE name=Afghanistan";
    $result = mysqli_query($connection,$sql);
    if ($result === FALSE) {
        die(mysqli_error());
    }
    else
      echo "done";

}

   }
 
