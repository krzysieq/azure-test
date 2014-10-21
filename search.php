<html>
<head>
<Title>Search the database</Title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php require_once("nav.php"); ?>
<h1>Search</h1>
<form method="post" action="search.php" enctype="multipart/form-data" >
      Query  <input type="text" name="query" id="query" value="<?php echo $_POST['query']; ?>"/></br>
      <input type="submit" name="submit" value="Submit" />
</form>
<?php
    require_once("db.php");
    
    if(!empty($_POST)) {
        $query = $_POST['query'];

        // Retrieve data
        $sql_select = "SELECT * FROM registration_tbl WHERE (name = ?) OR (email = ?) OR (company = ?)";
        $stmt = $conn->prepare($sql_select);
        $stmt->bindValue(1, $query);
        $stmt->bindValue(2, $query);
        $stmt->bindValue(3, $query);
        $stmt->execute();
        $results = $stmt->fetchAll();
        if(count($results) > 0) {
            echo "<h2>Search results:</h2>";
            echo "<table>";
            echo "<tr><th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Company</th>";
            echo "<th>Date</th></tr>";
            foreach($results as $result) {
                echo "<tr><td>".$result['name']."</td>";
                echo "<td>".$result['email']."</td>";
                echo "<td>".$result['company']."</td>";
                echo "<td>".$result['date']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<h3>No records found.</h3>";
        }
    }
    
?>
</body>
</html>