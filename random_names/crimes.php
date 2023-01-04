<?php
$crimes = array(
  "Arson",
  "Assault",
  "Burglary",
  "Counterfeiting",
  "Credit card fraud",
  "Cyberbullying",
  "Destruction of property",
  "Drug possession",
  "Drug trafficking",
  "Embezzlement",
  "Extortion",
  "Forgery",
  "Hacking",
  "Harassment",
  "Identity theft",
  "Impersonation",
  "Indecent exposure",
  "Insurance fraud",
  "Kidnapping",
  "Larceny",
  "Manslaughter",
  "Money laundering",
  "Murder",
  "Obstruction of justice",
  "Perjury",
  "Piracy",
  "Possession of stolen property",
  "Prostitution",
  "Public indecency",
  "Purchasing alcohol as a minor",
  "Robbery",
  "Sexual assault",
  "Shoplifting",
  "Solicitation",
  "Terrorism",
  "Trespassing",
  "Unauthorized use of a vehicle",
  "Vandalism",
  "Abuse of power",
  "Animal cruelty",
  "Bribery",
  "Computer fraud",
  "Conspiracy",
  "Criminal mischief",
  "Criminal trespass",
  "Disorderly conduct",
  "Disturbing the peace",
  "Drug manufacture",
  "Escape",
  "Evasion of arrest",
  "Falsification of records",
  "False advertising",
  "Fraud",
  "Gambling",
  "Grand theft",
  "Hit and run",
  "Identity fraud",
  "Intimidation",
  "Interference with a police officer",
  "Interference with custody",
  "Interference with the judicial process",
  "Interference with a witness",
  "Involuntary manslaughter",
  "Kidnapping and false imprisonment",
  "Loitering",
  "Manslaughter by negligence",
  "Misdemeanor",
  "Obstruction of a police officer",
  "Possession of a controlled substance",
  "Possession of a weapon on school property",
  "Possession of stolen goods",
  "Probation violation",
  "Promoting prostitution",
  "Rape",
  "Reckless driving",
  "Resisting arrest",
  "Soliciting for prostitution",
  "Theft",
  "Threatening behavior",
  "Unauthorized use of a computer",
  "Unauthorized use of a credit card",
  "Welfare fraud",
  "Wire fraud"
);

$hostname = "localhost";
$database = "jdis";
$username = "root";
$password = "";
$db = mysqli_connect($hostname, $username, $password, $database);


echo "<a href='index.php'>Back</a>";
echo "<br>";
echo "<br>";

for ($i = 0; $i < count($crimes); $i++) {
    $crime = $crimes[$i];
    $query = "INSERT INTO offense_tbl (`offense_name`) VALUES ('$crime')";
    if (mysqli_query($db, $query)) {

      echo "<br>";
      echo "Successfully inserted ".$crime." crimes";
      
    } else {

      echo "<br>";
      echo "Error inserting ".$crime." crimes";

    }
  }

echo "<br>";
echo "<br>";
echo "<a href='index.php'>Back</a>";

?>
