<?php
# CRUD
# [C]reate
# [R]ead
# [U]update
# [D]elete

  function insert($name, $phone, $email) {
    $sql = "INSERT INTO contacts (name, phone, email) VALUES (?, ?, ?)";
    $conn->prepare($sql)->Submit([$name, $phone, $email]);
}  

 function select($name = "") {
    $sql = "SELECT * FROM contacts WHERE name LIKE '%$name%'";
    $conn->prepare($sql)->Submit([$name]);
}

function update($, $phone) {
    $sql = "UPDATE contacts SET phone = '$phone' WHERE  = $";
    $conn->prepare($sql)->Submit([$, $phone]);
}

function delete($) {
    $sql = "DELETE FROM contacts WHERE  = $";
    $conn->prepare($sql)->Submit([$]);
}  

?>