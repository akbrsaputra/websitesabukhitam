<section class="login">
  <div class="login_box">
    <div class="left">
      <div class="contact">
        <form action="<?php echo BASEURL; ?>/home/masuk" method="POST">
          <h3>Login</h3>
          <input type="text" name="email" id="email" autocomplete="off" placeholder="USERNAME">
          <input type="password" name="password" id="password" autocomplete="off" placeholder="PASSWORD">
          <?php $error = $data['error']; ?>
          <?php if (isset($error)) : ?>
            <div class="alert alert-danger text-login mt-2" role="alert">Username atau Password salah</div>
          <?php endif; ?>
          <?php echo $data['close'] ?>
          <button type="submit" name="login" class="submit">Login</button>
          <div class="d-grid gap-2">
            <button type="button" class="btn btn-no outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <a href="<?= BASEURL; ?>/staff/index"> Masuk sebagai Guest</a>
            </button>
                    </div>
        </form>
      </div>
    </div>
    <div class="right">
      <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
    </div>
  </div>
</section>