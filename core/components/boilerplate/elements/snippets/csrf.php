<?php
if ($hook->getValue('csrf_token') != $_SESSION['csrf_token']) {
    $hook->addError('csrf_token', 'CSRF TOKEN ERROR');
}
return !$hook->hasErrors();