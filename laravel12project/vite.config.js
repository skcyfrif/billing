// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: ['resources/css/app.css', 'resources/js/app.js'],
//             input: ['resources/css/masteradmin.css'], // 👈 Add this
//             refresh: true,
//         }),
//     ],
// });



import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/masteradmin.css', // ✅ Added correctly
                'resources/css/controlpanel.css', // ✅ Added correctly
                'resources/css/controlpaneladmin.css', // ✅ Added correctly
                'resources/css/admin.css', // ✅ Added correctly
                'resources/css/user.css', // ✅ Added correctly
                'resources/js/app.js',
                'resources/css/welcome.css', // ✅ Added correctly
            ],
            refresh: true,
        }),
    ],
});
