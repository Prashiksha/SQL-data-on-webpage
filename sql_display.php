<?php
//Adding html content in php file
echo "PHP FILE CONTENT <br>";
echo "SQL DB FILE CONTENT";
echo "<br>";
include('sql_style.html'); //gives background color

//To display content of sql table 

$username="prashiksha";  
$password="jainjain";  
$hostname = "localhost";  
$database = "dbname";
//connection string with database  
$dbhandle = mysqli_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");  
echo "";  
// connect with database / selecting database 
$selected = mysqli_select_db($dbhandle, $database)  
  or die("Could not select examples");  
//query fire  
$result = mysqli_query($dbhandle,"select * from CUSTOMERS;");  //CUSTOMERS is a table in database 'dbname'

$json_response = array();  
// fetch data in array format  
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {   //store the data in array's ASSOCIATIVE INDICES
// Fetch data of Fname Column and store in array of row_array
$row_array['Id'] = $row['ID']; 
$row_array['Name'] = $row['NAME']; 
$row_array['Age'] = $row['AGE']; 

//push the values in the array  
array_push($json_response,$row_array);  //array_push(array_name, values) pushes the new values at the end of  array 
}  
echo json_encode($json_response); // returns decoded json value of array
mysqli_free_result($result); //frees the memory associated with the result

?>

