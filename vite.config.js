const { resolve } = require('path');
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default ({ command }) => ({
  base: command === 'serve' ? '' : '/build/',
  publicDir: 'fake_dir_so_nothing_gets_copied',
  build: {
    manifest: true,
    outDir: resolve(__dirname, 'public/build'),
    rollupOptions: {
      input: 'resources/js/app.js',
      input: 'resources/css/app.css',
    },
  },

  plugins: [
    laravel([
        'resources/css/app.css',
        'resources/js/app.js',
    ]),
    vue({
        template: {
          transformAssetUrls: {
            base: null,
            includeAbsolute: false,
          },
        },
      }),
],

  resolve: {
    alias: {
      '@': resolve('./resources/js'),
    },
  },
});