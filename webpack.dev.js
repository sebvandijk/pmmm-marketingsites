const webpack = require('webpack');
const path = require('path');

module.exports = {
    output: {
        publicPath: 'http://localhost:8000/'
    },
    module: {
        rules: [
            {
                test: /\.(c|sa|sc)ss$/,
                use: ['style-loader', 'css-loader', 'postcss-loader', 'sass-loader', {
                    loader: 'sass-resources-loader',
                    options: {
                        resources: [
                            path.resolve(__dirname, 'themesrc/assets/scss/dev.scss')
                        ]
                    }
                }]
            }
        ]
    },
    devServer: {
        port: 8000,
        headers: {
            'Access-Control-Allow-Origin': '*'
        },
        compress: true,
        hot: true,
        inline: true,
        stats: 'errors-only',
        overlay: true
    },
    plugins: [
        new webpack.NamedModulesPlugin(),
        new webpack.HotModuleReplacementPlugin()
    ]
};