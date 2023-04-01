<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Users</title>

</head>
<body>
    <h4>Użytkownicy</h4>
    <table>
        <tr>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>Data urodzenia</th>
            <th>Miasto</th>
            <th>Wojewodztwo</th>
            <th>Panstwa</th>
        </tr>
    <?php
        require_once("./skrypty/connect.php");
        $sql = "SELECT `u`.`id`, `u`.`firstName`,`u`.`lastName`,`u`.`birthday`,`c`.`city`,`s`.`state`,`co`.`country`
from `users` u inner join `cities` c on `u`.`city_id`=`c`.`id` 
    inner join `states` s on `c`.`state_id`=`s`.`id` 
    INNER JOIN `countries` co on `s`.`country_id`=`co`.`id`;";
        $result = $conn->query($sql);
        while($user = $result->fetch_assoc()){
            echo <<< TABLEUSERS
            <tr>
            <td>$user[id]</td>
            <td>$user[firstName]</td>
            <td>$user[lastName]</td>
            <td>$user[birthday]</td>
            <td>$user[city]</td>
            <td>$user[state]</td>
            <td>$user[country]</td>
            <td><a href="./skrypty/delete.php?userId=$user[id]">Usuń</a></td>
            </tr>
            TABLEUSERS;
        }

        $conn->close();
    ?>
    </table>
</body>
</html>