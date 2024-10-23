<!--
SPDX-FileCopyrightText: (C) 2024 Hong Yongmin (https://revi.xyz/) <yewon@revi.email>

SPDX-License-Identifier: Apache-2.0

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->

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
