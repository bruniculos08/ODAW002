<?php
    $cookie_name = "user";
    $cookie_value = 1;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 dia, 30 * 86400 = 1 mês
?>
<html>
    <body>
        <?php
            if(!isset($_COOKIE[$cookie_name])) {
                echo "Cookie named '" . $cookie_name . "' is not set!";
            } else {
                echo "Cookie '" . $cookie_name . "' is set!<br>";
                echo "Value is: " . $_COOKIE[$cookie_name];
                
                // Contador de visitas:
                setcookie($cookie_name, $_COOKIE[$cookie_name] + 1, time() + (86400 * 30), "/");
            }
        ?>
    </body>
</html>