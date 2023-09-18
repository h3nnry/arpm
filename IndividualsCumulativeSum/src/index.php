<?php

declare(strict_types=1);

class IndividualsCumulativeSum
{
    /** int[] */
    private array $individualsWeeksMatrix = [];

    public function __construct(
        #[Positive]
        private int $individualsNumber = 20,
        #[Positive]
        private int $weeksNumber = 52,
        #[Positive]
        private int $until = 2,
    )
    {
        if ($this->until > $this->weeksNumber) {
            throw new InvalidArgumentException('Until must be smaller than weeksNumber!');
        }
    }

    private function generateMatrix(): void
    {
        for ($i = 1; $i <= $this->individualsNumber; $i++) {
            for ($j = 1; $j <= $this->weeksNumber; $j++) {
                $this->individualsWeeksMatrix[$i][$j] = rand(1, 100);
            }
        }
    }

    public function getIndividualsCumulativeSum(): array
    {
        $this->generateMatrix();

        $individualsCumulativeSum = [];

        for ($i = 1; $i <= $this->individualsNumber; $i++) {
            $total = 0;
            for ($j = 1; $j <= $this->until; $j++) {
                $total += $this->individualsWeeksMatrix[$i][$j];
            }
            $individualsCumulativeSum[$i] = $total;
        }

        return $individualsCumulativeSum;

    }
}


$individualsCumulativeSum = new IndividualsCumulativeSum();

print_r($individualsCumulativeSum->getIndividualsCumulativeSum());

