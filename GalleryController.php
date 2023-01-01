<?php
require_once "GalleryModel.php";

class GalleryController
{
  private $gallery;

  function __construct()
  {
    $this->gallery = new Gallery();
  }

  function index()
  {
    $images = $this->gallery->getAllImages();
    require_once "views/indexView.php";
  }

  function add()
  {
    // Handle form submission
    if (isset($_FILES['image'])) {
      $is_valid = file_valdation($_FILES['image']);

      if ($is_valid["format"] && $is_valid["size"]) {
        // Add img to db
        $this->gallery->addImage($_FILES['image'], $_POST['author'], $_POST['title'], $_POST['watermark']);
      }
    }

    // Show image view
    require_once "views/addView.php";
  }
}
