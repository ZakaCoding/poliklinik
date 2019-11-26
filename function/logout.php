<?php
    session_start();
    session_unset();
    session_destroy();
    // Redirect to landing page
    header("location: http://localhost/poliklinik_um");