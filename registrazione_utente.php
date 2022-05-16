<?php
require_once('connect.php');


if (isset($_POST['submit'])) {
    $email = $_POST['email'] ?? '';
    $alias = $_POST['alias'] ?? '';
    $password = $_POST['password'] ?? '';
    $marketing = $_POST['marketing'] ?? '';
    $privacy = $_POST['privacy'] ?? '';

    //echo $email . '<br>' .  $alias . '<br>' . '<br>' .  $password . '<br>' . '<br>' . $marketing . '<br>' . $privacy; 

    $isUsernameValid = filter_var(
        $alias,
        FILTER_VALIDATE_REGEXP, [
            "options" => [
                "regexp" => "/^[a-z\d_]{3,20}$/i"
            ]
        ]
            );

    $pwdLenght = mb_strlen($password);
    // || empty($alias) || empty($password) || empty($privacy)
    if ( empty($email) ) {
        $msg = 'Compila tutti i campi %s';
    } elseif (false === $isUsernameValid) {
        $msg = 'Lo alias non è valido. Sono ammessi solamente caratteri 
                alfanumerici e l\'underscore. Lunghezza minina 3 caratteri.
                Lunghezza massima 20 caratteri';
    } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
        $msg = 'Lunghezza minima password 8 caratteri.
                Lunghezza massima 20 caratteri';
    } else {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "
            SELECT id
            FROM abbonati
            WHERE alias = :alias
        ";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':alias', $alias, PDO::PARAM_STR);
        $check->execute();
        
        $user = $check->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($user) > 0) {
            $msg = 'Alias già in uso %s';
        } else {
            $query = "
                INSERT INTO abbonati
                VALUES (0, :email, :alias, :password, :marketing, :privacy)
            ";
        
            $check = $pdo->prepare($query);
            $check->bindParam(':email', $email, PDO::PARAM_STR);
            $check->bindParam(':alias', $alias, PDO::PARAM_STR);
            $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $check->bindParam(':marketing', $marketing, PDO::PARAM_STR);
            $check->bindParam(':privacy', $privacy, PDO::PARAM_STR);
            $check->execute();
            
            if ($check->rowCount() > 0) {
                $msg = 'Registrazione eseguita con successo';
            } else {
                $msg = 'Problemi con l\'inserimento dei dati %s';
            }
        }
    }
    
    printf($msg, '<a href="sottoscrivi.php">torna indietro</a>');
}