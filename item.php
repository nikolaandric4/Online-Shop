<h1>Proizvod</h1>

<h3 class="mt-3"><?php echo $item->title; ?></h3>

<div class="row mt-3">
    <div class="col-sm-4">
        <img src="<?php echo base_url("images/proizvodi/{$item->item_id}/300x300_{$item->image}"); ?>" alt="<?php echo $item->title;?>">
    </div>
    <div class="col-sm-8">
        <p><?php echo $item->description; ?></p>
        <p class="price"><?php echo priceFormat($item->price); ?></p>
        
        <?php if(user_is_loggedin()): ?>
            <p>
                <a class="btn btn-primary" href="<?php echo base_url("proizvodi/dodaj-u-korpu/{$item->item_id}"); ?>">dodaj u korpu</a>
                <?php 
                $session = session();
                if($session->has('add_to_cart_message')): ?>
                    <span class="alert alert-success"><?php echo $session->add_to_cart_message; ?></span>
                <?php endif; ?>
            </p>
        <?php endif; ?>
    </div>
</div>
