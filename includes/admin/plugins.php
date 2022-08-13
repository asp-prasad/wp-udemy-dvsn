<?php
/**
 * Plugins
 *
 * @package     UFWP\Admin\Plugins
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Plugins row action links
 *
 * @author Michael Cannon <mc@aihr.us>
 * @since 1.8
 * @param array $links already defined action links
 * @param string $file plugin file path and name being processed
 * @return array $links
 */
function ufwp_action_links( $links, $file ) {

    $settings_link = '<a href="' . admin_url( 'options-general.php?page=wp-udemy-dvsn' ) . '">' . esc_html__( 'Settings', 'wp-udemy-dvsn' ) . '</a>';

    if ( $file == 'wp-udemy-dvsn/wp-udemy-dvsn.php' )
        array_unshift( $links, $settings_link );

    return $links;
}
add_filter( 'plugin_action_links', 'ufwp_action_links', 10, 2 );

/**
 * Plugin row meta links
 *
 * @author Michael Cannon <mc@aihr.us>
 * @since 1.8
 * @param array $input already defined meta links
 * @param string $file plugin file path and name being processed
 * @return array $input
 */
function ufwp_row_meta( $input, $file ) {

    if ( $file != 'wp-udemy-dvsn/wp-udemy-dvsn.php' )
        return $input;

    $docs_link = esc_url( add_query_arg( array(
            'utm_source'   => 'plugins-page',
            'utm_medium'   => 'plugin-row',
            'utm_campaign' => 'Online Learning Courses',
        ), 'https://kryptonitewp.com/support/knb/online-learning-courses-documentation/' )
    );

    $links = array(
        '<a href="' . $docs_link . '">' . esc_html__( 'Documentation', 'wp-udemy-dvsn' ) . '</a>',
    );

    $input = array_merge( $input, $links );

    return $input;
}
add_filter( 'plugin_row_meta', 'ufwp_row_meta', 10, 2 );