<?php
class Gallery
{
  private $db; // 'images' collection

  public function __construct()
  {
    $client = get_db_client();
    $this->db = $client->wai->images;
  }

  public function getImages($page)
  {
    $start_index = ($page - 1) * IMAGES_PER_PAGE;
    $images = $this->db->find([], [
      'limit' => IMAGES_PER_PAGE,
      'skip' => $start_index,
    ]);

    return $images;
  }

  public function getSelectedImages($selected_images)
  {
    // Create filter
    $filter = ['filename' => ['$in' => $selected_images]];

    // Get images using this filter and return them
    return $this->db->find($filter);
  }

  function addImage($image, $author, $title, $watermark_text)
  {
    $format = get_fileformat_from_filename($image['name']);
    $filename = time() . '.' . $format;
    $upload_dir = "static/images/";

    // Save original image in $upload_dir
    move_uploaded_file($image['tmp_name'], $upload_dir . $filename);

    // Save image in the database;
    $this->db->insertOne([
      'filename' => $filename,
      'author' => $author,
      'title' => $title
    ]);

    // Create images with watermark and thumbnail
    generate_image_variants($upload_dir, $filename, $watermark_text);
  }

  function countPages()
  {
    $count_images = $this->db->count();
    $count_pages = ceil($count_images / IMAGES_PER_PAGE);
    return $count_pages;
  }
}
