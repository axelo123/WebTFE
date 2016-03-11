<?php
class Twig_JSON extends Twig_Extension {

    public function getName() {
        return 'Twig_JSON';
    }

    public function getFunctions() {
        return array(
            'json'  => new Twig_Function_Method($this, 'json'),
        );
    }

    public function json($url) {
        return json_decode(file_get_contents($url), true);
    }
}