<?php

namespace Player;
class Player
{
    protected $hand = []; // 手牌
    protected $playerWind; // 自風
    protected $discardTiles = []; // 河
    protected $isParent = false; // 親かどうか
    protected $isClosed; // 門前かどうか
    protected $isInPlayer = true; // プレイヤー操作かどうか
    // 点数 (add later)

    public function isPlayerOperating() {
        return $this->isInPlayer;
    }

    // setter getter
    public function getHand() {
        return $this->hand;
    }
    public function setHand($tile) {
        if (in_array($tile, \Constant\Tiles::TILES, true)) {
            $this->hand[] = $tile;
        } else {
            // fixme
            echo 'not a valid data';
        }
    }
    public function setParent() {
        $this->isParent = true;
    }
}
