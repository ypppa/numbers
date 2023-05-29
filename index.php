<?php

class Calculator
{
    private string $taskName;
    private string $separator;
    private array $modifiers;

    public function __construct(string $taskName, string $separator, array $modifiers)
    {
        $this->taskName = $taskName;
        $this->separator = $separator;
        $this->modifiers = $modifiers;
    }

    public function execute(int $start, int $end): void
    {
        print "$this->taskName\n";
        for ($i = $start; $i <= $end; $i++) {
            if ($i > 1) {
                print $this->separator;
            }
            foreach ($this->modifiers as $f) {
                print $f($i);
            }
        }
        print "\n";
    }
}

function task1()
{
    $modifiers = [
        function ($i) {
            if ($i % 3 !== 0 && $i % 5 !== 0) {
                return $i;
            }

            return '';
        },
        function ($i) {
            if ($i % 3 === 0) {
                return 'pa';
            }

            return '';
        },
        function ($i) {
            if ($i % 5 === 0) {
                return 'pow';
            }

            return '';
        },
    ];
    $calc = new Calculator('Task v1:', ' ', $modifiers);

    $calc->execute(1, 20);
}

function task2()
{
    $modifiers = [
        function ($i) {
            if ($i % 2 !== 0 && $i % 7 !== 0) {
                return $i;
            }

            return '';
        },
        function ($i) {
            if ($i % 2 === 0) {
                return 'hatee';
            }

            return '';
        },
        function ($i) {
            if ($i % 7 === 0) {
                return 'ho';
            }

            return '';
        },
    ];
    $calc = new Calculator('Task v2:', '-', $modifiers);

    $calc->execute(1, 15);
}

function task3()
{
    $modifiers = [
        function ($i) {
            switch (true) {
                case in_array($i, [1, 4]) :
                    $res = 'joff';
                    break;
                case $i === 9 :
                    $res = 'jofftchoff';
                    break;
                case $i > 5 :
                    $res = 'tchoff';
                    break;
                default:
                    $res = $i;
            }

            return $res;
        },
    ];
    $calc = new Calculator('Task v3:', '-', $modifiers);

    $calc->execute(1, 10);
}

task1();
task2();
task3();
