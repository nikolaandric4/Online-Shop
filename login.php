<h1>Login</h1>

<div class="row">
    <div class="col-sm-4">

        <?php 
        if (!empty($validation)) {
            echo $validation->listErrors('public_errors_list');
        } 
        
        if (!empty($errorMessage)) {
            echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
        }
        
        ?>

        <form method="post">
            <div class="mb-3">
                <label for="login" class="form-label fw-bold">Login:</label>
                <input type="text" class="form-control" id="login" name="login">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">login</button>
        </form>
        
        <p class="mt-3">Ukoliko nemate kreiran nalog, morate da se <a href="<?php echo base_url('korisnici/registracija'); ?>">registrujete</a>.</p>
    </div>
</div>