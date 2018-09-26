<?php


namespace AutoPublicity\Task;


use AutoPublicity\Config\Config;
use LobiAPI\delion\LobiAPI;
use pocketmine\scheduler\Task;

class SendTask extends Task
{
    /* @var LobiAPI */
    private $lobiapi;

    public function __construct(LobiAPI $lobiAPI)
    {
        $this->lobiapi = $lobiAPI;
    }

    public function onRun(int $currentTick)
    {
        $this->lobiapi->MakeThread("c832ba0bfb0771777e1b489bb1cf84d6d77419fd", Config::getSendMessage());
    }
}