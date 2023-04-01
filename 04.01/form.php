<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/table.css">
    <title>Użytkownicy</title>
</head>
<body>
<h4>Użytkownicy</h4>
<?php
if (isset($_GET["deleteUserId"])){
    if ($_GET["deleteUserId"] == 0){
        echo "Nie udało się usunąć rekordu!<hr>";
    }else{
        echo "Udało się usunąć rekordu o id=$_GET[deleteUserId]<hr>";
    }
}

?>
<table>
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Data urodzenia</th>
        <th>Miasto</th>
        <th>Województwo</th>
        <th>Państwo</th>
    </tr>
    <?php
    require_once "./skrypty/connect.php";
    $sql = "SELECT `u`.`id` `userid`, `u`.`firstName` as `imie`, `u`.`lastName`, `u`.`birthday`, `c`.`city`, `s`.`state`, `co`.`country` FROM `users` u JOIN `cities` c ON `u`.`city_id`=`c`.`id` JOIN `states` s ON `c`.`state_id`=`s`.`id` JOIN `countries` co ON `s`.`country_id`=`co`.`id`;";
    $result = $conn->query($sql);
    while($user = $result->fetch_assoc()){
        echo <<< TABLEUSERS
      <tr>
        <td>$user[imie]</td>
        <td>$user[lastName]</td>
        <td>$user[birthday]</td>
        <td>$user[city]</td>
        <td>$user[state]</td>
        <td>$user[country]</td>
        <td><a href="./skrypty/delete_1.php?userId=$user[userid]">Usuń</a></td>
      </tr>
TABLEUSERS;
    }
    echo "</table><hr>";
    if(isset($_GET["add_user"])){
        echo <<< DODANIE
        <h4>Dodanie uzytkownika</h4> 
        <form action="./skrypty/add.php" method="post">
            <input type="text" required name="firstName" autofocus placeholder="Dodaj imie"><br>
            <input type="text" required name="lastName" placeholder="Dodaj nazwisko"><br>
            <input type="date" required name="birthday" ><br>
            <input type="number" required name="city" placeholder="Dodaj miasto"><br>
            <input type="submit" value="Dodaj uzytkownika">     
        </form>
        DODANIE;
    }
    else{
        echo'<a href="./form.php?add_user=1">Dodaj usera</a>';
    }
    $conn->close();
    ?>

</body>
</html>
