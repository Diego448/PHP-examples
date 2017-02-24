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
              "Gender" => "Female",
              "bornDate" => mktime(0, 0, 0, 8, 18, 1991),
              "nickName" =>"Pao");
  //Diego's data
  $person[4] = array("firstName" => "Diego",
              "lastName" => "Serrano",
              "gender" => "male",
              "bornDate" => mktime(14, 0, 0, 6, 21, 1994),
              "nickName" => "General");
  //echo $person[0] => firstName;
  //echo (time() - mktime(0, 0, 0, 6, 21 ,1994)) / 31556926;
  //getAge($person, 0);
  //Call to the functions to display the results
  getAllRegistries($person);
  getAllDataForNickname($person, "General");
  getRegistriesForAge($person, 22);
	//Get all registries for their firstName, just for list them
  function getAllRegistries($person){
		foreach($person as $registry){ //Loop throughout the full array
      echo "<p>"."getAllRegistries: ".$registry["firstName"]."</p>";
      //var_dump($registry["firstName"]);
		}
	}
  //Retrieve the age of one reigistry
  function getAge($person2){
    return intval(((time() - $person2["bornDate"]) / 31556926));
  }
  //Retrieve all the data stored in all registries
    function getAllDataForNickname($person, $nickname){
      foreach($person as $registry){ //Loop throughout the full array
        if($registry["nickName"] == $nickname){ //Check if the criteria matches
        echo "<p>"."getAllDataForNickname: ".$registry["firstName"]."</p>";
        echo "<p>"."getAllDataForNickname: ".$registry["lastName"]."</p>";
        echo "<p>"."getAllDataForNickname: ".$registry["gender"]."</p>";
        echo "<p>"."getAllDataForNickname: ".date("M-d-Y", $registry["bornDate"])."</p>";
        echo "<p>"."getAllDataForNickname: ".$registry["nickName"]."</p>";
        //var_dump($registry["firstName"]);
        }
      }
    }
  //Iterates over the whole array and retrieves the data that matches with the criteria, in this case the age
  function getRegistriesForAge($person, $age){
    foreach($person as $registry){ //Loop throughout the full array
      /*if (intval(((time() - $registry["bornDate"]) / 31556926)) == $age){
        echo "<p>"."getRegistriesForAge: ".$registry["firstName"]."</p>";
      }*/
      if (getAge($registry) == $age){ //Check if the criteria matches
        echo "<p>"."getRegistriesForAge: ".$registry["firstName"]."</p>";
      }
    }
  }
  ?>