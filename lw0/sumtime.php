<?php
function sumTime(string $fistTime, string $secondTime): string
{
    if (!strpbrk($fistTime, '1234567890:') or !strpbrk($secondTime, '1234567890:')) {
        return 'Incorrect input';
    }
    $result = ["", "", ""];
    $fistTime = explode(':', $fistTime);
    $secondTime = explode(':', $secondTime);
    if ($fistTime[2] + $secondTime[2] < 60) {
        $result[2] = $fistTime[2] + $secondTime[2];
    } else {
        $diff = $fistTime[2] + $secondTime[2] - 60;
        $result[2] = $diff;
        $fistTime[1] = $fistTime[1] + 1;
    }
    if ($fistTime[1] + $secondTime[1] < 60) {
        $result[1] = $fistTime[1] + $secondTime[1];
    } else {
        $diff = $fistTime[1] + $secondTime[1] - 60;
        $result[1] = $diff;
        $fistTime[0] = $fistTime[0] + 1;
    }
    if ($fistTime[0] + $secondTime[0] < 24) {
        $result[0] = $fistTime[0] + $secondTime[0];
    } else {
        $diff = $fistTime[0] + $secondTime[0] - 24;
        $result[0] = $diff;
    }
    foreach ($result as $key => $value) {
        if (count(str_split(strval($value))) == 1) {
            $result[$key] = "0" . strval($result[$key]);
        }
    }
    $result = implode(":", $result);
    var_dump($result);
    return $result;
}
?>