<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mochammad Fachrizal Muzakky">
  <meta name="generator" content="Hugo 0.88.1">

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="/img/logo/Favicon.png" type="image/x-icon">

  <!--=============== REMIXICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="/css/login.css" />

  <title>Josami | {{ $title }} </title>
</head>

<body>
  <div class="container">
    <div class="login__content">
      <img src="/img/login/bg-login.png" alt="login image" class="login__img" />
      <form action="/login" method="post" class="login__form" autocomplete="off" spellcheck="false">
        @csrf
        <div>
          <h1 class="login__title"><span>Selamat</span> Datang</h1>
          <p class="login__description">Silahkan login untuk melanjutkan.</p>
        </div>
        <div>
          <div class="login__inputs">
            <div>
              <label for="" class="login__label">Username</label>
              <input type="text" name="username" placeholder="Masukkan username anda" class="login__input" required />
            </div>
            <div>
              <label for="" class="login__label">Password</label>
              <div class="login__box">
                <input type="password" name="password" placeholder="Masukkan password anda" class="login__input" id="input-pass" required />
                <i class="ri-eye-off-line login__eye" id="input-icon"></i>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="login__buttons">
            <button type="submit" class="login__button">Log In</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    /*=============== SHOW HIDDEN - PASSWORD ===============*/
    const showHiddenPass = (inputPass, inputIcon) => {
      const input = document.getElementById(inputPass),
        iconEye = document.getElementById(inputIcon);

      iconEye.addEventListener("click", () => {
        // Change password to text
        if (input.type === "password") {
          // Switch to text
          input.type = "text";
          // Add icon
          iconEye.classList.add("ri-eye-line");
          // Remove icon
          iconEye.classList.remove("ri-eye-off-line");
        } else {
          // Change to password
          input.type = "password";
          // Remove icon
          iconEye.classList.remove("ri-eye-line");
          // Add icon
          iconEye.classList.add("ri-eye-off-line");
        }
      });
    };
    showHiddenPass("input-pass", "input-icon");
  </script>

  <!--=============== MAIN JS ===============-->
  <script src="/js/main.js"></script>
</body>

</html>