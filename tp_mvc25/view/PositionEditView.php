<?php

class PositionEditView extends Template
{
    public function render($position)
    {
        // Load file template HTML
        $tpl = new Template("position_edit.html");
        $template = $tpl->getContent();

        // Replace placeholders
        $template = str_replace("{{id}}", $position["id"], $template);
        $template = str_replace("{{position_name}}", $position["position_name"], $template);

        echo $template;
    }
}
