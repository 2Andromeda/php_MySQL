<?php
// $name = $_POST["name"];
// $id = $_POST["id"];
// $checkbox=$_POST["fruit"];
?>

<html>
    <head>
        <title>포스트 결과</title>
</head>
<body>
    <h1>포스트 예시</h1>
    <?php 
    if(isset($_POST["fruit"])){//배열에 값이 있으면 출력
        echo "선택한 과일은 <br>";
        for($i=0; $i<count($_POST["fruit"]); $i++){
            $fruit = $_POST["fruit"][$i];
            echo $fruit."<br>";
        }
        echo "입니다.<br>";
    }else{}
    ?>
    <?php 
    if(isset($_POST["name"])){
        echo $name."님의 아이디는 ";}
    else{
    }
    if(isset($_POST["id"])){
        $id."입니다.<br>";
    }else{}
    ?>
</body>
</html>