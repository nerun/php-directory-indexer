# PHP Directory Indexer

This is a fork of [Celeron Dude's Indexer v2.0](https://web.archive.org/web/20130402100320/http://www.celerondude.com/php-indexer) (January 18, 2005), but with a few improvements. Thanks to [desbest](https://gitlab.com/desbest) for keeping it alive in [GitLab](https://gitlab.com/desbest/celeron-dude-indexer).

> @desbest wrote:
>
> _[Celeron Dude](https://web.archive.org/web/20070205204609/http://celerondude.com/) was influential within the PHP scene back in the day. It's a shame that he quit. He [ragequit](https://web.archive.org/web/20070203064149/http://celerondude.com/) as he got sick of his uploader script being nulled (or cracked) to appear on the piracy (or warez) websites. The forum will explain more._

## Installation

  - `index.php` — is the main file and, technically, that's all you need.
  - `index_theme.php` — is the default icon theme: it includes icons for many different file extensions. it' a copy of Linux Mint-Y 16 pixels mimetypes icons. Folder is Mint-Y-Sand. If you do not use this file, the index will load just 2 icons: unknown file type and a folder, extracted from Apache Fancyindex. By default this file is not listed by the indexer.
  - `background.jpg` — if not used the background will be white. By default this file is not listed by the indexer.
  - `icon_encoder.php` — it's a tool to easy encode icons to base64, the format used in index_theme. By default this file is not listed by the indexer. Open it, select an image, encode it, and read instructions.

Put the files you wish inside your folder.

## Customization

### Ignore files

To add more files to be ignored by indexer, open `index.php` and edit line 33:

```
$ignore=array('.','..','background_default.jpg','background.jpg','.htaccess','icon_encoder.php','index.php','index_theme_default.php','index_theme.php','securityoff.htaccess','Thumbs.db',$self); // ignore these files
```

### Translation

It's in Brazilian Portuguese, BUT it's easy to translate:

Open `index.php` and translate line 31:
```
$sitename='Índice de /';
```

Also translate lines 99-110:
```
// TRANSLATE HERE ==============================================================
var Back        = 'Voltar';
var ObjectsHere = 'objetos nesta pasta';
var InTotal     = 'no total';
var Sort        = 'Ordenar';
var Name        = 'Nome';
var Type        = 'Tipo';
var Size        = 'Tamanho';
var ModDate     = 'Data';
var Previous    = 'anterior';
var Next        = 'seguinte';
// =============================================================================
```

## Custom themes creation

Rename `index_theme.php` to `index_theme_default.php` (indexer do not list this name too). Clone it with name `index_theme.php`. Start editing. Use `icon_encoder.php` to encode the icons (16 x 16 px) you wish for your theme. Read encoder instructions. Add a new background image if you wish: rename the old one to `background_default.jpg` (also not indexed).

These lines are usefull to test icons:
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
That's all folks!
