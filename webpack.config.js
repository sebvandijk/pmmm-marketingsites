/* eslint-disable no-undef */
// const webpack = require('webpack');
const path = require('path');
const merge = require('webpack-merge');
const config = require('./webpack.settings.js');

const modeConfig =
    process.env.NODE_ENV === 'production'
        ? require('./webpack.prod')
        : require('./webpack.dev');

module.exports = merge(
    {
        mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
        entry: {
            site: './themesrc/assets/js/site.js',
            admin: './themesrc/assets/js/admin.js'
        },
        output: {
            filename: '[name].js',
            path: path.resolve(__dirname, 'dist/' + config.themeName + '/assets/')
        },
        module: {
            rules: [
                {
                    test: /\.js$/, // scripts
                    exclude: /node_modules/,
                    use: ['babel-loader']
                },
                {
                    test: /\.(png|svg|jpg|jpeg|gif)$/, // images
                    use: ['file-loader']
                },
                {
                    test: /\.(woff|woff2|eot|ttf|otf)$/, // fonts
                    use: ['file-loader']
                },
            ]
        },
        resolve: {
            modules: [
                'node_modules'
            ],
            alias: {
                'Fonts': path.resolve(__dirname, 'themesrc/assets/fonts'),
                'Assets': path.resolve(__dirname, 'themesrc/assets'),
                'Images': path.resolve(__dirname, 'themesrc/assets/images')
            }
        },
        plugins: []
    },
    modeConfig
);
