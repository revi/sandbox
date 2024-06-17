# @revi/prettier-config

[![NPM Version](https://img.shields.io/npm/v/%40revi%2Fprettier-config?logo=npm&cacheSeconds=600)](https://www.npmjs.com/package/@revi/prettier-config)
[![GitHub License](https://img.shields.io/github/license/revi/sandbox?logo=apache&cacheSeconds=600)](https://github.com/revi/sandbox/tree/master/npm/prettier-config)

This is [@revi](https://revi.xyz/)'s personal [prettier](https://prettier.io/docs/en/) config.

## Config

```js
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
```
