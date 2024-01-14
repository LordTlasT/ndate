<?php
    $vars = ['status', 'error', 'success'];
    foreach ($vars as $var) {
        if (session($var)) {
            echo "<p>";
            switch ($var) {
                case 'status':
                    echo "<small>" . session($var) . "</small>";
                    break;
                case 'error':
                    echo "<mark>" . session($var) . "</mark>";
                    break;
                case 'success':
                    echo "<ins>" . session($var) . "</ins>";
                    break;
            }
            echo "</p>";
        }
    }
?>
