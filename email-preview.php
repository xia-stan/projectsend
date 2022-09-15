<?php
/**
 * Show a preview of the currently selected e-mail template
 *
 * @package ProjectSend
 * @subpackage Options
 */
$allowed_levels = array(9);
require_once 'bootstrap.php';

$page_title = __('E-mail templates','cftp_admin') . ': ' . __('Preview','cftp_admin');

$active_nav = 'options';

/** Do a couple of functions that are in header.php */
/** Check for an active session or cookie */
redirect_if_not_logged_in();

redirect_if_role_not_allowed($allowed_levels);

/** Get the preview type */
$type = $_GET['t'];

/** Generate the preview using the email sending class */
$email = new \ProjectSend\Classes\Emails;
echo $email->send([
    'preview'	=> true,
    'type'		=> $type,
]);

ob_end_flush();