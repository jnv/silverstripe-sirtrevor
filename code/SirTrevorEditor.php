<?php

class SirTrevorEditor extends TextareaField {
    private static function path($to = '') {
        return 'sirtrevor/' . $to;
    }

    /**
     * Includes the JavaScript neccesary for this field to work using the {@link Requirements} system.
     */
    public static function requirements() {
        Requirements::css(self::path('thirdparty/sir-trevor-js/sir-trevor-icons.css'));
        Requirements::css(self::path('thirdparty/sir-trevor-js/sir-trevor.css'));
        Requirements::css(self::path('css/sirtrevoreditor.css'));

        Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
        Requirements::javascript(THIRDPARTY_DIR. '/jquery-entwine/dist/jquery.entwine-dist.js');
        Requirements::javascript(self::path('thirdparty/underscore/underscore-min.js'));
        Requirements::javascript(self::path('thirdparty/Eventable/eventable.js'));
        Requirements::javascript(self::path('thirdparty/sir-trevor-js/sir-trevor.js'));
        Requirements::javascript(self::path('javascript/sirtrevoreditor.js'));
    }

    public function __construct($name, $title = null, $value = '') {
        parent::__construct($name, $title, $value);
        self::requirements();
    }

    public function FieldHolder($properties = array()) {
        $this->addExtraClass('stacked');
        return parent::FieldHolder($properties);
    }
}
