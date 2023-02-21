<?php
	require_once "../../../config/server.php" ;
    // Check if user has requested to get detail
    if (isset($_POST["get_data"]))
    {
        // Get the ID of customer user has selected
        $id = $_POST["id"];
 
		$connect = new PDO("mysql:host=".SERVER."; dbname=".DB, USER, PASS);

		$query = "
            SELECT * FROM tblproducto
            INNER JOIN tbldetproducto on tblproducto.idProducto = tbldetproducto.producto
            INNER JOIN cattallas on tbldetproducto.tallaProducto = cattallas.idTalla
            WHERE tblproducto.idProducto = '".$id."'
		";
	   
		$statement = $connect->prepare($query);
	   
		$statement->execute();

		$statement = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Important to echo the record in JSON format
        echo json_encode($statement);
 
        // Important to stop further executing the script on AJAX by following line
        exit();
    }
?>