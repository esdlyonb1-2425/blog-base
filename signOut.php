<?php

session_destroy();
header("location: index.php?message=logged out");
exit();
