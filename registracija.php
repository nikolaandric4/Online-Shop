<script>
    $(function($) {
        $('#login').keyup(function() {
            var login = $(this).val();
            var url = '<?php echo base_url('korisnici/login-available');?>';
            
            $.get(url + '/' + login, {}, function(response) {
                if (response == 1) {
                    $('#available').text('slobodno!');
                    $('#available').css('color', 'green');
                } else {
                    $('#available').text('zauzeto!');
                    $('#available').css('color', 'red');
                }
            });
        });
    });
</script>

<h1>Registracija</h1>

<div class="row">
    <div class="col-sm-4">

        <?php if (!empty($validation)) {
            echo $validation->listErrors('public_errors_list');
        } ?>

        <form method="post">
            <div class="mb-3">
                <label for="login" class="form-label fw-bold">Login:</label> <span id="available"></span>
                <input type="text" class="form-control" id="login" name="login" value="<?php echo set_value('login'); ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label fw-bold">Ime:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label fw-bold">Prezime:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label fw-bold">Adresa:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo set_value('address'); ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label fw-bold">Telefon:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone'); ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">registruj se</button>
        </form>
    </div>
</div>