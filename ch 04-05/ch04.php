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
//declare(strict_types=1);// strict 모드 타입 체크모드

$example3 =new ExamClass4(id: $id, name: $name, nickname:$nickname);
$example3->say();

//readonly 속성 -> 한번만 초기화 가능
class ExamClass5{
    public readonly string $str;
    public function say(string $str){
        $this->str = $str;
        echo $this->str."<br>";
    }
}

$str = "안녕하세요";
$example4= new ExamClass5();
$example4->say(str: "안녕하세요 안쪽"); // 정상 대입 및 정상 실행
//$example4->say(str: "안녕하세요 안쪽2"); // 오류 발생

interface Animal{
    public function animal_type($type);//인터페이스의 메서드는 내부에 작동하는 것이 있지는 않다.
}
//인터페이스 예제

interface WebApp{
    public function register($id, $password, $name);
    public function login($id, $password);
    public function logout($id);
}

interface CMS{
    public function post($subject);
}

class WebSite implements WebApp, CMS
{
    public function register($id, $password, $name){
        echo "사용자 등록 : 아이디={$id}, 이름={$name} <br>";
    }
    public function login($id, $password){
        echo "로그인 : {$id}<br>";
    }
    public function logout($id){
        echo "로그아웃: {$id}<br>";
    }
    public function post($subject){
        echo "게시물 등록 : {$subject}<br>";
    }

}

$website = new WebSite;
$id = 'hong';
$password =1234;
$name = '홍길동';
$subject = '게시물 제목';

$website->register(id: $id, password:$password, name: $name);
$website->login(id: $id, password: $password);
$website->post(subject:$subject);
$website->logout(id: $id);

//추상 클래스
abstract class CellPhones
{
    public string $type;
    public string $name;
    public int $year;
    public function describe(){
        echo "{$this->type}의 이름은 {$this->name}입니다. {$this->year}에 출시되었습니다.<br>";
    }

    abstract public function greet();
}

class Samsumg extends CellPhones{
    public function greet(){
        echo "지니야 안녕.<br>";
    }
}

$phone1 = new Samsumg();
$phone1->type="폴더블";
$phone1->name="z플립";
$phone1->year= "2021";

$phone1->describe();
$phone1->greet();


trait Dog{
    public string $type;
    public string $name;
    public int $age;

    public function describe(){
        echo "{$this->type}의 이름은 {$this->name}입니다. {$this->age}살 입니다.<br>";
    }
}

trait Say2{
    abstract public function greet();
}

class Animal2{
    use Dog, Say2;

    public function greet(){
        echo "멍멍~ 안녕하세요.<br>";
    }
}

$animal2 = new Animal2();
$animal2->type = "강아지";
$animal2->name = "담이";
$animal2->age = 6;

$animal2->describe();
$animal2->greet();

//정적 메서드
class MyClass2{
    public static $message = "Hello World<br>";

    public static function say(){
        return self::$message;
    }
}

echo MyClass2::say();

//늦은 정적 바인딩
class A1{
    public static function myFunc()
    {
        static::say();
    }
    public static function say(){
        echo "부모 클래스 호출<br>";
    }
}

class B extends A1{
    public static function test(){
        A1::myFunc();
        parent::myFunc();
        self::myFunc();
    }

    public static function say(){
        echo "자식 클래스 호출<br>";
    }

}

B::test();

// //네임스페이스(namespace) use 그룹화
// //구버전

// use AnswerBook\User as User;
// use AnswerBook\PHP\User as PhpUser;
// use AnswerBook\Python\User as PythonUser;

// //php 8버전

// use AnswerBook\{
//     User as User,
//     PHP\User as PhpUser,
//     Python\User as PythonUser
// };

//예외처리 1 Exception 클래스
$msg2 = "예외 클래스 오류 발생";
$code = 123;
$e = new Exception($msg2, $code);

echo "예외 코드 : ".$e->getCode();
echo "<br>";
echo "예외 메시지 : ".$e->getMessage();


//사용자 정의 예외 처리 구문
class MyException extends Exception{
    public function myMessage($my_msg){
        return $my_msg;
    }
}

$e2 = new MyException($msg2, $code);

echo $e2->myMessage("Exception 클래스를 상속 받았습니다.");
echo "<br>";
echo "예외 메시지 : ".$e->getMessage();
echo "<br>";
echo "예외 코드 : ".$e->getCode();

// //throw 키워드 
// //구버전
// if($t==1){
//     echo $t;
// }else{
//     throw new Exception();
// }

// //php 8버전
// if($t==1||throw new Exception('틀렸습니다.')){
//     echo $t;
// }

class MyException1 extends Exception{}
class MyException2 extends Exception{}
class MyException3 extends Exception{}

$num = 2;
try{
    if ($num ==1) {throw new MyException1('숫자는 1입니다.');}
    if ($num ==2) {throw new MyException2('숫자는 2입니다.<br>');}
    if ($num ==3) {throw new MyException3('숫자는 3입니다.');}
}catch(MyException1 $e){
    echo "예외 메시지 : ".$e->getMessage();
}catch(MyException2 $e){
    echo "예외 메시지 :".$e->getMessage();
}catch(MyException3 $e){
    echo "예외 메시지 : ".$e->getMessage();
}