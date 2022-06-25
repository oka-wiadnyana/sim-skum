<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; SIM-SKUM</title>
  <link href="<?= base_url(''); ?>/img/logo-onsdee86.png" rel="icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('stisla-assets/'); ?>/css/style.css">
  <link rel="stylesheet" href="<?= base_url('stisla-assets/'); ?>/css/components.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <script src="<?= $assets['sweetalert']; ?>"></script>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white d-flex align-items-center">
          <div class="p-4 m-3">
            <!-- <img src="<?= base_url('img/logo-onsdee86.png'); ?>" alt="logo" width="80" class="  mb-5 mt-2"> -->
            <div class="d-flex align-items-center mb-2 p-0">

              <img src="<?= base_url('img/pengadilan.png'); ?>" alt="" class="img-fluid d-none d-md-block mr-2" style="width:1.5rem; ">
              <h4 class="text-dark font-weight-normal mt-2"><span class="font-weight-bold"> SIM-SKUM</span></h4>
            </div>

            <form method="POST" action="<?= base_url('auth/attempt_login'); ?>" class="needs-validation" novalidate="">
              <?= csrf_field(); ?>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Please fill in your email
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>


              <div class="form-group text-left">

                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>


            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; PN Negara. Made with 💙 by <img src="<?= base_url('img/logo-onsdee86.png'); ?>" alt="logo-onsdee86.png" width="30rem">
              <div class="mt-2">

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('stisla-assets/'); ?>/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold"><?= $greet; ?></h1>
                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('stisla-assets/'); ?>/js/stisla-assets.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url('stisla-assets/'); ?>/js/scripts.js"></script>
  <script src="<?= base_url('stisla-assets/'); ?>/js/custom.js"></script>

  <!-- Page Specific JS File -->

  <script>
    <?php if (session()->has('fail')) : ?>
      <?php $errors = session()->getFlashdata('fail');
      $msg = "";
      foreach ($errors as $e) {
        $msg .= $e . ', ';
      }
      ?>
      Swal.fire({
        icon: 'error',
        text: '<?= $msg; ?>'

      })
    <?php elseif (session()->has('success')) : ?>
      Swal.fire({
        icon: 'success',
        text: '<?= session()->getFlashdata('success'); ?>'
      })
    <?php elseif (session()->has('email')) : ?>
      Swal.fire({
        icon: 'success',
        text: '<?= session()->getFlashdata('email'); ?>'
      })


    <?php endif; ?>
  </script>
</body>

</html>