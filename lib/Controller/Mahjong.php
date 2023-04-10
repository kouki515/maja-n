<?php

namespace Controller;

// 雑記 $gameinfoを引数として受け取ってコンストラクトで処理する(例:gameinfo[playerOfNum(3)]なら三人麻雀にする、最初の持ち点、ローカルルールや喰い断の有無など)
class Mahjong extends \Controller
{
    private $pile = []; // 牌山
    private $roundWind = 'east'; // 場風 とりあえず東風戦の体で
    public $playerManager; // プレイヤーマネージャー
    
    public function __construct($gameInfo) {
        // ※初期化条件にisInitialized変数でフラグを用意したい fixme
        $this->playerManager = new \Player\PlayerManager;
        $this->initGame($gameInfo);
    }

    public function run() {
        return;
        // メンバ変数の値を$gameInfoに格納してそれをSession間で受け渡して値の保持を行うようにしたい
    }

    // 配牌
    private function initGame($gameInfo) {
        // プレイヤーの生成
        $this->playerManager->addPlayer(new \Player\Player);
        // プレイヤーの人数分を引いた数のダミープレイヤーを用意
        for ($i = 1; $i <= $gameInfo - count($this->playerManager->getAllPlayers()); $i++) {
            $this->playerManager->addPlayer(new \Player\DummyPlayer);
        }
        // 牌山の生成 (牌のリスト×4で牌山の生成)
        for ($i = 0; $i < 4; $i++) {
            foreach (\Constant\Tiles::TILES as $tile)  {
                $this->pile[] = $tile;
            }
        }
        // 牌山のシャッフル
        shuffle($this->pile);
        // 席順のシャッフル
        // shuffle($temporaryPlayers);
        // 親決め
        $dice = mt_rand(1, 12) % count($this->playerManager->getAllPlayers());
        // $temporaryPlayers[$dice]->setParent();
        // $this->players[] = $temporaryPlayers;



        // 手牌が12になるまで4枚づつツモる
        for ($i = 0; $i < 3; $i++) {
            foreach ($this->playerManager->getAllPlayers() as $player) {
                for ($i = 0; $i < 4; $i++) {
                    $this->dealHand($player);
                }
            }
        }
        // $this->dealHand();
    }

    // ツモ
    // private function dealHand(\Player\Player|\Player\DummyPlayer $player) {
    private function dealHand($player) {
        $player->setHand(array_shift($this->pile));
    }

    // getter
    public function getPile() {
        return $this->pile;
    }
    public function getPlayerHnad() {
        // return $this->player->getHand();
    }
}
