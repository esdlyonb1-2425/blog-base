<?php

unset($_SESSION['id']);
unset($_SESSION['username']);
header("location: index.php?message=logged out");
exit();
