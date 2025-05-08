<?php
class FormBuilder
{
    private $method;
    private $action;
    private $attributes;
    public function __construct($method, $action, $attributes = [])
    {
        $this->method = $method;
        $this->action = $action;
        $this->attributes = $attributes;
    }
    public function open()
    {
        $attributes = $this->generateAttributes($this->attributes);
        return "<form method='{$this->method}' action='{$this->action}'{$attributes}>";
    }
    public function close()
    {
        return '</form>';
    }
    public function input($id, $type, $value = '', $attributes = [])
    {
        $attributes['name'] = $id;
        $attributes['type'] = $type;
        $attributes['value'] = $value;
        $attrString = $this->generateAttributes($attributes);
        return "<input{$attrString} />";
    }
    public function textarea($id, $content = '', $attributes = [])
    {
        $attributes['name'] = $id;
        $attrString = $this->generateAttributes($attributes);
        return "<textarea{$attrString}>{$content}</textarea>";
    }
    public function select($id, $options, $attributes = [])
    {
        $attributes['name'] = $id;
        $attrString = $this->generateAttributes($attributes);
        $html = "<select{$attrString}>";
        foreach ($options as $value => $label) {
            $html .= "<option value='{$value}'>{$label}</option>";
        }
        $html .= '</select>';
        return $html;
    }
    public function radio($name, $value, $id = '', $checked = false, $attributes = [])
    {
        $attributes['type'] = 'radio';
        $attributes['name'] = $name;
        $attributes['value'] = $value;
        if ($id) {
            $attributes['id'] = $id;
        }
        if ($checked) {
            $attributes['checked'] = 'checked';
        }
        $attrString = $this->generateAttributes($attributes);
        return "<input{$attrString} />";
    }
    public function checkbox($name, $value, $id = '', $checked = false, $attributes = [])
    {
        $attributes['type'] = 'checkbox';
        $attributes['name'] = $name;
        $attributes['value'] = $value;
        if ($id) {
            $attributes['id'] = $id;
        }
        if ($checked) {
            $attributes['checked'] = 'checked';
        }
        $attrString = $this->generateAttributes($attributes);
        return "<input{$attrString} />";
    }
    private function generateAttributes($attributes)
    {
        $attrString = '';
        foreach ($attributes as $key => $value) {
            $attrString .= " {$key}='{$value}'";
        }
        return $attrString;
    }
}
?>