<?php
class BudGuru_Service_Section {
    private $title_first;
    private $title_second;
    private $description;
    private $image;
    private $button_text;
    private $button_url;

    public function __construct($args = array()) {
        $this->title_first = isset($args['title_first']) ? $args['title_first'] : '';
        $this->title_second = isset($args['title_second']) ? $args['title_second'] : '';
        $this->description = isset($args['description']) ? $args['description'] : '';
        $this->image = isset($args['image']) ? $args['image'] : '';
        $this->button_text = isset($args['button_text']) ? $args['button_text'] : __('Викликати майстра', 'budguru');
        $this->button_url = isset($args['button_url']) ? $args['button_url'] : '#';
    }

    public function get($key) {
        return isset($this->$key) ? $this->$key : '';
    }
} 