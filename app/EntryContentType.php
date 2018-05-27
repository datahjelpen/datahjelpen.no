<?php

namespace App;

class EntryContentType extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'icon',
        'css_classlist',
        'html_tag_open',
        'html_tag_close',
    ];
    public function output($content = null)
    {
        $css_class_attr = '';
        $html_attributes = '';

        if (isset($this->css_classlist)) {
            $css_class_attr .= ' class="' . str_replace(',', '', $this->css_classlist) . '"';
        }

        if (count($this->html_attributes) > 0) {
            foreach ($this->html_attributes as $html_attribute) {
                $html_attributes .= ' ' . $html_attribute->html_attribute . '=" "';
            }
        }

        $output = '<' . $this->html_tag_open . $css_class_attr . $html_attributes . '>';

        if (isset($this->html_tag_close)) {
            $output .= $content;
            $output .= '</' . $this->html_tag_close . '>';
        }

        return $output;
    }
}
