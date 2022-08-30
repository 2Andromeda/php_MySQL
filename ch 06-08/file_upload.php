<?php
$uploads_dir = "./uploads";
$allowed_ext = array("jpg", "jpeg", "png", "gif");

if(!is_dir($uploads_dir)){
    if(!mkdir($uploads_dir, 0777)){ //mkdir -> 디렉토리 생성 077=8진수표현을 위해 0을 추가함
        die("업로드 디렉터리 생성에 실패 했습니다.");//die-> 메시지를 출력하고 현재 스크립트 종료
    }
}

if(!isset($_FILES["myfile"])){
    die("업로드된 파일이 있습니다.");
}

$error = $_FILES["myfile"]["error"];
$name = $_FILES["myfile"]["name"];

$result=match($error){
    UPLOAD_ERR_OK=>"업로드 정상 완료 ($error)",
    UPLOAD_ERR_INI_SIZE =>"php.ini에 설정된 최대 파일크기 초과 ($error)",
    UPLOAD_ERR_FORM_SIZE => "HTML 폼에 설정된 최대 파일크기 초과 ($error)",
    UPLOAD_ERR_PARTIAL => "파일의 일부만 업로드됨 ($error)",
    UPLOAD_ERR_NO_FILE => "업로드할 파일이 없음 ($error)",
    UPLOAD_ERR_NO_TMP_DIR => "웹서버에 임시폴더가 없음 ($error)",
    UPLOAD_ERR_CANT_WRITE => "웹서버에 파일을 쓸 수 없음 ($error)",
    UPLOAD_ERR_EXTENSION => "PHP 확장기능에 의한 업로드 중단 ($error)"
};

if($error != UPLOAD_ERR_OK){
    echo $result;
    exit;
}

$upload_file = $uploads_dir.'/'.$name;
$fileinfo=pathinfo($upload_file);
$ext = strtolower($fileinfo["extension"]);

$i =1;

while(is_file($upload_file)){
    $name = $fileinfo["filename"]."-{$i}.".$fileinfo["extension"];
    $upload_file = $uploads_dir.'/'.$name;
    $i++;
}

if(!in_array($ext, $allowed_ext)){//배열안에 값이 존재 하는지 확인
    echo "허용되지 않는 확장자입니다.";
    exit;
}

if(!move_uploaded_file($_FILES["myfile"]["tmp_name"], $upload_file)){//move_uploded_file 서버로 전송된 파일 저장
    echo "파일이 업로드 되지 않았습니다.";
    exit;
}
?>

<html>
    <head>
        <title>파일 업로드</title>
</head>
<body>
    <h1>파일 업로드 예제</h1>
    <h2>파일 정보</h2>
    <ul>
        <li>결과: <?php echo $result; ?></li>
        <li>파일명: <?php echo $name; ?></li>
        <li>확장자: <?php echo $ext; ?></li>
        <li>파일형식: <?php echo $_FILES["myfile"]["type"]; ?></li>
        <li>파일크기: <?php echo number_format($_FILES["myfile"]["size"]); ?>바이트</li>
    </ul>
    <a href="./file_download.php?file=<?php echo $name; ?>">다운로드</a>
</body>
</html>
        