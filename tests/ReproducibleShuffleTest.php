<?php
namespace kanonji\tests;

use kanonji\ReproducibleShuffle;

class ReproducibleShuffleTest extends \PHPUnit_Framework_TestCase{

    public function setup(){
        $this->ary = [1,2,3,4,5];
    }

    public function test_shuffle_with_seed_1(){
        $seed = 1;
        $expected = [2,1,3,4,5];

        $result = ReproducibleShuffle::shuffle($this->ary, $seed);
        $this->assertEquals($expected, $result);

        $result = \kanonji\reproducible_shuffle($this->ary, $seed);
        $this->assertEquals($expected, $result);
    }

    public function test_shuffle_with_seed_2(){
        $seed = 2;
        $expected = [1,2,5,4,3];

        $result = ReproducibleShuffle::shuffle($this->ary, $seed);
        $this->assertEquals($expected, $result);

        $result = \kanonji\reproducible_shuffle($this->ary, $seed);
        $this->assertEquals($expected, $result);
    }

    public function test_shuffle_with_seed_3(){
        $seed = 3;
        $expected = [4,5,3,1,2];

        $result = ReproducibleShuffle::shuffle($this->ary, $seed);
        $this->assertEquals($expected, $result);

        $result = \kanonji\reproducible_shuffle($this->ary, $seed);
        $this->assertEquals($expected, $result);
    }

    public function test_equal_shuffled_array_with_same_seed(){
        $this->ary = range(5, 15);
        shuffle($this->ary);
        $seed = 5;

        $result1 = ReproducibleShuffle::shuffle($this->ary, $seed);
        $result2 = ReproducibleShuffle::shuffle($this->ary, $seed);
        $this->assertEquals($result1, $result2);

        $result1 = \kanonji\reproducible_shuffle($this->ary, $seed);
        $result2 = \kanonji\reproducible_shuffle($this->ary, $seed);
        $this->assertEquals($result1, $result2);
    }
}
