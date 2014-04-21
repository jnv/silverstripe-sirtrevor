<?php
/**
 * Represents a large text field that contains JSON content.
 * This behaves similarly to {@link Text}, but the template processor won't escape any HTML content within it.
 *
 * @see HTMLVarchar
 * @see Text
 * @see Varchar
 *
 * @package framework
 * @subpackage model
 */
class SirTrevorText extends Text {

    public function forTemplate() {
        parent::forTemplate();
    }

    public function scaffoldFormField($title = null, $params = null) {
        return new SirTrevorField($this->name, $title);
    }
}
