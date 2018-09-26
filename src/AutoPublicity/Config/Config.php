<?php


namespace AutoPublicity\Config;


use AutoPublicity\Main;

class Config
{
    /**
     * @return array
     */
    public static function getAllData(): array
    {
        return Main::getInstance()->getConfig()->getAll();
    }

    /**
     * @return string
     */
    public static function getEmail(): string
    {
        return Main::getInstance()->getConfig()->get('email');
    }

    /**
     * @return string
     */
    public static function getPassword(): string
    {
        return Main::getInstance()->getConfig()->get('password');
    }

    /**
     * @return string
     */
    public static function getMessage(): string
    {
        return Main::getInstance()->getConfig()->get('message');
    }

    /**
     * @return string
     */
    public static function getInviteURL(): string
    {
        return Main::getInstance()->getConfig()->get('invite');
    }

    /**
     * @return string
     */
    public static function getSendMessage(): string
    {
        return Main::getInstance()->getServer()->getName() . "\n\n紹介文\n" . self::getMessage() . "\n\n\nIP: " . Main::getInstance()->getServer()->getIp() . "\nPORT: " . Main::getInstance()->getServer()->getPort() . "\n\n\nグループ: " . self::getInviteURL();
    }
}