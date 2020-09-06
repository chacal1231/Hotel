<?php
session_start();
session_destroy();
echo "<script>setTimeout(\"location.href = 'index.php';\", 1);</script>";
?>