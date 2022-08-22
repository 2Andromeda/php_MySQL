<?php
class Grammer
{
    public $name = "그누위즈12위";

    public function phpStudy($year)
    {
        echo "변수 name은 {$this->name} 입니다.<br/>";
        echo "변수 year은 {$year} 입니다. <br/>";
        echo $this->name . $year . "<br/>";
    }
   
}

$year =2022;//변수 선언
$grammer = new Grammer();
$grammer->phpStudy($year);
$name=""; //빈 변수 선언
echo $year; //변수 부르는 행위(참조)
echo "중괄호 사용법 {$year}<br>";
echo "문자 결합 연산자 ".$year."<br>";
echo '일반 따옴표는? {$year} 이렇게 안된다.<br>';

$var="message";
$$var = "hello world";//가변 변수 $var의 변수 값이 helloworld의 변수 명이 된다.
echo $message."t<br>";

//php는 전역변수도 함수내에서 접근이 불가능 하다. 만약 접근 하려면 아래처럼 global을 적용하여야 한다.
function myFunc(){
    global $year;
    echo "<p>전역 변수 year의 값은 : {$year}</p><br>";
    echo "<p>전역 변수 접근하는 방법 2번째 : {$GLOBALS['message']}</p><br>";
}
myFunc();

function myFunc1(){
    static $x = 0;//정적 변수
    echo "<p>변수 x의 값은 : {$x}</p>";
    $x++;
}
myFunc1();
myFunc1();

define("Constant_Bool", true);//상수 정의 방법1
define("Constant_Int", 2);
const other_Const = "또 다른 상수 정의";//상수 정의 방법 2
echo Constant_Int;
echo other_Const;

class MyClass
{
    public const ClasConst = "클래스 안의 변수";//다만 함수내에서는 const 방법으로 상수 정의 불가
}

echo MyClass::ClasConst;

//매직 상수
class A{
    public function _construct(){
        echo __CLASS__;
    }
    public function sayHello(){
        return __METHOD__;
    }
}
$say = new A();
echo "<br>".$say->sayHello();
echo $say->_construct();
echo "<br>".PHP_INT_MAX;

//기본적인 배열 정의 방법
$array1 = array("사과", 5, "바나나", "지니", 3.14);
$array2 = ["사과", 5, "지니", 3.14];
print_r($array1);
echo $array1[0];

//연관 배열 선언 방법
$array3=[
    "key1"=>"사과",
    "지니"=>"love",
    "지니야"=>"응",
    5
];

echo "<br>".$array3["key1"];
print_r($array3);

var_dump($grammer);//변수 정보 확인하는 함수

$age = 15;
$myAge = $age ? : 18;
echo $myAge;