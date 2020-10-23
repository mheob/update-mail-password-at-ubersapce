<?php // phpcs:disable
defined('MAIL_HOST') || die("No direct access!");
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="robots" content="noindex, nofollow" />

    <!-- Bootstrap and Fontawesome CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css"
      integrity="sha256-AaQqnjfGDRZd/lUp0Dvy7URGOyRsh8g9JdWUkyYxNfI="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/regular.min.css"
      integrity="sha256-MbKOjWP1JGUodoD6fxUTKeTofR2x8EHs6b1wQfSprSk="
      crossorigin="anonymous"
    />

    <title>Mail-Passwort ändern</title>
  </head>
  <body>
    <main class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h1 class="text-center mb-5 mt-3">Mail-Passwort ändern</h1>

          <?php echo $validateNotice ?>

          <form action="index.php?gotData=true" method="post">
            <div class="form-group mb-3">
              <label for="mail">Mail</label>
              <div class="input-group">
                <input
                  type="text"
                  class="form-control"
                  name="mail"
                  id="mail"
                  placeholder="z.B. a.boehm"
                  value="<?php echo $inputValues["mail"]; ?>"
                  aria-label="Mail"
                />
                <div class="input-group-append">
                  <span class="input-group-text">@<?php echo MAIL_HOST; ?></span>
                </div>
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <div class="form-group mb-3">
              <label for="oldpw">Altes Passwort</label>
              <div class="input-group pw-field">
                <input
                  type="password"
                  class="form-control"
                  name="oldpw"
                  id="oldpw"
                  placeholder="das alte bzw. das vom Administrator zugewiesene Passwort"
                  value="<?php echo $inputValues["oldpw"]; ?>"
                />
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button">
                    <i class="far fa-eye-slash" aria-hidden="true"></i>
                  </button>
                </div>
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <div class="form-group mb-3">
              <label for="newpw">Neues Passwort</label>
              <div class="input-group pw-field">
                <input
                  type="password"
                  class="form-control"
                  name="newpw"
                  id="newpw"
                  placeholder="min. 1 Groß- und 1 Kleinbuchstabe, sowie min. 1 Zahl und 1 Sonderzeichen"
                  value="<?php echo $inputValues["newpw"]; ?>"
                />
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button">
                    <i class="far fa-eye-slash" aria-hidden="true"></i>
                  </button>
                </div>
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <div class="form-group mb-3">
              <label for="newpw2">Passwort Wiederholung</label>
              <div class="input-group pw-field">
                <input
                  type="password"
                  class="form-control"
                  name="newpw2"
                  id="newpw2"
                  placeholder="zur Sicherheit das neue Passwort wiederholen"
                  value="<?php echo $inputValues["newpw2"]; ?>"
                />
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button">
                    <i class="far fa-eye-slash" aria-hidden="true"></i>
                  </button>
                </div>
                <div class="invalid-feedback"></div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-3">
              Ändern
            </button>
          </form>

          <p class="text-muted text-center text-lg-right">
            Dieses Open Source Script stammt von <a href="https://github.com/mheob/">Alexander Böhm</a> und kann auf <a href="https://github.com/mheob/update-mail-password-at-ubersapce">Github</a> gefunden werden.
          </p>
          <p class="text-muted text-center text-lg-right">
            Bei Rückfragen steht Dir <a href="mailto:postmaster@<?php echo MAIL_HOST; ?>?subject=[<?php echo $inputValues["mail"]; ?>] Probleme mit Resetten von meinem Mail-Passwort">Dein Administrator</a> gerne zur Verfügung.
          </p>
        </div>
      </div>
    </main>

    <!-- JavaScript -->
    <!-- jQuery + Bootstrap -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>

    <!-- jQuery-Plugins -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
      integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"
      integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo="
      crossorigin="anonymous"
    ></script>

    <!-- own scripts -->
    <script src="validation.js"></script>
  </body>
</html>
