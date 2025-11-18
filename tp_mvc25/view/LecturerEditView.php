<?php

class LecturerEditView extends Template
{
    public function render($lecturer, $departments, $positions)
    {
        // Load file template HTML
        $tpl = new Template("lecturer_edit.html");
        $template = $tpl->getContent();

        // Department dropdown
        $deptOptions = "";
        foreach ($departments as $d) {
            $selected = ($d['dept_id'] == $lecturer['dept_id']) ? "selected" : "";
            $deptOptions .= "<option value='{$d['dept_id']}' $selected>{$d['dept_name']}</option>";
        }

        // Position dropdown
        $posOptions = "";
        foreach ($positions as $p) {
            $selected = ($p['position_id'] == $lecturer['position_id']) ? "selected" : "";
            $posOptions .= "<option value='{$p['position_id']}' $selected>{$p['position_name']}</option>";
        }

        // Replace placeholders
        $template = str_replace("{{id}}", $lecturer["id"], $template);
        $template = str_replace("{{name}}", $lecturer["name"], $template);
        $template = str_replace("{{nidn}}", $lecturer["nidn"], $template);
        $template = str_replace("{{phone}}", $lecturer["phone"], $template);
        $template = str_replace("{{join_date}}", $lecturer["join_date"], $template);
        $template = str_replace("{{department_options}}", $deptOptions, $template);
        $template = str_replace("{{position_options}}", $posOptions, $template);

        echo $template;
    }
}
