<?php
session_start();//세션 사용 시작
$_SESSION['city']="부산";
$_SESSION['gu']='해운대구';

echo "제가 살고 있는 도시는".$_SESSION['city']."입니다.<br>";
// unset($_SESSION['city']); // city 세션 등록 해지
// session_unset(); // 모든 세션 변수 등록 해지
// session_destroy(); //세션 아이디 삭제

//setcookie(쿠키명, 쿠키값, 만료시간, 경로, 도메인, 보안, httponly)
setcookie('mycookie', '홍길동', time()+3600);
$_COOKIE['mycookie'] = "임꺽정";
echo $_COOKIE['mycookie'];

// unset($_COOKIE['mycookie']);
// setcookie('mycookie', '', time() -1);// time-1이 되면 사라짐(-100도 사라짐)

?>
<html>
<head>
    <title>세션 만들기</title>
</head>
<body>
    <h1>Session 만들기</h1>
    세션 내용은 <a href="./result_session.php">여기로</a>!!!
</body>
</html>

