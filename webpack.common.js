const webpack = require('webpack');
const path = require('path');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const srcRoot = path.resolve(__dirname, 'src');
const distRoot = path.resolve(__dirname, 'dist');

module.exports = {
  entry: srcRoot+'/js/datahjelpen.js',
  output: {
    path: distRoot,
    filename: 'datahjelpen.[chunkhash].js',
  },
  module: {
    rules: [
      {
        test: /\.(gif|png|jpe?g|svg)$/i,
        use: [
          'file-loader?name=assets/images/[name].[ext]',
          {
            loader: 'image-webpack-loader',
            options: {
              mozjpeg: {
                progressive: true,
                quality: 65,
              },
              optipng: {
                enabled: false,
              },
              pngquant: {
                quality: '65-90',
                speed: 4
              },
              gifsicle: {
                interlaced: false,
              },
              webp: {
                quality: 75
              }
            }
          },
        ],
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ],
      }
    ]
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
    new MiniCssExtractPlugin({
      filename: 'datahjelpen.[chunkhash].css',
    }),
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
