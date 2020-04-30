<?php
include("library/json-db.class.php");

// Instantiate the class with default name (db.json)
$db = new DB();

// You can also instantiate another db with a custom name (custom-name.json)
$db2 = new DB("custom-name");

$data = array(
    "id" => 1,
    "name" => "John",
    "surname" => "Doe"
);
// Add a new field to the db, passing the data (an array) and the key (in this case, the id)
$db->insert($data, $data['id']);

// Show one single result based on the key
$result = $db->getSingle($data['id']);

// Show several results based on array query (in this case, all the fields with name: "John" and surname: "Doe")
$query = [ 
    "name" => "John",
    "surname" => "Doe"
];
$result2 = $db->getList($query);

// Remove the row from the db based on the key you pass
$db->delete($data['id']);
?>