// @ts-check
/**
 * @file revi's prettier config preset
 * @see https://prettier.io/docs/en/configuration.html
 * @type {import("prettier").Config}
 * @copyright Hong Yongmin 2024
 * @license Apache-2.0
 */

// Update README.md when you update the config.
const config = {
  bracketSpacing: false,
  bracketSameLine: true,
  proseWrap: 'preserve',
  singleQuote: true,
  trailingComma: 'all',
  plugins: [
    // https://github.com/prettier/plugin-php
    '@prettier/plugin-php',
    // https://github.com/un-ts/prettier/tree/master/packages/sh
    'prettier-plugin-sh',
    // https://github.com/bd82/toml-tools/tree/master/packages/prettier-plugin-toml
    'prettier-plugin-toml',
    // https://github.com/prettier/plugin-xml
    '@prettier/plugin-xml',
  ],
  overrides: [
    // Sort by parser alphabet.
    {
      files: ['.arcconfig', '.arclint', '.arcunit', '.imgbotconfig'],
      options: {parser: 'json'},
    },
    {
      files: [
        '**/*.hujson',
        '.devcontainer.json',
        '.devcontainer/**/devcontainer.json',
        '.vscode/**/*.json',
        '**/jsconfig.json',
        '**/jsconfig.*.json',
        '**/tsconfig.json',
        '**/tsconfig.*.json',
      ],
      options: {parser: 'jsonc', trailingComma: 'none'},
    },
    {
      files: '*.php',
      options: {
        parser: 'php',
        phpVersion: '8.1',
        useTabs: true,
        tabWidth: 4,
        braceStyle: '1tbs',
      },
    },
    {
      files: [
        '.editorconfig',
        '.gitattributes',
        '.gitignore',
        '.prettierignore',
      ],
      options: {parser: 'sh', keepPadding: true, minify: false},
    },
    {
      files: ['*.svg', '*.xml'],
      options: {
        parser: 'xml',
        singleAttributePerLine: false,
        xmlQuoteAttributes: 'preserve',
        xmlSelfClosingSpace: true,
        xmlSortAttributesByKey: false,
        xmlWhitespaceSensitivity: 'strict',
      },
    },
    {
      files: '.yamllint',
      options: {parser: 'yaml'},
    },
  ],
};

export default config;
