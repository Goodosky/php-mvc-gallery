<?php
class GalleryController
{
  private $gallery;
  private $userModel;

  function __construct()
  {
    $this->gallery = new Gallery();
    $this->userModel = new User();

    if (!isset($_SESSION['selected_images'])) $_SESSION['selected_images'] = [];
  }

  function index()
  {
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $number_of_pages = $this->gallery->countPages();
    $images = $this->gallery->getImages($current_page);
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

        // Redirect user to prevent form resubmission
        header("Location: /add-image");
        exit;
      }
    }

    // Show image view
    require_once "views/addImageView.php";
  }

  function rememberSelected()
  {
    if (isset($_POST['selected_images'])) {
      $_SESSION['selected_images'] =  array_unique(array_merge($_SESSION['selected_images'], $_POST['selected_images']));
    }

    // Redirect index and show the Gallery
    header("Location: /");
    exit;
  }

  function showSelected()
  {
    $images = [];

    if (!empty($_SESSION['selected_images'])) {
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

  function addUser()
  {
    // Handle form submission
    if (isset($_POST['email'], $_POST['login'], $_POST['password'])) {
      if ($this->userModel->addUser($_POST['login'], $_POST['email'], $_POST['password'])) {
        $message = "Pomyślnie utworzono konto!";
      } else {
        $message = "Jakiś błąd! Prawdopodobnie ten login (lub e-mail) jest już zajęty";
      };
    }

    // Show register form
    require_once 'views/addUserView.php';
  }

  function login()
  {
    // Handle form submission
    if (isset($_POST['login'], $_POST['password'])) {
      $user_id = $this->userModel->login($_POST['login'], $_POST['password']);

      if ($user_id) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user_id;

        // Redirect user to prevent form resubmission
        header("Location: /");
        exit;
      } else {
        $message = "Niepoprawny login lub hasło!";
      }
    }

    $userLoggedIn = isset($_SESSION['user_id']);

    // Show login form
    require_once "views/loginView.php";
  }

  function logout()
  {
    setcookie(session_name(), "", time() - 3600);
    session_destroy();
    $_SESSION = [];

    // Redirect to the login page
    header("Location: /login");
    exit;
  }
}
