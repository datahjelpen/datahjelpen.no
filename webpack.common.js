const webpack = require('webpack');
const path = require('path');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');

const srcRoot = path.resolve(__dirname, 'src');
const distRoot = path.resolve(__dirname, 'dist');

module.exports = {
  entry: srcRoot+'/js/datahjelpen.js',
  output: {
    path: distRoot,
    filename: 'datahjelpen.[chunkhash].js',
  },
  plugins: [
    new CleanWebpackPlugin([distRoot], {
      exclude: [
        '_',
        'assets'
      ]
    }),
    new CopyWebpackPlugin([
      { from: srcRoot+'/html/_/', to: distRoot+'/_/' },
      { from: srcRoot+'/html/google8d3b08b7cd2acf75.html', to: distRoot+'/[name].[ext]' },
      { from: srcRoot+'/html/google8978bc95082897d7.html', to: distRoot+'/[name].[ext]' },
      { from: srcRoot+'/html/z0wd1adbmfpuyqg4il25zgkjnaz0xq.html', to: distRoot+'/[name].[ext]' },
      { from: srcRoot+'/html/image.jpg', to: distRoot+'/[name].[ext]' },
      { from: srcRoot+'/html/image.png', to: distRoot+'/[name].[ext]' },
      { from: srcRoot+'/html/robots.txt', to: distRoot+'/[name].[ext]' },
      { from: srcRoot+'/html/robots.txt', to: distRoot+'/[name].[ext]' },
      { from: srcRoot+'/html/sitemap.xml', to: distRoot+'/[name].[ext]' },
    ]),
    new HtmlWebpackPlugin({
      filename: 'index.html',
      template: path.resolve(__dirname, 'src/html/index.html')
    }),
  ]
  // externals: [
  //   {
  //     'window': 'window'
  //   }
  // ],
}
