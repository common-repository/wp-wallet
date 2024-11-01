<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wpwallet.com/
 * @since      1.0.0
 *
 * @package    Wp_Wallet
 * @subpackage Wp_Wallet/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="wp-wallet-app">
<wp-wallet-component  
:sitedata='<?php echo json_encode($data,JSON_HEX_APOS)?>' >

</wp-wallet-component>
</div>