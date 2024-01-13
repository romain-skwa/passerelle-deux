<?php

unset($_SESSION['username']);
unset($_SESSION['connected']);

header('location: index.php?');
exit();