<?php
if (!isset($_SERVER['HTTP_USER_AGENT']) || strpos($_SERVER['HTTP_USER_AGENT'], 'Bot') === false) {
    header('Location: http://example.com/landing-page');
    exit;
} else {
    header('Location: http://example.com/error-page');
    exit;
}
?>
