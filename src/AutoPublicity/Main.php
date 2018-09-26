<?php


namespace AutoPublicity;


use AutoPublicity\Config\Config;
use AutoPublicity\Task\SendTask;
use LobiAPI\delion\LobiAPI;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    /* @var LobiAPI */
    private $lobiapi;
    /* @var Main */
    private static $instance;

    public function onLoad()
    {
        self::$instance = $this;
        $this->saveDefaultConfig();
    }

    public function onEnable()
    {
        $this->lobiapi = new LobiAPI();
        if ($this->lobiapi->Login(Config::getEmail(), Config::getPassword())) {
            $this->getLogger()->info("ログイン成功");
            $this->getScheduler()->scheduleRepeatingTask(new SendTask($this->lobiapi), 3600 * 20);
        } else {
            $this->getLogger()->alert("ログインに失敗しました。");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
    }

    /**
     * @return Main
     */
    public static function getInstance(): self
    {
        return self::$instance;
    }
}