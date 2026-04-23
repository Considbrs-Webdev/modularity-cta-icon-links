import { createViteConfig } from "vite-config-factory";

const entries = {
    'css/modularity-cta-icon-links': './source/sass/modularity-cta-icon-links.scss',
};

export default createViteConfig(entries, {
    outDir: "assets/dist",
    manifestFile: "manifest.json",
});
