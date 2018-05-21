<?php 
	


	 $request = $_POST;
	 $ci =& get_instance(); 
	// chargement de la class "database" pour l'utilisation des paramètres de config dans le tableau $db
	// du fichier databable.php situé dans application/config/ 
	$ci->load->database();

	// config générale
	$sql_details = array(

		'user' => $ci->db->username,
		'pass' => $ci->db->password,
		'db' => $ci->db->database,
		'host' => $ci->db->hostname
	);

	$conn = mysqli_connect($sql_details["host"], $sql_details["user"], $sql_details["pass"], $sql_details["db"]);
	$test_encoding = mysqli_set_charset($conn, "utf8") or die("failed to set encoding.");
	$sql = "SELECT `" . implode("`, `", pluck($columns, 'db')) . "`";
	$sql.= " FROM `$table`";

	$query=mysqli_query($conn, $sql) or die("An error has occurred Error:" . mysqli_error($conn));
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;

   
		$sql = "SELECT `" . implode("`, `", pluck($columns, 'db')) . "`";
		$sql.= " FROM `$table` WHERE 1 = 1";

		if(isset($whereClause)){
			$sql.= " AND " . $whereClause;
		}
		if(isset($orders)){
			$sql.= $orders;
		}
	  //print_r($sql); exit();
	//global search
	if( isset($request['search']) && $request['search']['value'] != '' ) {   //name
	    $sql.=" AND ";
	    $globalSearch = array();
	    $dtColumns = pluck( $columns, 'dt' );
	    $str = $request['search']['value'];
	    for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
	    	$requestColumn = $request['columns'][$i];
	    	$columnIdx = array_search( $requestColumn['data'], $dtColumns );
	    	$column = $columns[ $columnIdx ];
	    	if ( $requestColumn['searchable'] == 'true') {
					$globalSearch[] = "`".$column['db']."` LIKE '%".$str."%'";
				}

	    }


	    if ( count( $globalSearch ) ) {
			$sql .= '('.implode(' OR ', $globalSearch).')';
		}
	}



	//print_r($columns);


	//individual search
	if ( isset( $request['columns'] ) ) {
		$columnSearch = array();
		$dtColumns = pluck( $columns, 'dt' );
		for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
			$requestColumn = $request['columns'][$i];
			$columnIdx = array_search( $requestColumn['data'], $dtColumns );
			$column = $columns[ $columnIdx ];
			$str = $requestColumn['search']['value'];
			if ( $requestColumn['searchable'] == 'true' &&
			 $str != '' && $str != "-" ) {
			 	$range = explode('-', $str);
			 	if(count($range) == 2) {
			 		$minRange = $range[0];
			 		$maxRange = $range[1];
			 		// if (strstr($minRange, "/")) {
			 		// 	$date_part = explode("/", $minRange);
			 		// 	$minRange = mktime(00, 00, 00, $date_part["1"], $date_part["0"], $date_part["2"]);
			 		// 	$date_part = explode("/", $maxRange);
			 		// 	$maxRange = mktime(23, 59, 59, $date_part["1"], $date_part["0"], $date_part["2"]);			 		 	# code...
			 		//  } 
			 		$columnSearch[] = "`" . $column['db'] . "` >= '".$minRange."' AND `" . $column['db'] . "` <= '".$maxRange."'";
			 	}else {
			 		$columnSearch[] = "`".$column['db']."` LIKE '%".$str."%'";
			 	}
				
			}
		}

		if ( count( $columnSearch ) ) {
			$sql.=" AND ";
			$sql.= implode(' AND ', $columnSearch);
		}
	}
	//print_r($columns);
	$query=mysqli_query($conn, $sql) or die("An error has occurred | Error:" . mysqli_error($conn)." | Query:" . $sql);
	$totalFiltered = mysqli_num_rows($query);

	$order = '';
	if ( isset($request['order']) && count($request['order']) ) {
		$orderBy = array();
		$dtColumns = pluck( $columns, 'dt' );
		for ( $i=0, $ien=count($request['order']) ; $i<$ien ; $i++ ) {
			// Convert the column index into the column data property
			$columnIdx = intval($request['order'][$i]['column']);
			$requestColumn = $request['columns'][$columnIdx];
			$columnIdx = array_search( $requestColumn['data'], $dtColumns );
			$column = $columns[ $columnIdx ];
			if ( $requestColumn['orderable'] == 'true' ) {
				$dir = $request['order'][$i]['dir'] === 'asc' ?
					'ASC' :
					'DESC';
				$orderBy[] = '`'.$column['db'].'` '.$dir;
			}
		}
		$order = ' ORDER BY '.implode(', ', $orderBy);
	}

	//print_r($columns);

	/*$limit = '';
	if ( isset($request['start']) && $request['length'] != -1 ) {
		$limit = " LIMIT ".intval($request['start']).", ".intval($request['length']);
	}


	$sql.= $order . $limit; */
	$query=mysqli_query($conn, $sql) or die("An error has line 83 occurred Error:" . mysqli_error($conn)."/n query:" . $sql);
	$data = array();

	while ($row = mysqli_fetch_assoc($query)){
		$data[] = $row;
	}
	
	/*
	 * La fonction mysqli_fetch_all() est deprecated au niveau de certaine version de PHP
	 * Il serait plus bénéfique pour nous d'utiliser $data = mysqli_fetch_assoc($query);
	 */



	$out = array();
	for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
		$row = array();
		for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
			$column = $columns[$j];
			// Is there a formatter?
			if ( isset( $column['formatter'] ) ) {

				if(isset($column['field'])){
					$row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['field'] ], $data[$i] );
				}else{
					$row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i] );

				}
				
			}
			else {
				if(isset($column['field'])){
					$row[ $column['dt'] ] = $data[$i][ $columns[$j]['field'] ];
				}else{
					$row[ $column['dt'] ] = $data[$i][ $columns[$j]['db'] ];

				}
				
			}
		}
		$out[] = $row;
	}


	function pluck($a, $prop )
	{
		$out = array();
		for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
			$out[] = $a[$i][$prop];
		}
		return $out;
	}










 ?>
