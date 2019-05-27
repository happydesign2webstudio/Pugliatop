<?php
class Db
{
	private $conn;
	private $host,$user,$password;
	private $db;
	
	public function __construct($host,$user,$password,$db_name)
	{
		$this->host=$host;
		$this->user=$user;
		$this->password=$password;
		$this->db=$db_name;
	}
	//apro la conessione al db
	public function openConnectionDb()
	{
		$this->conn=mysqli_connect($this->host,$this->user,$this->password,$this->db);
		if(!$this->conn)
		{
			return false;
		}
		
		return true;
	}
	/* questo metodo restituisce i risultati in un array associativo*/
	public function getRows($res_query)
	{
		while($rows = mysqli_fetch_array($res_query, MYSQL_ASSOC))
		{
			$record[] = $rows;
		}
		return $record;
	}
	/*
	 Restituisco il numero dei record della query
	 */
	public function numRows($query)
	{
		$num_rows=mysqli_num_rows($this->execQuery($query));
		return $num_rows;
	}
	/*esecuzione della query*/
	public function execQuery($query)
	{
		return mysqli_query($this->conn,$query);
	}
	//chiudo la connessione
	public function closeConnectionDb()
	{
		mysqli_close($this->conn);
	}
	
}

?>