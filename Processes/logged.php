<?php

session_start();

function logged()
{
    if (isset($_SESSION['data'])) {
        return true;
    } else {
        return false;
    }
}
function admin()
{
    if (isset($_SESSION['data']) && $_SESSION['data']['is_admin'] == 1) {
        return true;
    } else {
        return false;
    }
}
