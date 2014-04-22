<?php

class SirTrevorParser extends TextParser {

    protected $root = array();

    protected function decodeContent() {
        $this->root = json_decode($this->content);
    }
    public function parse() {

    }
}
