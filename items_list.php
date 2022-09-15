<h1>Proizvodi</h1>

<form class="row my-3 row-cols-lg-auto g-3 align-items-center" method="get">
    <label for="pretraga" class="col-auto">Pretraga:</label>
    <div class="col-auto">
        <input type="text" class="form-control" id="pretraga" name="pretraga" value="<?php echo $search; ?>" >
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">OK</button>
    </div>
</form>

<div class="row items_list">
    <?php foreach($items as $item): ?>
    <div class="col-sm-4 col-lg-3">
        <div class="card text-center">
            <div class="item_image">
                <img src="<?php echo base_url("images/proizvodi/{$item->item_id}/160x160_{$item->image}"); ?>" class="rounded img-fluid" alt="<?php echo $item->title; ?>">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $item->title; ?></h5>
                <p class="card-text"><span class="price"><?php echo priceFormat($item->price); ?></span></p>
                <a href="<?php echo base_url('proizvod/' . $item->item_id . '/' . url_title($item->title, '-', true)); ?>" class="btn btn-primary">detaljnije</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php echo $pager->links('group1', 'public_pagination'); ?>