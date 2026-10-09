# Celeron Dude's Original File

This is the original Celeron Dude code, with a small correction in `index.php` to make it work with PHP 8+, since the `each()` function was deprecated in PHP 7.2 and permanently removed in PHP 8.[^1]

lines 115-121:

```php
/*
    PHP 8 correction: each (Celeron Dude's original code) replaced by foreach (desbest/celeron-dude-indexer)
    while(list(,$d)=each($dirs))  -> foreach($dirs as $d)
    while(list(,$f)=each($files)) -> foreach($files as $f)
*/
<?php foreach($dirs as $d) print sprintf("_d('%s','%s','%s');\n",addslashes($d['name']),date($date,$d['date']),addslashes($d['url'])); ?>
<?php foreach($files as $f) print sprintf("_f('%s',%d,'%s','%s',%d);\n",addslashes($f['name']),$f['size'],date($date,$f['date']),addslashes($f['url']),$f['date']);?>
```

The files still use the CRLF format, which is native to Windows.

```bash
$ unzip -l indexer20_fix_PHP8.zip
Archive:  indexer20_fix_PHP8.zip
  Length      Date    Time    Name
---------  ---------- -----   ----
     1739  2006-01-18 21:16   icon.php
    18353  2026-10-09 00:00   index.php
---------                     -------
    20092                     2 files
```

[^1]: https://www.php.net/manual/en/function.each.php
