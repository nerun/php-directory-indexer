<?php
if(file_exists('index_theme.php'))
{
    include 'index_theme.php';
} else {
    @ob_start('ob_gzhandler');
    if(isset($_GET['icon']))
    {
        $e=$_GET['icon'];
        $I['dir']='R0lGODlhDwAQAMIAAP/////Mmcz//5lmMzMzMwAAAP///////yH5BAEKAAcALAAAAAAPABAAAAM0eLrc/jCeQet4I+gdRvmFQnDk
        FmYl6aHptrbuC3fyXLdUweIv6msZz4FgKVIIBAVouUwmAAA7';
        $I['file']='R0lGODlhDwAQAMIAAP///8z//5mZmTMzMwAAAP///////////yH5BAEKAAcALAAAAAAPABAAAANMOLIsehAKQCuYIp553fhUJl1
        EWQ5BOoxCKQSDaW4XSBLMWAWOy+sAngl1AbYICo6Ic2MWaZbok3l0LitVy1WqlaS+4JTo8CmbPwRIAgA7';
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        //header('Cache-control: max-age=2592000');
        //header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T',time()+2592000));
        header('Content-type: image/gif');
        print base64_decode(isset($I[$e])?$I[$e]:$I['file']);
        exit;
    }
}

// Locales (do nothing)
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

// Start configs
$self = basename(isset($_SERVER['SCRIPT_FILENAME']) ? $_SERVER['SCRIPT_FILENAME'] : __FILE__);
$sitename='Índice de /';
$date='Y-m-d H:i'; // date format
$ignore=array('.','..','.htaccess','background.jpg','background_default.jpg','index.php','index_theme.php','index_theme_default.php','Thumbs.db',$self); // ignore these files
// End configs
$root=dirname(__FILE__);
$dir=isset($_GET['dir'])?$_GET['dir']:'';if(strstr($dir,'..'))$dir='';
$path="$root/$dir/";
$dirs=$files=array();
if(!is_dir($path)||false==($h=opendir($path)))exit('Diretório não existe.');
while(false!==($f=readdir($h)))
{
    if(in_array($f,$ignore))continue;
    if(is_dir($path.$f))$dirs[]=array('name'=>$f,'date'=>filemtime($path.$f),'url'=>$self.'?dir='.rawurlencode(trim("$dir/$f",'/')));
    else$files[]=array('name'=>$f,'size'=>filesize($path.$f),'date'=>filemtime($path.$f),'url'=>trim("$dir/".rawurlencode($f),'/'));
}
closedir($h);
$current_dir_name = basename($dir);
$up_dir=dirname($dir);
$up_url=($up_dir!=''&&$up_dir!='.')?$self.'?dir='.rawurlencode($up_dir):$self;
// END PHP ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<title><?php print$current_dir_name==''?$sitename:$current_dir_name?></title>
<style type="text/css">
body { font-family: verdana, arial, tahoma; font-size: 1.0em; color: black; padding-top: 8px; cursor: default; background-color: #fff; }
#idx { border: 3px solid #fff; width: 700px; }
#idx td.center { text-align: center; }
#idx td { border-bottom: 1px solid #f0f0f0; width: 400px; }
#idx img { margin-bottom: -2px; }
#idx table { color: #606060; width: 100%; margin-top:3px; }
#idx span.link { color: #0066DF; cursor: pointer; }
#idx .rounded { padding: 10px 7px 10px 10px; -moz-border-radius:6px; }
#idx .gray { background-color:#fafafa;border-bottom: 1px solid #e5e5e5; }
#idx p { padding: 0px; margin: 0px;line-height:1.4em;}
#idx p.left { float:left;width:55%;padding:3px;color:#606060;}
#idx p.right {float:right;width:40%;text-align:right;color:#707070;padding:3px;}
#idx strong { font-family: verdana, arial, tahoma; font-size: 1.2em; font-weight: bold; color: #202020; padding-bottom: 3px; margin: 0px; }
#idx a:link    { color: #0066CC; }
#idx a:visited { color: #003366; }
#idx a:hover   { text-decoration: none; }
#idx a:active  { color: #9DCC00; }
body {
    background-image: url('background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}
</style>

<script type="text/javascript">
<!--
var _c1='#fefefe'; var _c2='#fafafa'; var _ppg=25; var _cpg=1; var _files=[]; var _dirs=[]; var _tpg=null; var _tsize=0; var _sort='date'; var _sdir={'type':0,'name':0,'size':0,'date':1}; var idx=null; var tbl=null;
function _obj(s){return document.getElementById(s);}
function _ge(n){n=n.substr(n.lastIndexOf('.')+1);return n.toLowerCase();}
function _nf(n,p){if(p>=0){var t=Math.pow(10,p);return Math.round(n*t)/t;}}
function _s(v,u){if(!u)u='B';if(v>1024&&u=='B')return _s(v/1024,'KB');if(v>1024&&u=='KB')return _s(v/1024,'MB');if(v>1024&&u=='MB')return _s(v/1024,'GB');return _nf(v,1)+'&nbsp;'+u;}
function _f(name,size,date,url,rdate){_files[_files.length]={'dir':0,'name':name,'size':size,'date':date,'type':_ge(name),'url':url,'rdate':rdate,'icon':'<?php print$self?>?icon='+_ge(name)};_tsize+=size;}
function _d(name,date,url){_dirs[_dirs.length]={'dir':1,'name':name,'date':date,'url':url,'icon':'<?php print$self?>?icon=dir'};}
function _np(){_cpg++;_tbl();}
function _pp(){_cpg--;_tbl();}
function _sa(l,r){return(l['size']==r['size'])?0:(l['size']>r['size']?1:-1);}
function _sb(l,r){return(l['type']==r['type'])?0:(l['type']>r['type']?1:-1);}
function _sc(l,r){return(l['rdate']==r['rdate'])?0:(l['rdate']>r['rdate']?1:-1);}
function _sd(l,r){var a=l['name'].toLowerCase();var b=r['name'].toLowerCase();return(a==b)?0:(a>b?1:-1);}
function _srt(c){switch(c){case'type':_sort='type';_files.sort(_sb);if(_sdir['type'])_files.reverse();break;case'name':_sort='name';_files.sort(_sd);if(_sdir['name'])_files.reverse();break;case'size':_sort='size';_files.sort(_sa);if(_sdir['size'])_files.reverse();break;case'date':_sort='date';_files.sort(_sc);if(_sdir['date'])_files.reverse();break;}_sdir[c]=!_sdir[c];_obj('sort_type').style.fontStyle=(c=='type'?'italic':'normal');_obj('sort_name').style.fontStyle=(c=='name'?'italic':'normal');_obj('sort_size').style.fontStyle=(c=='size'?'italic':'normal');_obj('sort_date').style.fontStyle=(c=='date'?'italic':'normal');_tbl();return false;}

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

function _head()
{
    if(!idx)return;
    _tpg=Math.ceil((_files.length+_dirs.length)/_ppg);
    idx.innerHTML='<div class="rounded gray" style="padding:5px 10px 5px 7px;color:#202020">' +
        '<p class="left">' +
            '<?php print$dir!=''?'<span style="font-size:22px;"><a href="'.$up_url.'" style="text-decoration:none;">&#11178;</a></span>&nbsp;&nbsp;':''?><strong><?php print$current_dir_name==''?$sitename:$current_dir_name?></strong><br />' + (_files.length+_dirs.length) + ' ' + ObjectsHere + ', ' + _s(_tsize) + ' ' + InTotal + '.' +
        '</p>' +
        '<p class="right">' +
            Sort + ':<br /><span class="link" onmousedown="return _srt(\'name\');" id="sort_name">' + Name + '</span>, <span class="link" onmousedown="return _srt(\'type\');" id="sort_type">'+ Type + '</span>, <span class="link" onmousedown="return _srt(\'size\');" id="sort_size">' + Size + '</span>, <span class="link" onmousedown="return _srt(\'date\');" id="sort_date">' + ModDate + '</span>' +
        '</p>' +
        '<div style="clear:both;"></div>' +
    '</div><div id="idx_tbl"></div>';
    tbl=_obj('idx_tbl');
}

function _tbl()
{
    var _cnt=_dirs.concat(_files);if(!tbl)return;if(_cpg>_tpg){_cpg=_tpg;return;}else if(_cpg<1){_cpg=1;return;}var a=(_cpg-1)*_ppg;var b=_cpg*_ppg;var j=0;var html='';
    if(_tpg>1)html+='<p style="padding:5px 5px 0px 7px;color:#202020;text-align:right;"><span class="link" onmousedown="_pp();return false;">' + Previous + '</span> ('+_cpg+'/'+_tpg+') <span class="link" onmousedown="_np();return false;">' + Next + '</span></p>';
    html+='<table cellspacing="0" cellpadding="5" border="0">';
    for(var i=a;i<b&&i<(_files.length+_dirs.length);++i)
    {
        var f=_cnt[i];var rc=j++&1?_c1:_c2;
        html+='<tr style="background-color:'+rc+'"><td><img src="'+f['icon']+'" alt="" /> &nbsp;<a href="'+f['url']+'">'+f['name']+'</a></td><td class="center" style="width:50px;">'+(f['dir']?'':_s(f['size']))+'</td><td class="center" style="width:140px;">'+f['date']+'</td></tr>';
    }
    tbl.innerHTML=html+'</table>';
}
<?php foreach($dirs as $d) { print sprintf("_d('%s','%s','%s');\n",addslashes($d['name']),date($date,$d['date']),addslashes($d['url'])); } ?>
<?php foreach($files as $f) { print sprintf("_f('%s',%d,'%s','%s',%d);\n",addslashes($f['name']),$f['size'],date($date,$f['date']),addslashes($f['url']),$f['date']); } ?>

window.onload=function()
{
    idx=_obj('idx'); _head(); _srt('name');
};
-->
</script>
</head>
<body>
    <center>
        <div id="idx"><!-- do not remove --></div><br />
        <div style="font-size:small"><a href="https://github.com/nerun/php-directory-indexer" target="_blank">
        PHP Directory Indexer on GitHub</a></div>
    </center>
</body>
</html>
