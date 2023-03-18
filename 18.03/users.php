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
    <h4>Uzytkownicy</h4>
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
        $sql = "SELECT * from `users` inner join `cities` on `users`.`city_id`=`cities`.`id`
        inner join `states` on `cities`.`state_id`=`states`.`id`
        INNER JOIN `countries` on `states`.`country_id`=`countries`.`id`;";
        $result = $conn->query($sql);
        while($user = $result->fetch_assoc()){
            echo <<< TABLEUSERS
            <tr>
            <td>$user[firstName]</td>
            <td>$user[lastName]</td>
            <td>$user[birthday]</td>
            <td>$user[city]</td>
            <td>$user[state]</td>
            <td>$user[country]</td>
            </tr>
            TABLEUSERS;
        }
    ?>
    </table>
</body>
</html>