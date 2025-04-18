import { sveltekit } from "@sveltejs/kit/vite";
import { defineConfig } from "vite";


export default defineConfig ({
    // config options
    build: {
        emptyOutDir:false,

    },
    plugins:[sveltekit()],
  })