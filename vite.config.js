import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
  plugins: [
    laravel({
      publicDirectory: 'resources',
      // buildDirectory: 'dist',
      buildDirectory: '../../../../public/css/codedor/filament-admin-bar',
      input: ['resources/css/filament-admin-bar.css']
    })
  ],
  build: {
    rollupOptions: {
      output: {
        assetFileNames: `assets/[name].[ext]`
      }
    }
  }
})
