<?php

# Ativar erros
error_reporting(E_ALL);
ini_set("display_errors", 1);

try {

    # Conectar na base de dados
    $conn = new PDO("mysql:host=192.168.1.176;dbname=julia", "root", "123456");
    # Configurar modo de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    # Exibir erro ao conectar na base de dados
    echo "Connection failed: " . $e->getMessage();
}


if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $id = $_POST["ID"];

    $sql = "INSERT INTO contacts (nome, phone, email) VALUES ('$name', '$phone', '$email')";
    $result = $conn->query($sql);

} 

if(isset($_POST["select"])) {
    $name = $_POST["name-select"];
    
    $sql = "SELECT * FROM contacts WHERE nome LIKE '%$name%'";
    $result = $conn->query($sql);

} 

if(isset($_POST["update"])) {
    $phone = $_POST["phone-update"];
    $id = $_POST["id-update"];
    
    $sql = "UPDATE contacts SET phone = '$phone' WHERE id = '$id'";
    $result = $conn->query($sql);

} 

if(isset($_POST["delete"])) {
    $id = $_POST["id-delete"];
    
    $sql = "DELETE FROM contacts WHERE id = '$id'";
    $result = $conn->query($sql);

} 

function getName(){
    if (isset($_GET["fname"])) {
        return $_GET["fname"];
    }
    return "visitante";
}

$fname = getName();
?>

<!doctype html>

<html lang= "en">
    <head>
        <title>Base de Dados</title>
        <meta charset="utf-8">
    
        <script>
        </script>

        <style>
            div{
                display: block;
                border: solid 2px;
                padding: 5px;
                margin: 10px 0 10px 0;
            }

            input{
                margin: 5px;
            }
        </style>
    </head>

    <body>
            <h1>Welcome to PHP, <?php $name ?></h1>

            <form action="" method="POST">

            <div id="insert">
                    <label for="">Insert datas:</label><br>
                    <input type="text" name="name" placeholder="Name" ><br>
                    <input type="tel" name="phone" placeholder="Phone" ><br>
                    <input type="email" name="email" placeholder="Email"><br>
                    <input type="text" name="ID" placeholder="Id">
            </div>
                <button type='submit' name='submit' >Submit</button>
            </form>

            <form action="" method="POST">

            <div id="select">
                    <label for="">Select datas:</label><br>
                    <input type="text" name="name-select" placeholder="Name" ><br>
            </div>
                <button type='submit' name='select' >Select</button>
            </form>

            <form action="" method="POST">

                <div id="update">
                    <label for="">Update datas:</label><br>
                    <input type="tel" name="phone-update" placeholder="Phone" ><br>
                    <input type="text" name="id-update" placeholder="Id">
                </div>
                <button type='submit' name='update' >Update</button>
            </form>

            <form action="" method="POST">

                <div id="delete">
                    <label for="">Delete datas:</label><br>
                    <input type="text" name="id-delete" placeholder="Id">
                </div>
                <button type='submit' name='delete'>delete</button>
            </form>
        </body>
        </html>