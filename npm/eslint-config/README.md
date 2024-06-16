# @revi/eslint-config

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
