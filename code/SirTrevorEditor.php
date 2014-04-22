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

        Requirements::combine_files(
            'sirtrevor.js',
            array(
                self::path('thirdparty/underscore/underscore-min.js'),
                self::path('thirdparty/Eventable/eventable.js'),
                self::path('thirdparty/sir-trevor-js/sir-trevor.js')
            )
        );
        Requirements::javascript(self::path('javascript/sirtrevoreditor.js'));


        $blocks = array('images', 'files');
        foreach ($blocks as $name) {
            Requirements::javascript(self::path("javascript/blocks/$name.js"));
        }

        // Requirements::combine_files(
        //     'sirtrevoreditor-blocks.js',
        //     array(self::path('javascript/blocks'))
        //     );
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
