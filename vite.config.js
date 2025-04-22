import { sveltekit } from "@sveltejs/kit/vite";
import { defineConfig } from "vite";

export default defineConfig ({
    // config options
    build: {
        emptyOutDir:false,

    },
    plugins:[
      sveltekit(),
    ],
    // for local debuging only proxy http://localhost:5173/backend to http://localhost:8080
    server: {
        proxy: {
          '/devbackend': {
            target: 'http://localhost:8080', // Backend server
            changeOrigin: true, // Ensure the request appears to come from the frontend server
            rewrite: (path) => path.replace(/^\/devbackend/, ''), // Optional: Remove '/api' prefix
          },
        },
      },
  })


