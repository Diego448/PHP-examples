<?php
	//Sets the default timezone for this doc
	date_default_timezone_set("America/Mexico_City");
	//Array of persons, converted into a object
	$persons = [
			(object)["nick" => "General", "dob" => new DateTime("1994-06-21")],
			(object)["nick" => "Chicharito", "dob" => new DateTime("1988-06-01")] 
	];
	/**
	 * @abstract Function to retrieve persons by their nickname
	 * @return stdClass $person
	 * @param Array $persons
	 * @param string $nick
	 */
	function getByNickName($persons, $nick) {
		foreach($persons as $person) {
			if ($person -> nick === $nick) {
				return $person;
			}
		}
	}
	//var_dump(getByNickName($persons, "General"));
	//echo json_encode(getByNickName($persons, "General")), PHP_EOL;
	/**
	 * @abstract function to retrieve persons by age
	 * @return Array $matching
	 * @param Array $persons - more info
	 * @param int $age
	 */
	function getByAge($persons, $age) {
		$matching = [];
		$now = new DateTime("now");
		foreach ($persons as $person) {
			$interval = $person -> dob -> diff($now) -> y;
			if ($age === $interval) {
				array_push($matching, $person);
			}
		}
		return $matching;
	}
	$fruits = [
		"lemons" => 4,
		"apples" => 5,
		"oranges" => 1
	];
	echo "Number of fruits: ".array_sum($fuits)
	var_dump(getByAge($persons, 26));	
?>