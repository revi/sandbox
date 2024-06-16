// @ts-check
/**
 * @file revi's eslint config preset
 * @see https://eslint.org/docs/latest/use/configure/configuration-files
 * @type {import("eslint").Linter.Config}
 * @copyright Hong Yongmin 2024
 * @license Apache-2.0
 */

// Update README.md when you update the config.
import globals from 'globals';
import pluginJs from '@eslint/js';
import eslintConfigPrettier from 'eslint-config-prettier';

export default [
  pluginJs.configs.recommended,
  {
    rules: {
      'no-undef': 'warn',
      'no-unused-vars': 'warn',
    },
  },
  {languageOptions: {globals: globals.browser}},
  eslintConfigPrettier,
];
