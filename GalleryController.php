<?php
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
    $selected_images = isset($_SESSION['selected_images']) ? $_SESSION['selected_images'] : [];
    require_once "views/indexView.php";
  }

  function addImage()
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

  function rememberSelected()
  {
    if (isset($_POST['selected_images'])) {
      $_SESSION['selected_images'] = $_POST['selected_images'];
    }

    // Redirect index and show the Gallery
    header("Location: /");
    exit;
  }

  function showSelected()
  {
    $images = [];

    if (isset($_SESSION['selected_images'])) {
      $images = $this->gallery->getSelectedImages($_SESSION['selected_images']);
    }

    require_once "views/selectedImagesView.php";
  }

  function removeSelected()
  {
    // Remove images from $_SESSION['selected_images']
    if (isset($_POST['unselected_images'])) {
      $only_not_unselected = array_diff($_SESSION['selected_images'], $_POST['unselected_images']);
      // Reassign elements to a new array ($only_not_unselected not have to be indexed from 0)
      $_SESSION['selected_images'] = array_values($only_not_unselected);
    }

    // Redirect and show selected images
    header("Location: /show-selected");
    exit;
  }

  function error_404()
  {
    http_response_code(404);
    require_once 'views/404View.php';
  }
}
