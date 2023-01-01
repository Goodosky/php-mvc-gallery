<?php
require_once "vendor/autoload.php";

class Gallery
{
  private $db; // images collection

  public function __construct()
  {
    $client = new MongoDB\Client(
      "mongodb://localhost:27017/wai",
      [
        'username' => 'wai_web',
        'password' => 'w@i_w3b',
      ]
    );

    $this->db = $client->wai->images;
  }

  public function getAllImages()
  {
    return $this->db->find();
  }

  function addImage($image, $author, $title)
  {
    $format = get_fileformat_from_filename($image['name']);
    $filename = time() . '.' . $format;
    $upload_dir = "static/images/";

    // Save original image in $upload_dir
    move_uploaded_file($image['tmp_name'], $upload_dir . 'original-' . $filename);

    // Save image in the database;
    $this->db->insertOne([
      'filename' => $filename,
      'author' => $author,
      'title' => $title
    ]);
  }
}
