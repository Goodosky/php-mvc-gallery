<?php
$title = "Dodaj zdjęcie";
include "partials/header.php";
?>

<form action="/addImage" method="post" enctype="multipart/form-data" class="bg-light p-6 rounded-md">
  <h2>Dodaj zdjęcie do galerii</h2>

  <!-- Author -->
  <label class="mt-5 text-lg block" for="author">Autor:</label>
  <input class="shadow border-gray-300 border-b-2 rounded p-2" type="text" name="author" id="author" required><br>

  <!-- Title -->
  <label class="mt-5 text-lg block" for="title">Tytuł:</label>
  <input class="shadow border-gray-300 border-b-2 rounded p-2" type="text" name="title" id="title" required><br>

  <!-- Watermark -->
  <label class="mt-5 text-lg block" for="watermark">Watermark:</label>
  <input class="shadow border-gray-300 border-b-2 rounded p-2" type="text" name="watermark" id="watermark" required><br>

  <!-- Image -->
  <label class="mt-5 text-lg block" for="image">Wybierz zdjęcie do wgrania:</label>
  <input class="shadow border-gray-300 border-b-2 rounded p-2" type="file" name="image" id="image" required><br>

  <button class="btn3 rounded-md px-10 py-2.5 text-lg mt-5" type="submit">Wgraj zdjęcie</button>

  <?php if (isset($is_valid)) : ?>
    <div class="mt-5">
      <?php
      if (!$is_valid["format"]) {
        echo "<p><b>Zły format</b> - dozwolone są jedynie PNG i JPG</p>";
      }

      if (!$is_valid["size"]) {
        echo "<p><b>Zbyt duży rozmiar</b> - maksymalny rozmiar pliku to 1MB</p>";
      }
      ?>
    </div>
  <?php endif; ?>


</form>


<?php include "partials/footer.php"; ?>