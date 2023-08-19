# PHP Directory Indexer

This is a fork of [Celeron Dude's Indexer v2.0](https://web.archive.org/web/20130402100320/http://www.celerondude.com/php-indexer) (January 18, 2005), but with a few improvements. Thanks to [desbest](https://gitlab.com/desbest) for keeping it alive in [GitLab](https://gitlab.com/desbest/celeron-dude-indexer).

> @desbest wrote:
>
> _[Celeron Dude](https://web.archive.org/web/20070205204609/http://celerondude.com/) was influential within the PHP scene back in the day. It's a shame that he quit. He [ragequit](https://web.archive.org/web/20070203064149/http://celerondude.com/) as he got sick of his uploader script being nulled (or cracked) to appear on the piracy (or warez) websites. The forum will explain more._

## Installation

  - `index_conf/` — configuration folder for index.php (it's not indexed, it's hidden).
    - `themes` — themes folder.
    - `img` — background images folder.
    - `icon_encoder.php` — it's a tool to easy encode icons to base64, the format used in index themes. There is a link to it below file listing "[Icon Encoder]". Open it, select an image, encode it, and read instructions.
  - `index.php` — is the main file and, technically, that's all you need.

Put the files you wish inside the folder to be indexed. You can add just `index.php`.

## Customization

### Ignore files

To add more files to be ignored by indexer, open `index.php` and edit lines 35-44:

```
$ignore=array('.','..',
              'error_log',
              'favicon.ico',
              '.htaccess',
              'icon_encoder.php',
              'index_conf',
              'index.php',
              'securityoff.htaccess',
              'Thumbs.db',
              $self); // ignore these files
```

### Translation

It's in Brazilian Portuguese, BUT it's easy to translate:

Open `index.php` and translate lines 28-30:
```
// TRANSLATE HERE
$IndexOf='Índice de';
$DirDontExist='Diretório não existe';
```

Also translate lines 117-128:
```
// TRANSLATE HERE ==============================================================
var Back        = 'Voltar';
var ObjectsHere = 'itens nesta pasta';
var InTotal     = 'no total';
var Sort        = 'Ordenar por';
var Name        = 'Nome';
var Type        = 'Tipo';
var Size        = 'Tamanho';
var ModDate     = 'Data';
var Previous    = 'anterior';
var Next        = 'seguinte';
// =============================================================================
```

## Custom themes creation

Clone any theme in `index_conf/themes`. Start editing. Click in the "[Icon Encoder]" link to `icon_encoder.php`, to start encoding the icons you wish for your theme. Size of 16 x 16 px is the best, but 20 x 22 is ok. Read encoder instructions. To add a new background image put it in `index_conf/img`.

Open `index.php` and update theme and background:
```
<?php
$_DefaultTheme='mint-y-sand.php'; // don't forget extension ".php"!
$_Background='default.jpg';
```

At the end of each theme.php file these lines were added because they are useful for testing icons:
```
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
//header('Cache-control: max-age=2592000');
//header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T',time()+2592000));
```

But, when you finish, better change to:
```
//header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//header("Cache-Control: post-check=0, pre-check=0", false);
//header("Pragma: no-cache");
header('Cache-control: max-age=2592000');
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T',time()+2592000));
```

You can add a custom `favicon.ico` to the indexed folder too (not inside `index_conf/themes`, but in root, together with `index.php`).

That's all folks!
