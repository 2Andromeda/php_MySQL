<?php
$name2 = "홍길동";
$id2 = "홍길동의 id";
?>
<html>
    <head>
        <title>POST 테스트</title>
</head>
<body>
    <h1>POST 예시</h1>
    <form action="./post_result.php" method="post">
        이름: <input type="text" name="name"><br>
        아이디: <input type="text" name="id"><br>
        <input type="submit" value="전송">
</form>
    <form action="./get_result.php" method="get">
        이름1 : <input type = "text" name="name1"><br>
        아이디1 : <input type = "text" name="id1"><br>
        <input type="submit" value="get 전송">

    <h1>두번째 get 전송 방식</h1>
    <a href="./get_result.php?name1=<?php echo $name2; ?>$id1=<?php echo $id2;?>">전송</a> 
</form>
</body>
</html>