<script>
    $(function($) {
        $("img").click(function() {
            $(this).hide();
        });
        
        $('h1').hover(function() {
            $('img').fadeIn('slow');
        });
    });
</script>
<h1><?php echo $homePage['title']; ?></h1>
<div class="row">
    <div class="col-sm-4"><img src="<?php echo base_url('images/onlineshop.png'); ?>" class="img-fluid"></div>
    <div class="col-sm-8">
        <?php echo $homePage['description']; ?>
    </div>
</div>
