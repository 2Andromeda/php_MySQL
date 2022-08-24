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
$myAge = $age ? : 18;//삼항 연산자 축약형
// $myAge = $age ? 15:18; //삼항 연산자
echo $myAge;

$str1 = "안녕하세요";
$str2= "PHP";
$result1 = $str1 ?? $str2; //NULL 병합 연산자, str1이 null이 아닌경우 str1을 대입하고 null이면 str2를 대입

$str3 = $str1.$str2; //문자열 연결 연산자
$str1 .= $str2; //문자열 추가 연산자 str1에 str1+str2로 변경 대입

$result3 = $grammer instanceof Grammer;
echo "<br>".$result3;

//스위치 문 연습
$score =90;
switch($score){
    case 100:
        echo "점수는 100점 입니다.";
        break;
    case 90:
        echo "점수는 90점 입니다.";
        break;
    default:
        echo "점수는 70점 입니다.";
        break;
}

//match 표현식으로 할시, match는 === 연산자로 적용 (형태도 확인함)
$message = match($score){
    100,
    90 => "찾을 수 없음.",
    80 => "80점입니다.",
    70, 60, "55" => "D학점 입니다.",
    default => "과락 이하입니다."
};
echo "<br>".$message;

//php 는 다른 언어의 배열에 대한 for문과 달리 foreach를 사용
$fruits = [
    "apple" => "사과",
    "strawberry" => "딸기",
    "banana" => "바나나"
];
echo "<br>값만 사용 :";
foreach ($fruits as $fruit){
    echo "{$fruit}<br>";
}

echo "키와 값 모두를 사용<br>";
foreach ($fruits as $eng => $kor){
    echo "{$eng} => {$kor}<br>";
}

//goto문 연습
goto jump;

echo "이건 점프 됩니다.";

jump:
echo "여기는 인쇄 됩니다.<br>";

//함수 파트
function sayHello2($string){
    echo "{$string}<br>";
}
sayHello2("안녕하세요");

//가변 길이 인수 인식 하기(스플랫(...))
function sum(...$numbers){
    $acc = 0;
    foreach($numbers as $n){
        $acc += $n;
    }
    return $acc;
}

echo sum(1,2,3,4);

//데이터 유형 미리 지정
function myFunc2(
    string $str,
    int $int,
    float $float,
    mixed $mixed, // 혼합형 (php 8)
    object $object,
    string|int|float $confused //유니언형(php 8)
){
    return;
}

//함수의 반황 유형 미리 설정
function myFunc3(mixed $number3) : int|string//(php 8 부터 가능)
{
    return $number3;
}
echo "<br>".myFunc3(1.1);

//명명된 매개변수 방법
function myFunc4($names, $nums){
    echo "저의 이름은 {$names}입니다. 나이는 {$nums}살 입니다.<br>";
}

myFunc4(nums: 20, names: "홍길동");//매개변수 입력 순서가 바뀌어도 아무 문제 없음.

//익명함수(람다함수, 일급 함수)
$lambda = function($names1){
    return $names1;
};

echo $lambda("홍길동")."<br>";

//화살표 함수 형식
$lambda2 =fn()=>"홍길동";
echo $lambda2();

class Member{
    var $id = 'hong';
    public $name = '홍길동';
    protected $nickname = '쾌도 홍길동';
    private $age = 20;

    function say(string|int $string5, $number5) : mixed
    {
        $array = array($string5, $number5);
        return $array;
    }
}

$member = new Member();
echo $member->id;
echo $member->name;
// echo $member->nickname;
// echo $member->age."<br>";

$result = $member->say(string5: 'Hello World', number5: 1);
print_r($result);

class FruitClass{
    public $name;
    public $color;

    function set_fruit(string $name, string $color){
        $this->name = $name;//public $name에다가 string $name을 대입
        $this->color = $color;
    }

    function get_fruit() :string
    {
        $string = "이 과일은 {$this->name} 입니다. 색깔은 {$this->color} 입니다.";
        return $string;
    }
}

$apple = new FruitClass();
$apple->set_fruit(name: '사과', color: '빨강');
echo $apple->get_fruit()."<br>";

class ExamClass{
    protected $name;

    public function __construct(){
        $this->name="홍길동";
        echo $this->name;
    }
}
new ExamClass();

class ExamClass2{
    public string $id;
    public string $name;
    public mixed $nickname;

    public function __construct(string $id, string $name, mixed $nickname){
        $this->id = $id;
        $this->name = $name;
        $this->nickname = $nickname;
    }
}

$id = "home"; $name = "홍길동"; $nickname="쾌도 홍길동";
$example = new ExamClass2(id: $id, name: $name, nickname:$nickname);
echo $example->id;

//php 8버전
class ExamClass3{
    public function __construct(
        public string $id,
        public string $name,
        public mixed $nickname
    ) {}

    //소멸자
    function __destruct(){
        echo "클래스가 소멸됩니다.<br>";
    }
}

$example2 = new ExamClass3(id: $id, name: $name, nickname:$nickname);
echo "<br>".$example2->name."<br>";

class ExamClass4 extends ExamClass3{
    function say(){
        echo "안녕하세요";
    }
}

$example3 =new ExamClass4(id: $id, name: $name, nickname:$nickname);
$example3->say();