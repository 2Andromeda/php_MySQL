<?php

echo floor (num: 11.94)."<br>";
echo ceil (num: 11.94)."<br>";
echo round(num : 11.94)."<br>";

//round(int|float $num, int $precision = 0, int $mode =PHP_ROUND_HALF_UP):float
/*모드 별 값
PHP_ROUND_HALF_UP : 0.5 를 올림
PHP_ROUND_HALF_DOWN : 0.5 를 내림
PHP_ROUND_HALF_EVEN : 짝수 값까지 올림합니다.
PHP_ROUND_HALF_ODD : 홀수 값까지 올림합니다.*/


$num = 2022.0829;

echo number_format(num: $num)."<br>";
echo number_format(num: $num, decimals: 3)."<br>";
echo number_format(num: $num, decimals: 4, decimal_separator: "#", thousands_separator: "!")."<br>";

echo base_convert("10", 10, 3)."<br>";//2~36진법

echo rand()."<br>";
echo getrandmax()."<br>";
srand();//난수 초기화 함수

$strmerge = [
    'www',
    'naver',
    'com'
];
echo implode($strmerge)."<br>";
echo implode('.', $strmerge)."<br>";
echo join($strmerge)."<br>";
echo join('#', $strmerge)."<br>";
$strmergered = implode('.', $strmerge);

$exploded = explode('.', $strmergered, 2);
var_dump($exploded);
echo "<br>";

echo substr($strmergered, 3, 5)."<br>";
echo strstr($strmergered, '.')."<br>";
echo strpos($strmergered, 'n')."<br>";
/*문자열에 특정 문자열이 
포함되는지 : str_containes
시작부분에 포함되는지 : str_starts_with
끝 부분에 포함되는지 : str_ends_with*/

echo mktime(23)."<br>";
echo microtime(true)."<br>";
echo time()."<br>";
$time = time();
echo date("T r").date(" e")."<br>";
echo date(format: "Y-m-d H:i:s T", timestamp: $time)."<br>";
$datetime = new DateTime(datetime: '2022-02-08 09:10:29');
echo $datetime -> format(format: "Y-m-d H:i:s T")."<br>";

$datetime2 = new Datetime();
$date_diff = $datetime->diff($datetime2);
echo $date_diff->m."<br>";

$fruits = [
    'apple' => '사과',
    'banana' => '바나나',
    'strawberry' => '딸기',
    '메롱' => '사과'
];

echo array_key_exists('banana', $fruits)."<br>"; //배열 키 검색
echo in_array('사과', $fruits)."<br>"; // 배열 내용 검색
echo array_search('사과', $fruits)."<br>"; // 배열의 내용중 일치하는 키(1개)를 리턴
var_dump(array_keys($fruits)); // 배열의 내용 중 일치하는 키(모두)를 리턴
echo "<pre>";
print_r(array_values($fruits));
echo "</pre>";

$languagues= [
    'PHP', 'MySQL', 'HTML', 'CSS', 'Javascript'
];
$filter = array_filter(array: $languagues, callback: function($val){
    if(strlen($val) <= 4){
        return true;
    }
    else{
        return false;
    }
});

echo "<pre>";
print_r($filter);
echo "</pre>";

$map = array_map(callback: function($val){
    $upper_string = strtoupper($val);
    return  $upper_string;
}, array: $languagues);
echo "<pre>";
print_r($map);
echo "</pre>";

$reduce = array_reduce(array: $languagues, callback: function($carry, $item){
    $len = strlen($item);
    $result = $carry + $len;
    return $result;
}, initial : 0);
echo "<pre>";
print_r($reduce);
echo "</pre>";

$fruits1=[
    'apple'=>'사과',
    'banana'=>'바나나',
    'strawberry'=>'딸기',
    'grape'=>'포도',
    'watermelon'=>'수박',
    'kiwi'=>'키위',
    'mango'=>'망고',
    'cherry'=>'앵두',
    'peach'=>'복숭아'
];
$vegetables=[
    'celery'=>'샐러리',
    'cucumber'=>'오이',
    'carrot'=>'당근',
    'pepper'=>'후추',
    'garlic'=>'마늘',
    'ginger'=>'생강',
    'watermelon'=>'수박',
    'tomato'=>'토마토',
    'strawberry'=>'딸기'
];

$merge = array_merge($fruits1, $vegetables);
echo "<pre>";
print_r($merge);
echo "</pre>";

$intersec = array_intersect($fruits1, $vegetables);
echo "<pre>";
print_r($intersec);
echo "</pre>";

//배열 정렬
/*
sort ->값으로 정렬, 키 보존 안됨
ksort ->키로 정렬, 키 보존
asort ->값으로 정렬, 키 보존
*/


//디렉터리 관련 함수
//opendir, readdir, closedir, scandir, fnmatch, glob
var_dump(scandir('.'));
echo "<br>";
print_r(glob(pattern: "ch*"));

//파일 관련 함수
//is_dir, is_file, file_exist, fopen, fclose, fgetc, fgets, fread, fwrite,
//file_get_contents, file_put_contents, filesize, basename, dirname
echo is_dir("test")."<br>"; //디렉터리의 유무
echo is_file("ch04.php")."<br>"; //파일의 유무
echo file_exists("test")."<br>"; // 파일 또는 디렉터리의 유무
//rewind 열려있는 파일 내의 포인터 위치를 처음으로 되돌림

//네트워크 관련 함수

$curl = curl_init();
curl_setopt($curl, option: CURLOPT_URL, value:'https://www.naver.com');
$content = curl_exec($curl);
curl_close($curl);

echo $content;

echo "테스트<br>";
$domain = 'www.naver.com';
$ip=gethostbyname($domain);
echo $ip."<br>";
echo gethostbyname('www.naver.com')."<br>";
echo gethostbyname('https://www.naver.com')."<br>";
echo ip2long($ip)."<br>";

echo get_debug_type($curl)."<br>";