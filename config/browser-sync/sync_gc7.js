// In project folder:

// browser-sync start --proxy "todo" --files "**/*.html, **/*.twig, **/*.css, **/*.js, **/*.php"



// In the index.php (Just before </head>) - ça ou directement le code de ce fichier .js:

// <script id="__bs_script__" src='../aGC7/js/sync_gc7.js'></script>



// Dans le fichier ../aGC7/js/sync_gc7.js 

//<![CDATA[
document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.27.10'><\/script>".replace("HOST", location.hostname));
//]]>