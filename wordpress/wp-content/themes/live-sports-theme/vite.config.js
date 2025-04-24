import { defineConfig } from 'vite'
import { wordpressPlugin } from '@roots/vite-plugin'
import fs from 'fs'
import path from 'path'

export default defineConfig({
  base: '/wp-content/themes/live-sports-theme/public/build/',
  plugins: [
    wordpressPlugin(),
    {
      // Plugin để di chuyển manifest.json
      name: 'move-manifest',
      writeBundle(options) {
        // Đường dẫn gốc của dự án
        const rootDir = path.resolve(__dirname)
        // Đường dẫn outDir (public/build)
        const outDir = path.resolve(options.dir)

        // Danh sách các đường dẫn có thể chứa manifest.json
        const possibleManifestPaths = [
          path.join(rootDir, 'public/.vite/manifest.json'), // public/.vite/manifest.json
          path.join(outDir, '.vite/manifest.json'), // public/build/.vite/manifest.json
          path.join(rootDir, '.vite/manifest.json'), // .vite/manifest.json (trường hợp bất ngờ)
        ]

        let manifestSrc = null
        // Tìm file manifest.json
        for (const srcPath of possibleManifestPaths) {
          if (fs.existsSync(srcPath)) {
            manifestSrc = srcPath
            console.log(`Found manifest.json at ${srcPath}`)
            break
          }
        }

        if (manifestSrc) {
          const manifestDest = path.join(outDir, 'manifest.json') // public/build/manifest.json
          fs.renameSync(manifestSrc, manifestDest)
          console.log(`Moved manifest.json to ${manifestDest}`)

          // Xóa thư mục .vite nếu tồn tại
          const viteDir = path.dirname(manifestSrc)
          if (fs.existsSync(viteDir) && viteDir.includes('.vite')) {
            fs.rmSync(viteDir, { recursive: true, force: true })
            console.log(`Removed ${viteDir}`)
          }
        } else {
          console.warn('Could not find manifest.json in any expected locations:', possibleManifestPaths)
        }
      },
    },
  ],
  build: {
    manifest: true,
    outDir: 'public/build', // Đầu ra trong public/build
    assetsDir: 'assets', // Tài nguyên trong public/build/assets
    rollupOptions: {
      input: [
        'resources/js/app.js',
        'resources/styles/app.scss',
      ],
    },
    copyPublicDir: false, // Tắt sao chép publicDir
  },
  publicDir: false, // Tắt publicDir hoàn toàn để tránh xung đột
  resolve: {
    alias: {
      '@scripts': '/resources/js',
      '@styles': '/resources/styles',
      '@fonts': '/resources/fonts',
      '@images': '/resources/images',
    },
  },
})