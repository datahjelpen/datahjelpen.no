const withScss = require("@zeit/next-sass");

module.exports = withScss({
  cssModules: true,
  cssLoaderOptions: {
    importLoaders: 1,
    localIdentName: "DH-[hash:base64:5]"
  }
});
