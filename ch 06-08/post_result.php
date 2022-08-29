<?php
$name = $_POST["name"];
$id = $_POST["id"];
?>

<html>
    <head>
        <title>포스트 결과</title>
</head>
<body>
    <h1>포스트 예시</h1>
    <?php echo $name."님의 아이디는 ".$id."입니다.<br>"?>
</body>
</html>