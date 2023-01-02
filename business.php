<?php
function get_db_client()
{
  $client = new MongoDB\Client(
    "mongodb://localhost:27017/wai",
    [
      'username' => 'wai_web',
      'password' => 'w@i_w3b',
    ]
  );

  return $client;
}

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

function generate_image_variants($upload_dir, $filename, $watermark_text)
{
  $format = get_fileformat_from_filename($filename);

  // Open image
  if ($format == "jpg") {
    $img = imagecreatefromjpeg($upload_dir . $filename);
  } else {
    $img = imagecreatefrompng($upload_dir . $filename);
  }

  // Write the red string at the top left
  $textcolor = imagecolorallocate($img, 255, 0, 0);
  imagestring($img, 5, 0, 0, $watermark_text, $textcolor);

  // Save watermarked file
  imagepng($img, $upload_dir . "watermarked-" . $filename);

  // Scale image to 200x125 px and create a thumbnail
  $thumb = imagescale($img, 200, 125);
  imagepng($thumb, $upload_dir . "thumb-" . $filename);

  // Free allocated memmory
  imagedestroy($thumb);
  imagedestroy($img);
}
