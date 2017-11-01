<?php
$dsn = 'mysql:dbname=sd686;host=sql1.njit.edu';
$user = 'sd686';
$password = 'ZOm1EN5l3';
try {
    //new connection
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully</br>';
} catch (PDOException $e) {
    //connection failure
    echo 'Connection failed: ' . $e->getMessage().'</br>';
}

try {

    $htmlTable="";
    $formTable="";
    $arraylength=0;
    //prepared statement
    $statement = $dbh->prepare('SELECT * FROM accounts where ID<6');
    $statement->execute();

    $htmlTable .='<table border="1">';
    //table header generation
    $htmlTable .= '<tr><th>ID</th><th>Email</th><th>Fname</th><th>Lname</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>';
    //table row generation
    while($result = $statement->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $result;
        $htmlTable .= '<tr><td>'.$result['id'].'</td><td>'.$result['email'].'</td><td>'.$result['fname'].'</td>';
        $htmlTable .= '<td>'.$result['lname'].'</td><td>'.$result['phone'].'</td><td>'.$result['birthday'].'</td>';
        $htmlTable .= '<td>'.$result['gender'].'</td><td>'.$result['password'].'</td></tr>';
    }

    $htmlTable .= '</table>';

    //Counting number of records fetched
    $formTable .= 'Number of records: '.count($results).'</br>';
    $formTable .= $htmlTable;

    echo $formTable;

} catch (PDOException $e) {

    //sql query failure
    echo $sql . "<br>" . $e->getMessage();
}
?>