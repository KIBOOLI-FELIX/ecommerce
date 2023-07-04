import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/js/bootstrap.bundle.min.js',
            'resources/js/jquery-3.7.0.min.js',
            'resources/admin/vendors/mdi/css/materialdesignicons.min.css',
            'resources/admin/vendors/base/vendor.bundle.base.css',
            'resources/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css',
            'resources/admin/css/style.css',
            'resources/admin/images/favicon.png',
            'resources/admin/vendors/base/vendor.bundle.base.js',
            'resources/admin/vendors/datatables.net/jquery.dataTables.js',
            'resources/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js',
            'resources/admin/js/off-canvas.js',
            'resources/admin/js/hoverable-collapse.js',
            'resources/admin/js/template.js',
            'resources/admin/js/dashboard.js',
            'resources/admin/js/data-table.js',
            'resources/admin/js/jquery.dataTables.js',
            'resources/admin/js/dataTables.bootstrap4.js'
        ],
            refresh: true,
        }),
    ],
});
