<?php
class SirTrevorPage extends Page {

    private static $db = array(
        'Content' => 'SirTrevorText',
    );

    public function getCMSFields() {
        $fields=parent::getCMSFields();

        $stfield = SirTrevorEditor::create('Content');
        $fields->replaceField('Content', $stfield);
        return $fields;
    }
}
