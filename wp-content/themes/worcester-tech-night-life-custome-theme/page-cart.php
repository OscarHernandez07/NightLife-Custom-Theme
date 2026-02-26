<?php
/**
 * Template Name: Custom Cart Page
 */

get_template_part('template-parts/header');

defined( 'ABSPATH' ) || exit;
?>

<div class="bg-slate-50 min-h-screen font-['Plus_Jakarta_Sans'] py-20">

    <!-- Page Header / Hero -->
    <section class="pt-20 lg:pt-28 bg-white relative overflow-hidden">
        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
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

    <!-- Main Cart Section -->
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-8 md:py-16">

        <?php wc_print_notices(); ?>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

            <!-- Cart Items Form -->
            <form class="woocommerce-cart-form lg:col-span-8 w-full"
                  action="<?php echo esc_url( wc_get_cart_url() ); ?>"
                  method="post">

                <div class="space-y-4 md:space-y-0 md:bg-white md:rounded-[2rem] md:border md:border-slate-200 md:overflow-hidden md:shadow-sm">

                    <!-- Cart Table -->
                    <table class="shop_table shop_table_responsive w-full border-collapse block md:table">

                        <thead class="hidden md:table-header-group bg-slate-50 text-left text-slate-500 text-xs uppercase tracking-widest font-bold">
                            <tr>
                                <th class="p-6">Course Selection</th>
                                <th class="p-6">Price</th>
                                <th class="p-6 w-32">Quantity</th>
                                <th class="p-6 text-right">Subtotal</th>
                            </tr>
                        </thead>

                        <tbody class="block md:table-row-group">
                            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
                                    $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
                            ?>
                            <tr class="flex flex-col md:table-row bg-white rounded-2xl border border-slate-200 mb-4 p-4 md:p-0 md:border-none md:bg-transparent md:mb-0 hover:bg-slate-50/50 transition-colors">

                                <!-- Product Info -->
                                <td class="block md:table-cell md:p-6 md:border-b md:border-slate-100">
                                    <div class="flex items-center gap-4">

                                        <div class="w-20 h-20 md:w-24 md:h-24 rounded-xl overflow-hidden shrink-0 border border-slate-100 shadow-sm">
                                            <?php echo $_product->get_image( 'thumbnail', ['class' => 'w-full h-full object-cover'] ); ?>
                                        </div>

                                        <div class="min-w-0">
                                            <a href="<?php echo $product_permalink; ?>"
                                               class="text-base md:text-lg font-bold text-slate-900 hover:text-orange-600 transition-colors block leading-tight mb-1">
                                                <?php echo $_product->get_name(); ?>
                                            </a>

                                            <div class="md:hidden text-orange-600 font-bold mb-2">
                                                <?php echo WC()->cart->get_product_price( $_product ); ?>
                                            </div>

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

                                <td class="hidden md:table-cell p-6 border-b border-slate-100 text-slate-600 font-medium">
                                    <?php echo WC()->cart->get_product_price( $_product ); ?>
                                </td>

                                <td class="block md:table-cell py-4 md:p-6 border-t border-slate-100 md:border-t-0 md:border-b md:border-slate-100">
                                    <div class="flex items-center justify-between md:block">
                                        <span class="md:hidden text-xs font-bold text-slate-400 uppercase">Quantity</span>
                                        <div class="quantity-input-wrapper">
                                            <?php
                                            woocommerce_quantity_input( array(
                                                'input_name'  => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value'   => $_product->get_max_purchase_quantity(),
                                                'min_value'   => '1',
                                            ), $_product );
                                            ?>
                                        </div>
                                    </div>
                                </td>

                                <td class="block md:table-cell py-4 md:p-6 md:border-b md:border-slate-100 md:text-right">
                                    <div class="flex justify-between items-center md:block">
                                        <span class="md:hidden text-xs font-bold text-slate-400 uppercase">Subtotal</span>
                                        <span class="text-lg md:text-base font-black text-slate-900">
                                            <?php echo WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ); ?>
                                        </span>
                                    </div>
                                </td>

                            </tr>
                            <?php endif; endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Update Cart Button -->
                    <div class="p-6 bg-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4 mt-4 md:mt-0">
                        <button type="submit" 
                                name="update_cart" 
                                value="Update cart" 
                                class="w-full md:w-auto bg-green-700 text-white px-8 py-3 rounded-xl font-bold text-sm hover:bg-green-600 transition shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                disabled>
                            Update Cart
                        </button>
                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                    </div>
                </div>
            </form>

            <!-- Cart Totals Sidebar -->
            <div class="lg:col-span-4 w-full sticky top-8 self-start h-fit z-10">
                <div class="bg-white rounded-[2rem] border border-slate-200 shadow-xl p-6 md:p-8 relative overflow-hidden">

                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-600 to-orange-400"></div>

                    <h2 class="text-xl font-black text-slate-900 mb-6 uppercase tracking-tight">
                        Cart Totals
                    </h2>

                    <div class="cart-totals-content">
                        <?php woocommerce_cart_totals(); ?>
                    </div>

                    <div class="mt-8">
                        <a href="<?php echo wc_get_checkout_url(); ?>"
                        class="block w-full text-center bg-orange-600 text-white font-black py-5 rounded-2xl text-lg hover:bg-orange-500 transition-all shadow-lg shadow-orange-600/30">
                            Checkout →
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let timeout;
    const cartForm = document.querySelector('.woocommerce-cart-form');
    const updateBtn = document.querySelector('button[name="update_cart"]');

    cartForm.addEventListener('change', function(e) {
        if (e.target.classList.contains('qty')) {
            updateBtn.removeAttribute('disabled');
            updateBtn.classList.remove('opacity-50');
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                updateBtn.click();
            }, 1000);
        }
    });

    jQuery( document.body ).on( 'updated_cart_totals', function() {
        updateBtn.setAttribute('disabled', 'disabled');
    });
});
</script>

<style>
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

.cart-totals-content .order-total th,
.cart-totals-content .order-total td {
    border-top: 1px solid #e2e8f0;
    font-size: 1.125rem;
    color: #ea580c;
    padding-top: 20px;
}

.wc-proceed-to-checkout { display: none; }
.shop_table_responsive td::before { display: none !important; content: none !important; }
</style>

<?php get_template_part('template-parts/footer'); ?>