<?php
class Databases
{
	protected $q;

	function __construct()
	{
		require_once __DIR__ . "/../config.php";

		$this->q = new mysqli(host_name, host_user, host_pass, host_data);

		if ($this->q->connect_error) {
			echo "Database Error!";
			exit();
		}
	}

	function query($query)
	{
		return $this->q->query($query);
	}

	function count($query)
	{
		$fetch = $this->query($query);
		return $fetch->num_rows;
	}

	function fetch($query)
	{
		$fetch = $this->query($query);
		return $fetch->fetch_assoc();
	}

	function fetchAll($query)
	{
		$fetch = $this->query($query);
		$result = [];

		while ($all = $fetch->fetch_assoc()) {
			array_push($result, $all);
		}

		return $result;
	}

	function id()
	{
		return $this->q->insert_id;
	}
}
