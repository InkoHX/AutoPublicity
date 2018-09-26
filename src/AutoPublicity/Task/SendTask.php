<?php


namespace AutoPublicity\Task;


use AutoPublicity\Config\Config;
use AutoPublicity\Main;
use LobiAPI\delion\LobiAPI;
use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;

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
        Main::getInstance()->getLogger()->alert("宣伝文の送信を開始");
        $this->lobiapi->MakeThread("514881fbce1d1866f468837df6d808e6fa8aa454", Config::getSendMessage());
        Main::getInstance()->getLogger()->info("送信が完了しました！");
        Main::getInstance()->getServer()->broadcastMessage(TextFormat::GREEN."[謝罪] 宣伝グループへ宣伝文を送信しました。ゲームのプレイに影響を与えてしまい申し訳ありません 開発者: InkoHX");
    }
}