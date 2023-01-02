<?php
$title = "Zaloguj się";
include "partials/header.php";

if ($userLoggedIn) : ?>
  <div class="bg-light p-6 rounded-md">
    <h3>Jesteś już zalogowany!</h3>

    <form action="/logout" method="post">
      <button class="btn3 rounded-md px-10 py-2.5 text-lg mt-5" type="submit">Wyloguj się</button>
    </form>
  </div>

<?php else : ?>

  <form action="/login" method="post" enctype="multipart/form-data" class="bg-light p-6 rounded-md">
    <h2>Zaloguj się</h2>

    <!-- Login -->
    <label class="mt-5 text-lg block" for="login">Login:</label>
    <input class="shadow border-gray-300 border-b-2 rounded p-2" type="text" name="login" id="login" required><br>

    <!-- Password -->
    <label class="mt-5 text-lg block" for="password">Hasło:</label>
    <input class="shadow border-gray-300 border-b-2 rounded p-2" type="password" name="password" id="password" required><br>

    <button class="btn3 rounded-md px-10 py-2.5 text-lg mt-5" type="submit">Zaloguj się</button>

    <?php if (isset($message)) : ?>
      <div class="mt-5">
        <p>
          <?= $message ?>
        </p>
      </div>
    <?php endif; ?>
  </form>
<?php endif; ?>

<?php include "partials/footer.php"; ?>