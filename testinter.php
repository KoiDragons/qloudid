<?php $a1 = array(2,4,8,11,12,13,14,15,16,17,18,19,20);

$a2 = array(3,20);

$intersect_times = array();
$in_array_times = array();
for($j = 0; $j < 10; $j++)
{
    /***** TEST ONE array_intersect *******/
    $t = microtime(true);
    for($i = 0; $i < 100000; $i++)
    {
        $x = array_intersect($a1,$a2);
        $x = empty($x);
    }
    $intersect_times[] = microtime(true) - $t;


    /***** TEST TWO in_array *******/
    $t2 = microtime(true);
    for($i = 0; $i < 100000; $i++)
    {
        $x = false;
        foreach($a2 as $v){
            if(in_array($v,$a1))
            {
                $x = true;
                break;
            }
        }
    }
    $in_array_times[] = microtime(true) - $t2;
}

echo '<hr><br>'.implode('<br>',$intersect_times).'<br>array_intersect avg: '.(array_sum($intersect_times) / count($intersect_times));
?>