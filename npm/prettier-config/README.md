# @revi/prettier-config

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
