<?php
//ParseDownライブラリを読み込む
require 'vendor/autoload.php';

$parsedown =  new Parsedown();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $html = $parsedown->text($content); // MarkdownをHTMLに変換

    // 処理結果を出力
    echo $html;
}

?>
