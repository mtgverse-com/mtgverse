<!doctype html>
<html><head><meta charset="utf-8"><meta http-equiv="refresh" content="0;url=./index.html"><title>Search</title></head><body>
<p>Search is not available on the static site. Try the <a href="./index.html">home page</a>.</p>
<?php
// Simple redirect to the static client-side search page.
http_response_code(302);
header('Location: /mtgverse/search.html');
exit();

</body></html>
