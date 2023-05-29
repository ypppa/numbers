<?php

class Calculator
{
    private ModifyStrategyInterface $strategy;

    public function __construct(ModifyStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function make(int $start, int $end)
    {
        print $this->strategy->getName() . "\n";
        for ($i = $start; $i <= $end; $i++) {
            if ($i > $start) {
                print $this->strategy->getSeparator();
            }
            print $this->strategy->handle($i);
        }
        print "\n";
    }
}

interface ModifyStrategyInterface
{
    public function handle(int $i);

    public function getName(): string;

    public function getSeparator(): string;
}

abstract class AbstractStrategy implements ModifyStrategyInterface
{
    protected string $name;
    protected string $separator;

    abstract public function handle(int $i): string;

    public function getName(): string
    {
        return $this->name;
    }

    public function getSeparator(): string
    {
        return $this->separator;
    }
}

class Strategy1 extends AbstractStrategy
{
    protected string $name = 'Task v1:';
    protected string $separator = ' ';

    public function handle(int $i): string
    {
        switch (true) {
            case ($i % 3 === 0 && $i % 5 === 0):
                return 'papow';
            case ($i % 3 === 0):
                return 'pa';
            case ($i % 5 === 0):
                return 'pow';
            default:
                return $i;
        }
    }
}

class Strategy2 extends AbstractStrategy
{
    protected string $name = 'Task v2:';
    protected string $separator = '-';

    public function handle(int $i): string
    {
        switch (true) {
            case ($i % 2 === 0 && $i % 7 === 0):
                return 'hateeho';
            case ($i % 2 === 0):
                return 'hatee';
            case ($i % 7 === 0):
                return 'ho';
            default:
                return $i;
        }
    }
}

class Strategy3 extends AbstractStrategy
{
    protected string $name = 'Task v3:';
    protected string $separator = '-';

    public function handle(int $i): string
    {
        switch (true) {
            case in_array($i, [1, 4]) :
                return 'joff';
            case $i === 9 :
                return 'jofftchoff';
            case $i > 5 :
                return 'tchoff';
            default:
                return $i;
        }
    }
}

$calc1 = new Calculator(new Strategy1);
$calc2 = new Calculator(new Strategy2);
$calc3 = new Calculator(new Strategy3);

$calc1->make(1, 20);
$calc2->make(1, 15);
$calc3->make(1, 10);
