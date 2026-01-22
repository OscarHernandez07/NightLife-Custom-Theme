<?php
/**
 * Template Name: Checkout Page
 */

get_template_part('template-parts/header');

// Define $checkout
$checkout = WC()->checkout();
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

<div class="bg-white py-12">
  <div class="max-w-6xl mx-auto px-4">

    <?php wc_print_notices(); ?>
    <?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>

    <form name="checkout" method="post" class="checkout woocommerce-checkout grid grid-cols-1 lg:grid-cols-3 gap-10"
          action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

      <!-- BILLING DETAILS -->
      <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Billing Details</h2>

        <div class="space-y-6">
          <?php do_action( 'woocommerce_checkout_billing' ); ?>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 mt-10 mb-6">Additional Information</h2>

        <div class="space-y-6">
          <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
        </div>
      </div>

      <!-- ORDER SUMMARY -->
      <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 h-fit sticky top-24">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Your Order</h2>

        <div class="border border-gray-200 rounded-xl overflow-hidden mb-6">
          <?php do_action( 'woocommerce_review_order_before_cart_contents' ); ?>

          <table class="w-full text-sm">
            <tbody>
              <?php
              foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                $_product   = $cart_item['data'];
                $product_id = $cart_item['product_id'];

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
              ?>
                  <tr class="border-b border-gray-200">
                    <td class="p-4">
                      <p class="font-semibold text-gray-900">
                        <?php echo esc_html( $_product->get_name() ); ?>
                      </p>
                      <p class="text-gray-500 text-xs">
                        Qty: <?php echo esc_html( $cart_item['quantity'] ); ?>
                      </p>
                    </td>
                    <td class="p-4 text-right font-semibold text-gray-900">
                      <?php echo wp_kses_post( WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ) ); ?>
                    </td>
                  </tr>
              <?php
                endif;
              endforeach;
              ?>
            </tbody>
          </table>

          <?php do_action( 'woocommerce_review_order_after_cart_contents' ); ?>
        </div>

        <div class="space-y-4 text-sm">
          <?php woocommerce_order_review(); ?>
        </div>

        <div class="mt-6">
          <?php if ( WC()->payment_gateways()->get_available_payment_gateways() ) : ?>
            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
          <?php else : ?>
            <p class="text-red-600 text-sm font-semibold">
              Sorry, no payment methods are available. Please contact us to arrange payment.
            </p>
          <?php endif; ?>
        </div>

      </div>

    </form>

    <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

  </div>
</div>

<?php get_template_part('template-parts/footer'); ?>
