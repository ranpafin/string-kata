<?php

namespace KATA\tests;

use KATA\StringCalculator;

/**
 * Class StringCalculator
 */
class IntegrationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @dataProvider provider_for_add
     */
    public function add_will_return_the_sum_of_the_string($string, $expectedSum)
    {
        $stringCalculator = new StringCalculator();

        $this->assertEquals($expectedSum, $stringCalculator->add($string));

    }

    /**
     * @test
     * @dataProvider provider_for_add_ko
     */
    public function add_will_throw_an_exception_if_the§_format_is_wrong($string)
    {
        $stringCalculator = new StringCalculator();

        $this->setExpectedException(\Exception::class);

        $stringCalculator->add($string);

    }

    public function provider_for_add()
    {

        return [
            ["1,2,3", 6],
            ["1\n2,3", 6],
            ["1", 1],
            ["1\n", 1],
            ["1,", 1],
            ["1\n2\n3,", 6],
        ];
    }

    public function provider_for_add_ko()
    {

        return [
            ["1,,"],
            ["1 2"],
            [null],
            ["1\n,2,3"],
            ["will_i_fail?"],
            [['1,2,3']],
        ];
    }


}