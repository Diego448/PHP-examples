<?php
	/**
	 * Class members
	 */
	class Persons {
		public $persons = [];
		/**
		 * @param Array $persons
		 */
		function __construct( Array $persons) {
			$this -> persons = $persons;
		}
		/**
		 * @abstract Modify array persons by their nickname
		 * @return NUll
		 * @param string $nick - the nickname to search for
		 */
		function getByNickName($nick) {
			// foreach($this -> persons as $person) {
			// if ($person -> nick === $nick) {
			// 	return $person;
			// }
			// }
			$this -> persons = array_filter($this -> persons, function($person) use ($nick){
				return ($person -> nick === $nick);
			});
		}
		/**
		 * @abstract Modify array persons by their ages
		 * @return void NUll
		 * @param int $age - the age to search for
		 */
		function getByAge($age) {
			$now = new DateTime("now");
			$this -> persons = array_filter($this -> persons, 
				//Retrieves the age of every person and then compares to the given age
				function($person) use ($age, $now) {
					$interval = $person -> dob -> diff($now) -> y;
					return ($interval === $age);
			});
		}
		function __toString() {
			$this -> persons = array_map(
				function($person) {
					//Calculate the differences between dates for get the age and then adds it to the aobject
					//Modify the format of the date to show it
					$now = new DateTime("now");
					$person -> age = $person -> dob -> diff($now) -> y;
					$person -> dob = $person -> dob -> format("D M Y");
					return $person;
				}, $this -> persons);
			return json_encode($this -> persons);
		}
	}
	//$persons = new Persons();
	//Sets the default timezone for this doc
	date_default_timezone_set("America/Mexico_City");
	//Array of persons, converted into a object
	$persons = [
			(object)["nick" => "General", "dob" => new DateTime("1994-06-21")],
			(object)["nick" => "Chicharito", "dob" => new DateTime("1988-06-01")] 
	];
	//$test = new Persons([1]);
	$test2 = new Persons($persons);
	//$test2-> getByNickName("General");
	$test2 -> getByAge(20);
	//var_dump($test2 -> persons);
	echo $test2;
?>