<?php
namespace tonisormisson\adventofcode2022\commands;

use yii\helpers\Console;

class AController extends BaseAdventController
{

    public function actionIndex()
    {
        $allSums = $this->doElfSums();
        $this->stdout("Highest value is " . current($allSums) . PHP_EOL, Console::FG_GREEN);
        $sumTop3 = $this->getTopSum($allSums, 3);
        $this->stdout("Sum of top 3 is " . $sumTop3 . PHP_EOL, Console::FG_GREEN);
    }


    private function getTopSum($array, int $nTop) : int
    {
        $i = 0;
        $sum = 0;
        foreach ($array as $value) {
            if($i >= $nTop) {
                return $sum;
            }
            $this->stdout("add. $value" . PHP_EOL);
            $sum+= $value;
            $i++;
        }
        return $sum;

    }

    private function doElfSums() : array
    {
        $file = fopen(\Yii::getAlias('@input/1.txt'), 'r');
        $elfSum = 0;
        $i=0;
        $maxSum = 0;
        $all = [];
        while (($line = fgets($file)) !== false) {
            $line = trim($line);

            if(empty($line)) {
                // next elf
                $i++;
                $all[$i] = $elfSum;
                if($elfSum > $maxSum) {
                    $maxSum = $elfSum;
                    $this->stdout("new maximum is $maxSum carried by elf nr $i" . PHP_EOL );
                }
                $elfSum = 0;
            } else {
                $elfSum += intval($line);
            }
        }

        fclose($file);
        // sort vy value highest first
        rsort($all);
        return $all;
    }

}