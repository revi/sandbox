//@ts-check
/**
 * @file revi/sandbox eslint config
 * @see https://eslint.org/docs/latest/use/configure/configuration-files
 * @type {import("eslint").Linter.Config}
 * @copyright Hong Yongmin 2024
 * @license Apache-2.0
 */

import reviConfig from '@revi/eslint-config';
// import wikimedia from 'eslint-config-wikimedia';

export default [
  ...reviConfig,
  // blocked by eslint9 support:
  // https://github.com/wikimedia/eslint-config-wikimedia/issues/563
  //{
  //  files: ['wikiassets/*.js'],
  //  plugins: {wikimedia},
  //  extends: ['wikimedia/client/es6', 'wikimedia/mediawiki'],
  //  languageOptions: {
  //    sourceType: 'script',
  //  },
  //},
];
