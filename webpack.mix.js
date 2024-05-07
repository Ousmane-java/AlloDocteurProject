const mix = require('laravel-mix');
const workboxPlugin = require('workbox-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new workboxPlugin.GenerateSW({
            swDest: 'public/sw.js',
            clientsClaim: true,
            skipWaiting: true,
        }),
    ],
});
