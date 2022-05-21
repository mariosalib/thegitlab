<?php
session_start();

if(isset ($_SESSION['page_count']))
{
    $_SESSION ['page_count'] +=1; 

    echo "welcome again with session ID   ". session_id() ."</br>"
    . "and no. of   " . $_SESSION ['page_count'] . "views";

}
else {
    $_SESSION ['page_count'] =1;

    echo "welcome for the first time";

}


?>