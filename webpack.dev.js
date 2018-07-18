const common = require('./webpack.common.js');
const path = require('path');

const merge = require('webpack-merge');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const Critters = require('critters-webpack-plugin');

module.exports = merge(common, {
  mode: 'development',
  plugins: [
    // new Critters({
    //   preload: 'swap'
    // }),
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 8080,
      notify: false,
      server: { baseDir: [__dirname+'/dist'] }
    }),
  ]
});
