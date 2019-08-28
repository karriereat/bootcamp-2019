const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const development = process.env.NODE_ENV !== 'production';

module.exports = {
    entry: './js/app.js',
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, 'web', 'assets')
    },
    plugins: [
        new MiniCssExtractPlugin()
    ],
    module: {
        rules: [{
            test: /\.scss$/,
            use: [
                development ? 'style-loader' : MiniCssExtractPlugin.loader,
                'css-loader',
                'sass-loader'
            ]
        }]
    },
    devServer: {
        contentBase: path.join(__dirname, 'web'),
        compress: true,
        port: 4040
    }
};
