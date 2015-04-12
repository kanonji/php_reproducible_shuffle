<?php
namespace kanonji;

class ReproducibleShuffle{
    public static function shuffle($ary, $seed){
        mt_srand($seed);

        $random_picked;
        $shuffled = array_fill(0, count($ary), null);
        foreach($ary as $i => $v){
            $random_picked = mt_rand(0, $i);
            $shuffled[$i] = $shuffled[$random_picked];
            $shuffled[$random_picked] = $v;
        }
        return $shuffled;
    }
}

function reproducible_shuffle($ary, $seed){
    return ReproducibleShuffle::shuffle($ary, $seed);
}
