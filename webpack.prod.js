const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const config = require('./webpack.settings.js');

module.exports = {
    // context: path.resolve(__dirname, 'dist'),
    output: {
        publicPath: ''
    },
    module: {
        rules: [
            {
                test: /\.(c|sa|sc)ss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'postcss-loader',
                    'sass-loader',
                    {
                        loader: 'sass-resources-loader',
                        options: {
                            resources: [
                                path.resolve(__dirname, 'themesrc/assets/scss/dev.scss')
                            ]
                        }
                    }
                ]
            }
        ]
    },
    plugins: [
        new CopyWebpackPlugin([
            {
                context: './themesrc',
                from: '*',
                globOptions: {
                    ignore: [
                        '*.json',
                    ]
                },
                to: path.resolve(__dirname, 'dist/' + config.themeName)
            },
            {
                context: './themesrc',
                from: './inc/**/*',
                to: path.resolve(__dirname, 'dist/' + config.themeName)
            },
            {
                context: './themesrc',
                from: './template-parts/**/*',
                to: path.resolve(__dirname, 'dist/' + config.themeName)
            },
            {
                context: './themesrc',
                from: './template-elements/**/*',
                to: path.resolve(__dirname, 'dist/' + config.themeName)
            },
            {
                context: './themesrc',
                from: './partials/**/*',
                to: path.resolve(__dirname, 'dist/' + config.themeName)
            },
            {
                context: './themesrc',
                from: './woocommerce/**/*',
                to: path.resolve(__dirname, 'dist/' + config.themeName)
            },
            {
                context: './themesrc',
                from: './assets/svg/**/*',
                to: path.resolve(__dirname, 'dist/' + config.themeName)
            },
            {
                context: './themesrc',
                from: './assets/favicons/*',
                to: path.resolve(__dirname, 'dist/' + config.themeName)
            },
            {
                context: './themesrc',
                from: './assets/video/*',
                to: path.resolve(__dirname, 'dist/' + config.themeName)
            }

        ]),
        new MiniCssExtractPlugin({
            filename: '[name].css'
        })
    ]
};
