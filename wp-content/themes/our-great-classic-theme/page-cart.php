<?php get_template_part('template-parts/header'); ?>
<!-- pulls in the site header -->

<?php
defined( 'ABSPATH' ) || exit;
// stops people from accessing this file directly
?>

<div class="bg-slate-50 min-h-screen font-['Plus_Jakarta_Sans']">
    
<!-- top hero / page intro -->
<section class="pt-20 lg:pt-28 bg-white relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Header Content -->
        <div class="max-w-3xl">
            <span class="text-orange-600 font-bold tracking-widest uppercase text-sm mb-4 mt-4 block">
                Your Cart
            </span>

            <h1 class="text-5xl md:text-6xl font-black tracking-tight text-slate-900 mb-6">
                Ready to Checkout <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">
                    Review Your Items
                </span>
            </h1>

            <p class="text-xl text-stone-900 leading-relaxed max-w-2xl">
                Here’s a summary of the courses you’ve selected. You can update quantities,
                remove items, or proceed to checkout to start learning.
            </p>
        </div>
    </div>
</section>


<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 md:py-16">

    <!-- woo system messages (like updated cart, errors, etc) -->
    <?php wc_print_notices(); ?>

    <!-- main layout: cart items + totals -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

        <!-- CART FORM (this is important for qty updates) -->
        <form class="woocommerce-cart-form lg:col-span-8 w-full"
              action="<?php echo esc_url( wc_get_cart_url() ); ?>"
              method="post">

            <div class="space-y-4 md:space-y-0 md:bg-white md:rounded-[2rem] md:border md:border-slate-200 md:overflow-hidden md:shadow-sm">

                <!-- cart table -->
                <table class="shop_table shop_table_responsive w-full border-collapse block md:table">

                    <!-- table headers (desktop only) -->
                    <thead class="hidden md:table-header-group bg-slate-50 text-left text-slate-500 text-xs uppercase tracking-widest font-bold">
                        <tr>
                            <th class="p-6">Course Selection</th>
                            <th class="p-6">Price</th>
                            <th class="p-6 w-32">Quantity</th>
                            <th class="p-6 text-right">Subtotal</th>
                        </tr>
                    </thead>

                    <!-- cart items loop -->
                    <tbody class="block md:table-row-group">
                        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                            // grab the product object
                            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

                            // make sure product exists and qty > 0
                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :

                                // product link if visible
                                $product_permalink = $_product->is_visible()
                                    ? $_product->get_permalink( $cart_item )
                                    : '';
                        ?>

                        <!-- single cart item row -->
                        <tr class="flex flex-col md:table-row bg-white rounded-2xl border border-slate-200 mb-4 p-4 md:p-0 md:border-none md:bg-transparent md:mb-0 hover:bg-slate-50/50 transition-colors">

                            <!-- product info -->
                            <td class="block md:table-cell md:p-6 md:border-b md:border-slate-100">
                                <div class="flex items-center gap-4">

                                    <!-- product image -->
                                    <div class="w-20 h-20 md:w-24 md:h-24 rounded-xl overflow-hidden shrink-0 border border-slate-100 shadow-sm">
                                        <?php echo $_product->get_image( 'thumbnail', [
                                            'class' => 'w-full h-full object-cover'
                                        ] ); ?>
                                    </div>

                                    <!-- product name + remove -->
                                    <div class="min-w-0">
                                        <a href="<?php echo $product_permalink; ?>"
                                           class="text-base md:text-lg font-bold text-slate-900 hover:text-orange-600 transition-colors block leading-tight mb-1">
                                            <?php echo $_product->get_name(); ?>
                                        </a>

                                        <!-- price shown only on mobile -->
                                        <div class="md:hidden text-orange-600 font-bold mb-2">
                                            <?php echo WC()->cart->get_product_price( $_product ); ?>
                                        </div>

                                        <!-- remove item link -->
                                        <?php
                                        echo apply_filters(
                                            'woocommerce_cart_item_remove_link',
                                            sprintf(
                                                '<a href="%s" class="text-xs font-bold text-slate-400 uppercase tracking-tighter hover:text-red-500 flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                    Remove
                                                </a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) )
                                            ),
                                            $cart_item_key
                                        );
                                        ?>
                                    </div>
                                </div>
                            </td>

                            <!-- price column (desktop only) -->
                            <td class="hidden md:table-cell p-6 border-b border-slate-100 text-slate-600 font-medium">
                                <?php echo WC()->cart->get_product_price( $_product ); ?>
                            </td>

                            <!-- quantity column -->
                            <td class="block md:table-cell py-4 md:p-6 border-t border-slate-100 md:border-t-0 md:border-b md:border-slate-100">
                                <div class="flex items-center justify-between md:block">

                                    <!-- mobile label -->
                                    <span class="md:hidden text-xs font-bold text-slate-400 uppercase">
                                        Quantity
                                    </span>

                                    <!-- woo quantity input -->
                                    <div class="quantity-input-wrapper">
                                        <?php
                                        woocommerce_quantity_input( array(
                                            // IMPORTANT: this name is how woo knows what to update
                                            'input_name'  => "cart[{$cart_item_key}][qty]",
                                            'input_value' => $cart_item['quantity'],
                                            'max_value'   => $_product->get_max_purchase_quantity(),
                                            'min_value'   => '1',
                                        ), $_product );
                                        ?>
                                    </div>
                                </div>
                            </td>

                            <!-- subtotal column -->
                            <td class="block md:table-cell py-4 md:p-6 md:border-b md:border-slate-100 md:text-right">
                                <div class="flex justify-between items-center md:block">
                                    <span class="md:hidden text-xs font-bold text-slate-400 uppercase">
                                        Subtotal
                                    </span>

                                    <span class="text-lg md:text-base font-black text-slate-900">
                                        <?php echo WC()->cart->get_product_subtotal(
                                            $_product,
                                            $cart_item['quantity']
                                        ); ?>
                                    </span>
                                </div>
                            </td>

                        </tr>
                        <?php endif; endforeach; ?>
                    </tbody>
                </table>

                <!-- update cart section -->
                <div class="p-6 bg-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4 mt-4 md:mt-0">

                    <!-- update cart button -->
                    <button type="submit"
                            name="update_cart"
                            class="w-full md:w-auto bg-green-700 text-white px-8 py-3 rounded-xl font-bold text-sm hover:bg-green-600 transition shadow-lg update-cart">
                        Update Cart
                    </button>

                    <!-- security nonce -->
                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

                    <!-- hidden input woo checks for updates -->
                    <input type="hidden" name="update_cart" value="Update cart">

                </div>
            </div>
        </form>

        <!-- cart totals sidebar -->
        <div class="lg:col-span-4 w-full sticky top-8">
            <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl p-6 md:p-8 relative overflow-hidden">

                <!-- orange accent bar -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-600 to-orange-400"></div>

                <h2 class="text-xl font-black text-slate-900 mb-6 uppercase tracking-tight">
                    Cart Totals
                </h2>

                <!-- woo totals table -->
                <div class="cart-totals-content">
                    <?php woocommerce_cart_totals(); ?>
                </div>

                <!-- checkout button -->
                <div class="mt-8">
                    <a href="<?php echo wc_get_checkout_url(); ?>"
                       class="block w-full text-center bg-orange-600 text-white font-black py-5 rounded-2xl text-lg hover:bg-orange-500 transition-all shadow-lg shadow-orange-600/30">
                        Checkout →
                    </a>

                    <p class="text-center text-slate-400 text-[10px] mt-4 font-bold tracking-widest uppercase">
                        Locked & Secured SSL
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php get_template_part('template-parts/footer'); ?>
<!-- footer -->

<style>
/* styles only, no logic */

/* quantity input styling */
.quantity-input-wrapper input {
    width: 100% !important;
    max-width: 80px;
    height: 42px;
    border-radius: 12px !important;
    border: 1px solid #e2e8f0 !important;
    text-align: center;
    font-weight: 700;
    background: #f8fafc;
}

/* cart totals table styling */
.cart-totals-content table {
    width: 100%;
    margin-bottom: 20px;
}

.cart-totals-content th {
    text-align: left;
    color: #64748b;
    font-size: 0.75rem;
    text-transform: uppercase;
    padding: 12px 0;
}

.cart-totals-content td {
    text-align: right;
    font-weight: 700;
    color: #0f172a;
    padding: 12px 0;
}

/* total row highlight */
.cart-totals-content .order-total th,
.cart-totals-content .order-total td {
    border-top: 1px solid #e2e8f0;
    font-size: 1.125rem;
    color: #ea580c;
    padding-top: 20px;
}

/* hide default woo checkout button */
.wc-proceed-to-checkout {
    display: none;
}

/* removes the auto "Quantity:" labels on mobile */
.shop_table_responsive td::before {
    display: none !important;
    content: none !important;
}
</style>
