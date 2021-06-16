<?php
	 $serverName = "localhost";
	 $userName   = "root";
	 $password   = "";
	 $dbName     = "hospital";
	function execute($query) //executing non query
	{
		global $serverName;
		global $userName;
		global $password;
		global $dbName;
		$conn = mysqli_connect($serverName, $userName,  $password, $dbName);
		mysqli_query($conn,$query);
		mysqli_close($conn);
	}
	
	function get($query)
	{   
		global $serverName;
		global $userName;
		global $password;
		global $dbName;
		$data   = array();
		$conn   = mysqli_connect( $serverName, $userName, $password, $dbName);
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $entity=array();//associative array
                foreach($row as $k=>$v)           
                {
                    $entity[$k] = $row[$k];    
                }
                $data[] = $entity;																
            }
        }

        mysqli_close($conn);
        
		return $data;
	}
	
	
?>