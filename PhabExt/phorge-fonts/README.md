# phorge-fonts

A [Phorge](https://we.phorge.it/) extension that replaces the default UI fonts
with IBM Plex, plus Nanum Gothic Coding for Korean monospace.

| Role                | Family              | Package                           |
| ------------------- | ------------------- | --------------------------------- |
| Sans-serif, Latin   | IBM Plex Sans       | `@ibm/plex-sans`                  |
| Sans-serif, Hangul  | IBM Plex Sans KR    | `@ibm/plex-sans-kr`               |
| Monospace, Latin    | IBM Plex Mono       | `@ibm/plex-mono`                  |
| Monospace, Hangul   | Nanum Gothic Coding | `@fontsource/nanum-gothic-coding` |

Hangul is **never italicised** — for both Korean families the upright files are
declared as the italic faces, so no browser synthesises an oblique. Latin
italics come from the real IBM Plex Sans and IBM Plex Mono italic cuts.

The Standard Korean Language Dictionary defines 이탤릭체 as a 서양 letterform,
and Korean families are drawn to match: Malgun Gothic has Bold, Regular and
Semilight but no Italic, and neither IBM Plex Sans KR nor Nanum Gothic Coding
ships an italic. Italics also have no assigned role in Korean orthography —
한글 맞춤법 and 문장 부호 해설 give quotation to 큰따옴표 and emphasis to
작은따옴표, 드러냄표 or 밑줄 — so slanted Hangul reads as a special effect
rather than as quotation or emphasis. See
[korean.stackexchange.com/q/5399](https://korean.stackexchange.com/q/5399).

Remarkup blockquotes (`>` quotes) are set upright rather than italic, for the
same reason: italic-as-quotation is an English convention Korean does not
share. `em` inside a quote is flipped back to italic so emphasis stays visible.

IBM Plex Sans KR also contains Latin, but IBM Plex Sans is listed ahead of it:
the two share a design, IBM Plex Sans is a seventh of the size, and only it has
genuine italics. The same holds for Nanum Gothic Coding, of which only the
`korean` subset is fetched. Both Korean faces are large, and both are only
downloaded once a page actually contains Hangul.

## Layout

This repository holds the source. `extension/` is the payload: `bin/install`
copies it to `$PHORGE/src/extensions/phorge-fonts/` and downloads the fonts
into the installed copy, which is where they belong — they are install
artifacts, not source, so they are not committed here.

```
extension/src/*.php                     classes, loaded from src/extensions/
extension/resources/celerity/map.php    written by `bin/celerity map`
extension/webroot/rsrc/css/             the stylesheet
extension/webroot/rsrc/font/            fetched at install time
```

## Requirements

- Phorge, any recent `master`.
- `curl`, to download the fonts.
- Shell access to the Phorge install, to run `bin/celerity map`.

## Installing

```sh
sh bin/install /var/www/phorge/phorge
```

The argument defaults to `$PHORGE`, then to `/var/www/phorge/phorge`. The
script copies `extension/` into place, runs `bin/fetch-fonts` against the
installed copy, and runs `$PHORGE/bin/celerity map`. Restart the web server
(and `phd`, if it is running) afterwards — `CelerityResourceMap` caches the map
in a process static, so a running server keeps serving the old one.

Run it as the user the web server runs as, so the installed files are readable
by the server without any ownership fixup. The script never chowns anything:
it sets `umask 022` and finishes with `chmod -R a+rX`, so a run by any other
user with write access to the checkout works too.

It needs write access to two places, and checks both before doing anything:
`src/extensions/`, and `resources/celerity/map.php` — `bin/celerity map`
rebuilds the map of *every* registered resource source, including Phorge's own,
so it rewrites that file even though this extension adds nothing to Phorge's
`webroot/`. On a normal LF checkout the rewritten content should be identical
(the generator hard-codes its HMAC key precisely so the map is reproducible),
but the file is written regardless.

Re-run it to upgrade; `src/`, `resources/` and `webroot/rsrc/css/` are replaced
outright so nothing dropped upstream lingers, while the downloaded fonts and
`licenses/` are left in place.

No `load-libraries` entry is needed: Phorge loads `src/extensions/` on its own.

### Uninstalling

```sh
rm -rf /var/www/phorge/phorge/src/extensions/phorge-fonts
/var/www/phorge/phorge/bin/celerity map
```

To disable every extension at once without deleting anything, set
`PHUTIL_DISABLE_RUNTIME_EXTENSIONS=1` in the server environment.

### Verifying

Load any page and check `<head>`: it should carry a `<link>` to
`/res/phorgefonts/<hash>/rsrc/css/phorge-fonts.css` after the core stylesheets,
and DevTools' Network tab should show the woff2 files loading from your own
host.

## How it works

Phorge has no "add a stylesheet to every page" hook, so the extension uses two
seams:

- **`PhorgeFontsCelerityResources`** registers `webroot/` as a Celerity
  resource source named `phorgefonts`. `PhutilBootloader` scans
  `src/extensions/` recursively and registers each class it finds under its
  parent in the class tree, so `bin/celerity map` picks this up alongside
  Phorge's own resources and `/res/phorgefonts/…` requests are routed to it by
  the stock `CelerityPhabricatorResourceController`. Nothing in Phorge is
  patched, and nothing is added to Phorge's own `webroot/`, so its map keeps
  the same 452 names and 370 symbols — but `bin/celerity map` still rewrites
  that file, which is why the install checks it is writable.
- **`PhorgeFontsMainMenuBarExtension`** contributes no menu items; it exists so
  that `buildMainMenus()` can call `require_celerity_resource()`. The main menu
  is built inside `PhabricatorStandardPageView::willRenderPage()`, which runs
  before `getHead()` collects resources, so the stylesheet lands in `<head>` —
  and, because our source is registered after `phabricator`, after the core
  stylesheets.

The stylesheet then overrides `font-family` with `!important`. That is blunt,
but the alternative is not available: Phorge bakes its font stack into the
`{$fontfamily}` and `{$basefont}` Celerity variables, and those can only be
replaced by a `CelerityPostprocessor`, which is a per-viewer **Accessibility**
setting and mutually exclusive with Dark Mode. See
`extension/webroot/rsrc/css/phorge-fonts.css` for how monospace blocks,
blockquotes, and FontAwesome icons are handled.

## Why the fonts are self-hosted

Phorge emits a `Content-Security-Policy` with no `font-src` directive, so fonts
fall back to `default-src` — `'self'` plus whatever
`security.alternate-file-domain` is set to. A stylesheet pointing at
`cdn.jsdelivr.net` would be blocked by the browser. `bin/fetch-fonts` therefore
pulls the woff2 files from jsDelivr at install time and Celerity serves them
from your own host, which is also how Phorge ships Lato and FontAwesome.

## Known limits

- Pages rendered without chrome (`setShowChrome(false)`) skip the main menu, so
  they keep the default fonts. This is rare in practice.
- The per-user **Monospaced Font** setting still wins, by design: Phorge emits
  it as an inline `<style>` after our stylesheet.
- Living in `src/extensions/` costs a small `include` per request per file, as
  the upstream documentation notes. `resources/celerity/map.php` is included
  that way too; it declares no symbols, so nothing is registered from it.
- The committed `map.php` is an empty placeholder. Until `bin/celerity map`
  runs, the extension detects the missing resource and renders nothing rather
  than throwing on every page.

## Licensing

The extension is Apache-2.0. The IBM Plex families and Nanum Gothic Coding are
all licensed under the SIL Open Font License 1.1; `bin/fetch-fonts` writes each
package's license into `licenses/` in the installed copy.
