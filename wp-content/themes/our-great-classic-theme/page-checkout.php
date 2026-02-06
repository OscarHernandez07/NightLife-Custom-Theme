<?php
/**
 * Template Name: Checkout Page
 */

get_template_part('template-parts/header');

// Define $checkout
$checkout = WC()->checkout();

// Ensure the cart isn't empty to avoid errors
if ( WC()->cart->is_empty() ) {
    wp_safe_redirect( wc_get_cart_url() );
    exit;
}
?>

<section class="pt-20 lg:pt-28 bg-white relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Header Content -->
        <div class="max-w-3xl">
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 mt-4 block">Checkout</span>
            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-slate-900 mb-6">
                Complete Your Order <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Secure & Easy Payment</span>
            </h1>
            <p class="text-xl text-stone-900 leading-relaxed max-w-2xl">
                Fill in your details, review your order, and complete your purchase. You’re one step away from accessing your courses!
            </p>
        </div>
    </div>
</section>

<div class="bg-gray-50 pb-24">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="mb-8">
        <?php wc_print_notices(); ?>
    </div>

    <?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

    <form name="checkout" method="post" class="checkout woocommerce-checkout grid grid-cols-1 lg:grid-cols-12 gap-y-10 lg:gap-x-12"
          action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

      <div class="lg:col-span-7 space-y-8">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">
            <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-orange-600 text-white font-bold text-sm">1</div>
                <h2 class="text-xl font-bold text-gray-900">Billing Details</h2>
            </div>
            
            <div class="woocommerce-billing-fields__field-wrapper grid grid-cols-1 gap-4">
                <?php do_action( 'woocommerce_checkout_billing' ); ?>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">
            <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-orange-600 text-white font-bold text-sm">2</div>
                <h2 class="text-xl font-bold text-gray-900">Additional Info</h2>
            </div>
            
            <div class="space-y-4">
                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
            </div>
        </div>

      </div>

      <div class="lg:col-span-5 h-fit">
        
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            
            <div class="bg-slate-900 p-6">
                <h2 class="text-xl font-bold text-white">Order Summary</h2>
            </div>

            <div class="p-6 md:p-8">
                <div class="flow-root mb-8">
                    <?php do_action( 'woocommerce_review_order_before_cart_contents' ); ?>
                    
                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                    <?php
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                        $_product   = $cart_item['data'];
                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
                    ?>
                        <li class="flex py-6">
                            <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <?php echo $_product->get_image(array(64, 64), array('class' => 'h-full w-full object-cover object-center')); ?>
                            </div>

                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3><?php echo esc_html( $_product->get_name() ); ?></h3>
                                        <p class="ml-4">
                                            <?php echo wp_kses_post( WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ) ); ?>
                                        </p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Qty <?php echo esc_html( $cart_item['quantity'] ); ?></p>
                                </div>
                            </div>
                        </li>
                    <?php
                        endif;
                    endforeach;
                    ?>
                    </ul>
                    
                    <?php do_action( 'woocommerce_review_order_after_cart_contents' ); ?>
                </div>

                <div class="border-t border-gray-200 pt-6 space-y-4">
                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <p>Subtotal</p>
                        <p class="font-medium text-gray-900"><?php wc_cart_totals_subtotal_html(); ?></p>
                    </div>

                    <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                        <div class="flex items-center justify-between text-sm text-green-600">
                            <p>Coupon: <?php echo esc_html( $code ); ?></p>
                            <p class="font-medium">-<?php wc_cart_totals_coupon_html( $coupon ); ?></p>
                        </div>
                    <?php endforeach; ?>

                    <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <p>Shipping</p>
                            <div class="font-medium text-gray-900 text-right">
                                <?php wc_cart_totals_shipping_html(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <p><?php echo esc_html( $fee->name ); ?></p>
                            <p class="font-medium text-gray-900"><?php wc_cart_totals_fee_html( $fee ); ?></p>
                        </div>
                    <?php endforeach; ?>

                    <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
                         <div class="flex items-center justify-between text-sm text-gray-600">
                            <p>Tax</p>
                            <p class="font-medium text-gray-900"><?php echo wc_cart_totals_taxes_total_html(); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                        <p class="text-base font-bold text-gray-900">Total</p>
                        <p class="text-xl font-bold text-orange-600"><?php wc_cart_totals_order_total_html(); ?></p>
                    </div>
                </div>

                <div class="mt-8">
                   <?php if ( WC()->payment_gateways()->get_available_payment_gateways() ) : ?>
                        <?php woocommerce_checkout_payment(); ?>
                   <?php else : ?>
                        <div class="p-4 bg-red-50 text-red-700 rounded-md text-sm">
                            Sorry, it seems that there are no available payment methods. Please contact us.
                        </div>
                   <?php endif; ?>
                </div>

            </div>
            
            <div class="bg-gray-50 p-4 border-t border-gray-100 text-center">
                <div class="flex justify-center items-center gap-2 text-xs text-gray-500">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span>SSL Encrypted Payment</span>
                </div>
            </div>
            
        </div>

        <div class="mt-8 grid grid-cols-2 gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-xs font-semibold text-gray-600">Instant Access</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="text-xs font-semibold text-gray-600">24/7 Support</span>
            </div>
        </div>

      </div>

    </form>

    <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

  </div>
</div>

<?php get_template_part('template-parts/footer'); ?>
