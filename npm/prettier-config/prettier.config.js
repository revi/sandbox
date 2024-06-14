// @ts-check
/**
 * @file revi's prettier config preset
 * @see https://prettier.io/docs/en/configuration.html
 * @type {import("prettier").Config}
 * @copyright Hong Yongmin 2024
 * @license Apache-2.0
 */

const config = {
  bracketSpacing: false,
  bracketSameLine: true,
  proseWrap: 'preserve',
  singleQuote: true,
  trailingComma: 'all',
  overrides: [
    {
      files: '.arcconfig',
      options: {parser: 'json'},
    },
    {
      files: '.arclint',
      options: {parser: 'json'},
    },
    {
      files: '.arcunit',
      options: {parser: 'json'},
    },
    {
      files: '.imgbotconfig',
      options: {parser: 'json'},
    },
    {
      files: '.yamllint',
      options: {parser: 'yaml'},
    },
  ],
};

export default config;
