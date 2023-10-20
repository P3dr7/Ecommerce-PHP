<?php

namespace p3dr7;

use Rain\TpL;

class Page {
    private $tpl;
    private $options = [];
    private $defaults= [
        "data"=> [],
    ];

    public function __construct($opts = array()) {
        $this->options = array_merge($this->defaults, $opts);
        $config = array(
            "tpl_dir"=> $_SERVER["DOCUMENT_ROOT"]."/views/",
            "cache_dir"=> $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"=> false
        );

        TpL::configure($config);

        $this->tpl = new TpL;

        $this->setData($this->options["data"]);

        $this->tpl->draw("header");

    }

    private function setData($data = array()) {
        foreach ($data as $key => $value) {
            $this->tpl->assign($key = $value);
        }
    }

    public function setTpl($nome, $data = array(), $returnHTML= false) {
        $this->setData($data);
        return $this->tpl->draw($nome, $returnHTML);
    }
    public function __destruct() {
        $this->tpl->draw("footer");
    }

}