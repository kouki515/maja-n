<?php

namespace Player;

class PlayerManager
{
    private $players = [];

    public function addPlayer(Player|DummyPlayer $player) {
        $this->players[] = $player;
    }

    public function removePlayer($key) {
        unset($this->players[$key]);
    }

    public function getPlayer($key) {
        if (isset($this->players[$key])) {
            return $this->players[$key];
        }
        return null;
    }

    public function getAllPlayers() {
        return $this->players;
    }
}
