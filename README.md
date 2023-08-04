# PHP Directory Indexer

## Installation

  - `index.php` --- is the main file and, technically, that's all you need.
  - `index_theme.php` --- is the default icon theme: it includes icons for many different file extensions. it' a copy of Linux Mint-Y 16 pixels mimetypes icons. Folder is Mint-Y-Sand. If you do not use this file, the index will load just 2 icons: unknown file type and a folder, extracted from Apache Fancyindex. By default this file is not listed by the indexer.
  - `background.jpg` --- if not used the background will be white. By default this file is not listed by the indexer.
  - `icon base64 encoder.php` --- it's a tool to easy encode icons to base64, the format used in index_theme. By default this file is listed by the indexer. Open it, select an image, encode it, and read instructions.

Put the files you wish inside your folder.

## Customization

### Ignore files

To add more files to be ignored by indexer, open `index.php` and edit line 33:

```
$ignore=array('.','..','.htaccess','background.jpg','background_default.jpg','index.php','index_theme.php','index_theme_default.php','Thumbs.db',$self); // ignore these files
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

That's all folks!

## Custom themes creation

Rename `index_theme.php` to `index_theme_default.php` (indexer do not list this name too). Clone it with name `index_theme.php`. Start editing. Use `icon base64 encoder.php` to encode the icons (16 x 16 px) you wish for your theme. Read encoder instructions. Add a new background image if you wish: rename the old one to `background_default.jpg` (also not indexed).

This lines are usefull to test icons:
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
