<?php
    include_once("db.php");
    function addUser($login, $email, $password) {
        if ($password != "") {
            $password = shop_hash($password);
            $query = "INSERT INTO users(login, email, password, role) VALUES ('" . $login . "','" . $email . "','" . $password . "', 'customer');";
            shop_query($query);
        }
    }
    function modUser($id, $login, $email, $password) {
        if ($password == "") {
            $query = "UPDATE users SET login='" . $login . "', email='" . $email . "' WHERE id=" . $id . ";";
        } else {
            $password = shop_hash($password);
            $query = "UPDATE users SET login='" . $login . "', email='" . $email . "', password='" . $password . "' WHERE id=" . $id . ";";
        }
        shop_query($query);
    }
    function delUser($id) {
        if ($id != 1) {
            $query = "DELETE FROM users WHERE id = " . $id . ";";
            shop_query($query);
        }
    }
    function getUsers() {
        $query = "SELECT * FROM users WHERE 1;";
        $result = shop_query($query);
        $users = array();
        while ($row = mysqli_fetch_row($result)) {
            $users[] = array(
                'id'        => $row[0],
                'login'     => $row[1],
                'email'     => $row[2],
                'passwd'    => $row[3],
                'role'      => $row[4]
            );
        }
        return $users;
    }
?>