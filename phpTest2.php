<?php
  $index = 0;
  //Javier's data
	$person[0] = array("firstName" => "Javier",
              "lastName" => "Rodríguez",
              "gender" => "male",
              "bornDate" => mktime(0, 0, 0, 3, 20, 1994),
              "nickName" => "rjavier");
	//solrac data
	$person[1] = array("firstName" => "Carlos Alfredo",
              "lastName" => "Gomez Gonzalez",
              "gender" => "male",
              "bornDate" => mktime(0, 0, 0, 2, 13, 1990),
              "nickName" => "Fredy");
	//caps data
	$person[2] = array("firstName" => "Carlos",
              "lastName" => "padilla",
              "gender" => "male",
              "bornDate" => mktime(0, 0, 0, 10, 17, 1993),
              "nickName" => "carlos");
	//pao data
	$person[3] = array("firstName" => "Paola",
              "lastName" => "Alemán",
              "Gender" => "female",
              "bornDate" => mktime(0, 0, 0, 8, 18, 1991),
              "nickName" =>"Pao");
  //Diego's data
  $person[4] = array("firstName" => "Diego",
              "lastName" => "Serrano",
              "gender" => "male",
              "bornDate" => mktime(14, 0, 0, 6, 21, 1994),
              "nickName" => "General");
  //Call to the functions to display the results
  if(!isset($_GET["nickName"]) && !isset($_GET["age"])){
    echo json_encode(getAllRegistries($person));
  }

  if(isset($_GET["nickName"]) && $_GET["nickName"] !== "") {
      echo json_encode(getAllDataForNickname($person, $_GET["nickName"]));
  }
  if(isset($_GET["age"])){
      echo json_encode(getRegistriesForAge($person, $_GET["age"]));
    }
	//Get all registries for their firstName, just for list them
  function getAllRegistries($person){
    $all = [];
		foreach($person as $registry){ //Loop throughout the full array
      array_push($all, $registry);
		}
    return $all;
	}
  //Retrieve the age of one reigistry
  function getAge($person2){
    return intval(((time() - $person2["bornDate"]) / 31556926));
  }
  //Retrieve all the data stored in all registries
    function getAllDataForNickname($person, $nickname){
      foreach($person as $registry){ //Loop throughout the full array
        if($registry["nickName"] == $nickname){ //Check if the criteria matches
          $registry["age"] = getAge($registry);
          return $registry;
          break;
          /*echo $registry["firstName"];
          echo $registry["lastName"];
          echo $registry["gender"];
          echo date("M-d-Y", $registry["bornDate"]);
          echo $registry["nickName"];*/
          //var_dump($registry["firstName"]);
        }
      }
    }
  //Iterates over the whole array and retrieves the data that matches with the criteria, in this case the age
  function getRegistriesForAge($person, $age){
    $match = [];
    foreach($person as $registry){ //Loop throughout the full array
      if (getAge($registry) == $age){ //Check if the criteria matches
        array_push($match, $registry);
      }
    }
    return $match;
  }
  ?>