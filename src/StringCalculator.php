<?php


namespace KATA;

/**
 * Class StringCalculator
 */
class StringCalculator
{

    /**
     * @param $numbers
     *
     * @return int|string
     * @throws \Exception
     */
    public function add($numbers)
    {

        if (is_array($numbers)) {
            throw new \Exception('Invalid format');
        }

        if (is_null($numbers)) {
            throw new \Exception('Invalid format');
        }

        $exploded = explode(',', $numbers);

        $sum = 0;

        if (sizeof($exploded) == 0 || empty($exploded)) {
            throw new \Exception('Invalid format');
        }

        foreach ($exploded as $key => $number) {

            if (is_null($number) && sizeof($exploded) - 1 == 1) {
                throw new \Exception('Invalid format');
            }


            $explodedForReturnArray = explode("\n", $number);

            foreach ($explodedForReturnArray as $keyExploded => $numberExplodedForReturn) {

                switch (true) {

                    case is_null($numberExplodedForReturn) : {

                        if ($key == sizeof($exploded) - 1) {
                            return $sum;
                        }

                        throw new \Exception('Invalid format');
                        break;
                    }

                    case $numberExplodedForReturn == "" : {

                        if ($key == sizeof($exploded) - 1) {
                            return $sum;
                        }

                        throw new \Exception('Invalid format');
                        break;
                    }

                    case is_numeric($numberExplodedForReturn) : {
                        $sum = $sum + (int)$numberExplodedForReturn;
                        break;

                    }

                    default: {
                        throw new \Exception('Invalid format');
                        break;

                    }

                }

            }
        }

        return $sum;

    }

}
