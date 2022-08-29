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

