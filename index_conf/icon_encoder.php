<?php
$b64 = '';

if ( !function_exists ( 'file_get_contents' ) )
{
    function file_get_contents ( $file )
    {
        $fp = @fopen ( $file, 'rb' );
        if ( !$fp ) exit ( 'Impossível abrir ' . $file );
        $data = fread ( $fp, filesize ( $file ) );
        fclose ( $fp );
        return $data;
    }
}

if ( isset ( $_FILES['myfile'] ) )
{
    $b64 = base64_encode ( file_get_contents ( $_FILES['myfile']['tmp_name'] ) );
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Icon base64 encoder</title>
</head>
<body>
<form id="UploadForm" action="" method="post" enctype="multipart/form-data">
    <p>Selecione o arquivo de ícone (imagem):
        <input type="file" name="myfile" size="50" />
        <input type="submit" value="codificar" />
    </p>

    <?php if ( $b64 != '' ) : ?>
        <textarea id="encodedicon" rows="12" cols="120" wrap="hard"><?=$b64?></textarea>

        <script>
            function copy_to_clipboard(id)
            {
                document.getElementById(id).select();
                document.execCommand('copy');
            }
        </script>

        <input type="button" value="Copiar" onclick="copy_to_clipboard('encodedicon');">

        <p>Copie os dados codificados acima e defina-os como um elemento da array <strong style="color:blue;">$I</strong> em <strong style="color:blue;">index.php</strong>. Por exemplo, se você acabou de codificar um ícone para a extensão ".jpg", adicione isto:</p>

        <blockquote>
            <strong style="color:blue;">
                <code>$I['jpg']='COLE OS DADOS CODIFICADOS AQUI';</code>
            </strong>
        </blockquote>
         
        <p>Se você quiser usar o mesmo ícone para várias extensões, faça algo assim:</p>

        <blockquote>
            <strong style="color:blue;">
                <code>$I['gif']=$I['jpg']=$I['png']='COLE OS DADOS CODIFICADOS AQUI';</code>
            </strong>
        </blockquote>
    <?php endif; ?>
</form>
</body>
</html>
