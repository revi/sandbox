/*
 * SPDX-FileCopyrightText: (C) 2024 Hong Yongmin (https://revi.xyz/) <yewon@revi.email>
 *
 * SPDX-License-Identifier: Apache-2.0
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// @ts-check
/**
 * @file revi's eslint config preset
 * @see https://eslint.org/docs/latest/use/configure/configuration-files
 * @type {import("eslint").Linter.Config}
 * @copyright Hong Yongmin 2024
 * @license Apache-2.0
 */

// Update README.md when you update the config.
import {defineConfig} from 'eslint/config';
import globals from 'globals';
import pluginJs from '@eslint/js';
import markdown from '@eslint/markdown';
import eslintConfigPrettier from 'eslint-config-prettier';

export default defineConfig([
  {
    // JavaScript rules cannot run on files parsed by other languages.
    ignores: ['**/*.md'],
    extends: [pluginJs.configs.recommended],
    languageOptions: {
      globals: globals.browser,
    },
    rules: {
      'no-undef': 'warn',
      'no-unused-vars': 'warn',
    },
  },
  {
    files: ['**/*.md'],
    plugins: {
      markdown,
    },
    extends: ['markdown/recommended'],
    language: 'markdown/gfm',
    languageOptions: {
      frontmatter: 'yaml',
    },
    rules: {
      'markdown/require-alt-text': 'warn',
    },
  },
  eslintConfigPrettier,
]);
