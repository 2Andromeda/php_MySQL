<?php
$filename = $_GET["file"];//파일명
$filepath = $_SERVER['DOCUMENT_ROOT']."/ch 06-08/uploads/".$filename;//서버 경로

//파일 존재 확인
if(!is_file($filepath) || !file_exists($filepath)){
    echo "파일이 존재하지 않습니다.";
    exit;
}

//브라우저 체크
if(preg_match("msie/i", $_SERVER["HTTP_USER_AGENT"]) && preg_match("/5\.5/", $_SERVER["HTTP_USER_AGENT"])){
    header("content-type: doesn/matter");
    header("content-length: ".filesize("$filepath"));
    header("content-disposition: attachment; filename=\"$filename\"");//다운로드 되는 파일명
    header("content-transfer-encoding: binary");
}else{
    header("Content-Type: file/unknown");
    header("Content-Length: ".filesize("$filepath"));
    header("Content-Disposition: attachment; filename=\"$filename\"");//다운로드 되는 파일명
    header("Content-Description: php generated data");
}

header("pragma: no-chche");
header("expires: 0");

$fp= fopen($filepath, 'rb');//rb = 읽기 전용, 바이너리 타입

while(!feof($fp)){//파일 포인터를 읽어 들인 위치가 끝인지 아닌지 오픈->테스트->닫기, 포인터가 끝이면 true 아니면 false
    echo fread($fp, 100*1024);//100*1024 크기만큼 $fp의 내용을 읽어 들인다.
}
fclose($fp);//닫는다.