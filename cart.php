<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/facebox/1.3/facebox.min.js" integrity="sha512-DafgdU2HdE6zzOrLOWGtLs9EeirqW76V1aLoyzTC+eriqIfX+FdwVFwvex+k3C2h1jafDa5nFVe7/qq7GWpT7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/facebox/1.3/facebox.min.css" integrity="sha512-equEZ2/wXpdwZdHgDTrtFSKVcrs0I2FThPioziSFI9aJMnZ2fK3+jASRWBzZnyevyfoAqNHS01IAC7ZJUy++Jg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
jQuery(document).ready(function($) {
  $.facebox.settings.closeImage = 'https://cdnjs.cloudflare.com/ajax/libs/facebox/1.3/closelabel.png';
  $.facebox.settings.loadingImage = 'https://cdnjs.cloudflare.com/ajax/libs/facebox/1.3/loading.gif';
  $.facebox.settings.opacity = '0.5';
    
  $('a[rel*=facebox]').facebox();
  
  $('h3').click(function() {
      jQuery.facebox('Klik na naslov!');
  });
});
</script>

<h1>Korpa</h1>

<?php if (empty($items)): ?>
    <h3>Vasa korpa je prazna!</h3>
<?php else: ?>
    <h3>Proizvodi u korpi</h3>

    <div class="table-responsive">

        <table class="table table-striped table-bordered table-condensed">
            <tr class="info">
                <td>Slika</td>
                <td>Proizvod</td>
                <td>Kategorija</td>
                <td>Cena</td>
                <td>&nbsp;</td>
            </tr>
            <?php foreach($items as $korpaId => $item): ?>
            <tr>
                <td>
                    <a rel="facebox" href="<?php echo base_url('images/proizvodi/' . $item->item_id . '/300x300_' . $item->image);?>">
                        <img width="50" src="<?php echo base_url('images/proizvodi/' . $item->item_id . '/160x160_' . $item->image);?>">
                    </a>
                </td>
                <td><?php echo $item->title; ?></td>
                <td><?php echo $item->category; ?></td>
                <td><?php echo priceFormat($item->price); ?></td>
                <td><a href="<?php echo base_url('proizvodi/izbaci-iz-korpe/'. $korpaId);?>" style="color:red; "><b>izbaci proizvod</b></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php
    $totalPrice = 0;
    foreach ($items as $item) {
        $totalPrice += $item->price;
    }
    ?>

    <p class="br_proivoda">Broj proizvoda u korpi: <b><?php echo count($items) ?></b></p>
    <p class="br_proivoda">Ukupna cena: <b class="price"><?php echo priceFormat($totalPrice); ?></b></p>

    <div>
        <a href="<?php echo base_url('proizvodi/naruci'); ?>" class="btn btn-primary">Naruči</a>
    </div>
<?php endif; ?>