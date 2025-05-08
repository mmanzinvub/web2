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
        $attributes['id'] = $id;
        $attributes['type'] = $type;
        $attributes['value'] = $value;
        $attrString = $this->generateAttributes($attributes);
        return "<input{$attrString} />";
    }
    public function textarea($id, $content = '', $attributes = [])
    {
        $attributes['id'] = $id;
        $attrString = $this->generateAttributes($attributes);
        return "<textarea{$attrString}>{$content}</textarea>";
    }
    public function select($id, $options, $attributes = [])
    {
        $attributes['id'] = $id;
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
$form = new FormBuilder('POST', 'submit.php', ['class' => 'my-form']);
echo $form->open();
echo $form->input('username', 'text', '', ['placeholder' => 'Username', 'required' => 'required']) . "<br>" . "<br>";
echo $form->input('password', 'password', '', ['placeholder' => 'Password', 'required' => 'required']) . "<br>" . "<br>";
echo $form->input('submit', 'submit', 'Submit');
$options = [
    'option1' => 'Option 1',
    'option2' => 'Option 2',
    'option3' => 'Option 3'
];
echo $form->select('my_select', $options) . "<br>";
// Radio elements
echo $form->radio('my_radio', 'radio1', 'radio1', true) . "<br>";
echo '<label for="radio1">Radio 1</label>';
echo $form->radio('my_radio', 'radio2', 'radio2');
echo '<label for="radio2">Radio 2</label>' . "<br>";
// Checkbox elements
echo $form->checkbox('my_checkbox[]', 'check1', 'check1', true);
echo '<label for="check1">Checkbox 1</label>' . "<br>";
echo $form->checkbox('my_checkbox[]', 'check2', 'check2') . "<br>";
echo '<label for="check2">Checkbox 2</label>' . "<br>";
echo $form->input('submit', 'submit', 'Submit');
echo $form->close();