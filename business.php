<?php
function go_to_404()
{
  http_response_code(404);
  include 'views/404View.php';
};

function get_fileformat_from_filename($filename)
{
  $tmp = explode(".", $filename);
  return strtolower(end($tmp));
}

function file_valdation($form)
{
  $format = get_fileformat_from_filename($_FILES["image"]["name"]);

  return [
    "format" => $format == "jpg" || $format == "png" ? $format : false,
    "size" => $form['size'] > 0 && $form['size'] / 1048576 <= 1 // <= 1MB
  ];
}
