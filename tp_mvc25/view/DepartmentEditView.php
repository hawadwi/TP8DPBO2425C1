<?php

class DepartmentEditView extends Template
{
    public function render($department)
    {
        // Load file template HTML
        $tpl = new Template("department_edit.html");
        $template = $tpl->getContent();

        // Replace placeholders
        $template = str_replace("{{id}}", $department["id"], $template);
        $template = str_replace("{{dept_name}}", $department["dept_name"], $template);
        $template = str_replace("{{room_code}}", $department["room_code"], $template);

        echo $template;
    }
}
