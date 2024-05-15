<?php
// create session
if (!isset($_SESSION)) {
    ini_set('session.gc_maxliftime', 60 * 60 * 24);
    ini_set('session.use_only_cookies', 1);
    session_start();
}


// session regeneration
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = 1;
}
