import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/add_product.css',
                'resources/css/add_category.css',
                'resources/css/show_product.css',
                'resources/css/update_product.css',
                'resources/css/header.css',
                'resources/css/home.css',
                'resources/css/login.css',
                'resources/css/admin.css',
                'resources/css/cart.css',
                'resources/css/footer.css',
                'resources/css/shop_blade.css',

            ],
            refresh: true,
        }),
    ],
});
