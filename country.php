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
    <td><?php print_r($s->name); ?></td>
    <td><?php print_r($s->capital); ?></td>
    <td><?php print_r($s->nativeName); ?></td>
    <td><?php print_r($s->region); ?></td>
    <td><a href="edit.php?name='<?php print_r($s->name); ?>'">Edit</a></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>

