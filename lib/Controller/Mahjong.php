<?php

namespace Controller;

class Mahjong extends \Controller
{
    private $deck = [];
    private $hand = [];

    public function run() {
        // 手牌、牌山ともに0枚ならゲームを初期化
        // ※初期化条件にrdy変数でフラグを用意したい fixme
        if (empty($this->hand) && empty($this->deck)) {
            $this->initGame();
        }
    }

    // 配牌
    private function initGame() {
        $this->createDeck();
        // 手牌が12になるまで4枚づつツモる
        while (count($this->hand) < 12) {
            for ($i = 0; $i < 4; $i++) {
                $this->drawTiles();
            }
        }
        // 親なら2枚ツモる 子なら1枚ツモる ようにしたい！ fixme
        $this->drawTiles();
        $this->drawTiles();
    }

    // 牌山の生成
    private function createDeck() {
        for ($i = 0; $i < 4; $i++) {
            foreach (\Constant\Tiles::TILES as $tile)  {
                $this->deck[] = $tile;
            }
        }
    }

    // 山から1枚手牌に加える
    private function drawTiles() {
        array_push($this->hand, array_shift($this->deck));
    }

    // getter
    public function getDeck() {
        return $this->deck;
    }
    public function getHand() {
        return $this->hand;
    }
}
