<?php
$mysql_host = "localhost";
$mysql_user ="root";
$mysql_password = "@vndanfshf2";
$mysql_db = "devduck";

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

//절차 지향 스타일
if(!$conn){
    die("연결 실패:".mysqli_connect_error());
}

//객체 지향 스타일
//$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

// if(!$conn->connect_error){
//     die("연결 실패:".$conn->connect_error);
// }


//PDO 확장 방식
// try{
//     $conn = new PDO("mysql:host=$mysql_host; dbname=$mysql_db", $mysql_user, $mysql_password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "연결 성공";
// }
// catch(PDOException $e){
//     echo "연결 실패: ".$e->getMessage();
// }

echo "연결 성공!<br>";

$sql = "SELECT * FROM movie_director";//mysql엣 실행할 SQL 문
$result = mysqli_query($conn, $sql); //결과값을 result 변수에 반환->mysqli result 객체가 저장됨
var_dump($result);
echo "<br>";
/*
$sql 이 
1. SELECT, SHOW, DESCRIBE 이면 각 테이블 및 데이터를 조회하는 mysql_result 객체 반환
2. INSERT, UPDATE, DELETE, DROP 문이면 데이터가 아닌 SQL문이 성공적으로 수행되었는지 참/거짓 여부 반환
*/

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result))//검색 항목을 반복문 이용해서 순서대로 출력
    {
        var_dump($row);
        echo "id: ".$row['id']." - name: ".$row['name']." - birthday: ".$row['birthday']."<br>";
    }
}else{
    echo "저장된 데이터가 없습니다.<br>";
}
/*
1. mysqli_fetch_assoc($result) -> 연관 배열 반환
2. mysqli_fetch_row($result) ->숫자 인덱스 배열 반환
3. mysqli_fetch_array($result) -> assoc과 row 모두 사용 가능
*/

$sql2 = "INSERT INTO movie_director (id, name, birthday) VALUES (8, '제임스 카메론', '1954-08-08');";
if(mysqli_query($conn, $sql2)){
    echo "새 레코드가 성공적으로 생성되었습니다. <br>";
}else{
    echo "생성 실패: ".mysqli_error($conn)."<br>";
}

mysqli_close($conn);

