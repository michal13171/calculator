const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
	mode: 'development',
	entry: {
		app: [
			path.resolve(__dirname, 'src/js/index.js'),
			path.resolve(__dirname, 'src/styles/main.scss')
		],
	},
	output: {
		filename: 'main.js',
		path: path.resolve(__dirname, 'dist'),
	},
	module: {
		rules: [
		{
				test: /\.s?css$/,
				exclude: /node_modules/,
				type: 'asset/resource',
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					'sass-loader',
				]
			}
		]
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: '[name].min.css',
		}),
	],
	optimization: {
		minimize: true,
		minimizer: [
			new TerserPlugin(),
			new CssMinimizerPlugin(),
		],
	},
};
