<?php

class Template
{
    var $filename = '';
    var $content = '';

    // Constructor: otomatis mencari file template di folder /template/
    function __construct($filename = '')
    {
        if ($filename !== '') {

            // Jika sudah diberikan path lengkap, gunakan langsung
            if (file_exists($filename)) {
                $this->filename = $filename;
                $this->content = implode("", file($filename));
                return;
            }

            // Jika hanya nama file, cari di folder template/
            $fullpath = "template/" . $filename;

            if (!file_exists($fullpath)) {
                die("Template file not found: $fullpath");
            }

            $this->filename = $fullpath;
            $this->content  = implode("", file($fullpath));
        }
    }

    function clear()
    {
        $this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);
    }

    function write()
    {
        $this->clear();
        print $this->content;
    }

    function getContent()
    {
        $this->clear();
        return $this->content;
    }

    function replace($old = '', $new = '')
    {
        if (is_int($new)) {
            $value = sprintf("%d", $new);
        } elseif (is_float($new)) {
            $value = sprintf("%f", $new);
        } elseif (is_array($new)) {
            $value = implode(" ", $new);
        } else {
            $value = $new;
        }

        $this->content = str_replace($old, $value, $this->content);
    }

}
