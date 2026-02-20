import { defineConfig } from 'vite';

const THEME_NAME = 'kickstart';
const SRC_ROOT = 'resources/frontend';
const DEST_ROOT = 'webroot';

export default defineConfig(({ command }) => ({
    base: command === 'build' ? `/${THEME_NAME}/` : '/',
    publicDir: 'resources/public',
    server: {
        proxy: {
            // Exclude Vite internals and source/destination folders from proxy
            [`^/(?!@vite|@fs|node_modules|${SRC_ROOT}|${DEST_ROOT}).*`]: {
                target: 'http://bakekit.test',
                changeOrigin: true,
            },
        },
        host: true,
    },

    build: {
        outDir: DEST_ROOT,
        emptyOutDir: true,
        minify: 'terser',
        rollupOptions: {
            input: {
                app: `${SRC_ROOT}/scripts/app.js`,
            },
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name]-[hash].js',
                assetFileNames: (assetInfo) => {
                    const name = assetInfo.names?.[0] ?? '';
                    if (/\.(css|scss|sass)$/.test(name)) return 'css/app.[ext]';
                    if (/\.(woff2?|ttf|eot|otf)$/.test(name)) return 'fonts/[name][extname]';
                    if (/\.(png|jpe?g|gif|svg|webp|avif)$/.test(name)) return 'img/[name].[ext]';
                    return 'assets/[name].[ext]';
                },
            },
        },
    },

    css: {
        preprocessorOptions: {
            scss: {
                loadPaths: [
                    'node_modules',
                    `${SRC_ROOT}/styles`,
                ],
                api: 'modern-compiler',
                silenceDeprecations: ['legacy-js-api', 'color-functions', 'global-builtin', 'import', 'slash-div', 'if-function'],
            }
        }
    }
}));
