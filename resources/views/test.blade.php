<?php
foreach ($orders as $item) {
    foreach ($item->users as $user) {
        echo $user->id;
}
}
?>
