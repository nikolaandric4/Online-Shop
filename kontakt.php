<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $("#contactForm").validate();
    });
</script>

<h1><?php echo $contactPage['title']; ?></h1>

<div class="row">
    <div class="col-sm-6">
        <?php echo $contactPage['description']; ?>

        <h2>Kontaktirajte nas!</h2>
        
        <?php if (!empty($validation)) {
            echo $validation->listErrors('public_errors_list');
        } ?>

        <form method="post" id="contactForm">
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Ime i Prezime:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" required="">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" required="">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label fw-bold">Tekst:</label>
                <textarea class="form-control" id="text" name="text" rows="3" required=""><?php echo set_value('text'); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">pošalji</button>
        </form>
    </div>
    <div class="col-sm-6 mt-5 mt-sm-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2371.486926243558!2d21.902457356776278!3d43.31788177952881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b9e96d9dd1%3A0x9499ba778236bab1!2zSVQgY2VudGFyIPCfkanigI3wn5K7!5e0!3m2!1ssr!2srs!4v1653671906455!5m2!1ssr!2srs" width="400" height="400" style="border:0; width:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>