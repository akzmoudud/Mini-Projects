<?php
function wetuts_user_contact_methods( $methods ) {
    // Add new contact methods
    $methods['facebook'] = __('Facebook Profile URL', 'wetuts' );
    $methods['twitter']  = __('Twitter Profile URL', 'wetuts' );
    $methods['linkedin'] = __('LinkedIn Profile URL', 'wetuts' );

    // // Remove contact methods
    // unset( $methods['aim'] );
    // unset( $methods['yim'] );
    // unset( $methods['jabber'] );

    return $methods;
}
add_filter( 'user_contactmethods', 'wetuts_user_contact_methods' );
