<?php
/**
 * Plugin Name: Hide Cart & Price For Visitors Woocommerce

 * Description: This plugin hides price and add to cart button on woocommerce shop for non registered users.
 * Author: Drazen Duvnjak
 * Version: 1.0.0
 * License: GPL2
 */
 
 
function eranew_show_price_logged($price){
if(is_user_logged_in() ){
return $price;
}
else
{
add_action( 'woocommerce_single_product_summary', 'eranew_print_login_to_see', 31 );
add_action( 'woocommerce_after_shop_loop_item', 'eranew_print_login_to_see', 11 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
}
}
 
function eranew_print_login_to_see() {
echo '<a href="' . get_permalink(woocommerce_get_page_id('myaccount')) . '">' . __('Please Register', 'theme_name') . '</a>';
}