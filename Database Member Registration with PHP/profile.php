<?php
session_start();
if (!isset($_SESSION["userName"])) {

    echo "<h3>WELCOME TO " . $_SESSION["userName"] . "</h3>";

    echo "<h3>Email= " . $_SESSION["email"] . "</h3>";

    echo "<a href='exit.php' style='color: red; background-color: yellow; border: 1px solid red; padding: 5px 5px'>Exit</a>";
} else {
    echo "You are not authorized to view this page.";
}
