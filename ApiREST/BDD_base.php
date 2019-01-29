<?php 
Require_once 'config.php';
Class BDD
{
	//PDO connection is reached from the singleton class

	//get the selected row
	public Function getAction($table, $key)
	{
		
		 
		try {
            /*TODO : Find if there is an ID and do a prepared request according to the case */
			
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

		
	}

	//update selected table 
	public Function putAction($table, $key, $set)
	{
		
		try {
			/*TODO : prepare the request for one row update */
			
			
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//insert a row from selected table
	public Function postAction($table, $set)
	{
		
		try{
			/*TODO : prepare the request for one row insert */
			
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//delete a row from selected table
	public Function deleteAction($table, $key)
	{
		try{
			/*TODO : prepare the request for one row delete */
			
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}


}
?>