
<head>
    <title>Add Data</title>
</head>

<?php
include_once("../model/DbContext.php");
include_once("../model/requestCustomer.php");


?>



<body>


<br/><br/>
<?php  if (!isset($db)) {
    $db =new DbContext();
}
if(isset( $_post['submit'])) {

    $request = new request( $_POST('UserFirstName') ,$_POST('UserLastName'),$_POST('UserEmail'));
    $success=$db->Sp_insertCustomer($request);
}


if(isset($_POST['Submit'])) {
    $fname=(isset($_POST['UserFirstName']));
    $Lname=(isset($_POST['UserLastName']));

    $email=(isset($_POST['UserEmail']));


// checking empty fields
    if (empty($fname) || empty($Lname) || empty($email)) {

        if (empty($fname)) {
            echo "<span style=\"color: red; \">Name field is empty.</span><br/>";
        }

        if (empty($Lname)) {
            echo "<span style=\"color: red; \">Lnamefield is empty.</span><br/>";
        }

        if (empty($email)) {
            echo "<span style=\"color: red; \">Email field is empty.</span><br/>";
        }
    }
}

?>
//link to the previous page
echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";




//display success message
echo "<span \ green; style=\"color:">Data added successfully.";echo "<br/><a href='AdminForCustomer.php'>View Result</a>";





</body>

</html>