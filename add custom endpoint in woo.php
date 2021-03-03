////////////////////////////////////////////////////////

function my_custom_endpoints() {
    add_rewrite_endpoint( 'special-page', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'my_custom_endpoints' );

function my_custom_query_vars( $vars ) {
    $vars[] = 'special-page';

    return $vars;
}

add_filter( 'query_vars', 'my_custom_query_vars', 0 );

function my_custom_flush_rewrite_rules() {
    flush_rewrite_rules();
}

add_action( 'wp_loaded', 'my_custom_flush_rewrite_rules' );

function my_custom_my_account_menu_items( $items ) {
    $items = array(
        'dashboard'         => __( 'Dashboard', 'woocommerce' ),
        'orders'            => __( 'Orders', 'woocommerce' ),
        'downloads'       => __( 'Downloads', 'woocommerce' ),
        'edit-address'    => __( 'Addresses', 'woocommerce' ),
        'payment-methods' => __( 'Payment Methods', 'woocommerce' ),
        'edit-account'      => __( 'Edit Account', 'woocommerce' ),
        'special-page'      => 'Special Page',
        'customer-logout'   => __( 'Logout', 'woocommerce' ),
    );

    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'my_custom_my_account_menu_items' );

function my_custom_endpoint_content() {
    
	echo '[wordpress_file_upload]';
}

add_action( 'woocommerce_account_special-page_endpoint', 'my_custom_endpoint_content' );


///

