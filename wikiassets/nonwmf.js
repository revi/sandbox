// enwiki purgetab
mw.loader.load('//en.wikipedia.org/w/index.php?title=MediaWiki:Gadget-purgetab.js&oldid=951989513&action=raw&ctype=text/javascript');

/* Automate purge confirmation dialog */
if ( mw.config.get( 'wgAction' ) === 'purge' ) {
    $('form.mw-htmlform').submit();
}

/**
 * StewardScript extends the user interface for Wikimedia stewards' convenience.
 * @see https://meta.wikimedia.org/wiki/StewardScript
 * @update-token [[File:pathoschild/stewardscript.js]]
 */
mw.loader.load('//tools-static.wmflabs.org/meta/scripts/pathoschild.stewardscript.js');

// Display users rights (Temporary, might work on my own rewrite of this or find another one)
mw.loader.load('//en.wikipedia.org/w/index.php?title=User:Splarka/sysopdectector.js&oldid=653248315&action=raw&ctype=text/javascript');

// No MediaViewer
mw.config.set("wgMediaViewerOnClick", false);

/**
 * Ajax sysop
 * @see https://meta.wikimedia.org/wiki/Ajax_sysop
 * @update-token [[File:pathoschild/ajaxsysop.js]]
 */
mw.loader.load('//tools-static.wmflabs.org/meta/scripts/pathoschild.ajaxsysop.js');

/**
 * Forces left-to-right layout and editing on RTL wikis.
 * @see https://meta.wikimedia.org/wiki/Force_ltr
 * @update-token [[File:pathoschild/forceltr.js]]
 */
mw.loader.load('//tools-static.wmflabs.org/meta/scripts/pathoschild.forceltr.js');

// Change language to English if it is not
mw.loader.load('//meta.wikimedia.org/w/index.php?title=User:-revi/lang-to-en.js&action=raw&ctype=text/javascript');

// IRTC1015's permalink-collector
mw.loader.load('//ko.wikipedia.org/w/index.php?title=User:IRTC1015/copyReasonLink.js&oldid=20823911&action=raw&ctype=text/javascript');

// Display lists aka StewardLinks
mw.loader.load('//meta.wikimedia.org/w/index.php?oldid=20169009&action=raw&ctype=text/javascript');

/**
 * TemplateScript adds configurable templates and scripts to the sidebar, and adds an example regex editor.
 * @see https://meta.wikimedia.org/wiki/TemplateScript
 * @update-token [[File:Pathoschild/templatescript.js]]
 */
mw.loader.load('//tools-static.wmflabs.org/meta/scripts/pathoschild.templatescript.js');
