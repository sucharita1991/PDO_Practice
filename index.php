<?php
$dsn = 'mysql:dbname=sd686;host=sql1.njit.edu';
$user = 'sd686';
$password = 'ZOm1EN5l3';
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully</br>';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage().'</br>';
}

//$sql = "Select * from accounts where id<6";
try {

    //$dbh->exec($sql);

    $statement = $dbh->prepare('SELECT * FROM accounts where ID<6');
    $statement->execute();
    while($result = $statement->fetch(PDO::FETCH_OBJ)) {
        $results[] = $result;
    }
    echo 'Number of records: '.count($results).'</br>';
    

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>