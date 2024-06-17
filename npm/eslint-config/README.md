# @revi/eslint-config

[![NPM Version](https://img.shields.io/npm/v/%40revi%2Feslint-config?logo=npm&cacheSeconds=600)](https://www.npmjs.com/package/@revi/eslint-config)
[![GitHub License](https://img.shields.io/github/license/revi/sandbox?logo=apache&cacheSeconds=600)](https://github.com/revi/sandbox/tree/master/npm/eslint-config)

This is [@revi](https://revi.xyz/)'s personal [eslint](https://eslint.org/docs/latest/use/configure/configuration-files) config.

## Config

```js
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
```
