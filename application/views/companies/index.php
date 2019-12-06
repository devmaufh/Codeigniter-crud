<style>
p {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
<br>

<div class="container">
    <div class="row">
        <?php 
    foreach ($companies as $key => $value) {?>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <?php echo $value['name'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Descripción</h5>
                    <p class="card-text"><?php echo $value['description'] ?></p>
                    <a href="<?php echo base_url('companies/view/'.$value['id']) ?>" class="btn btn-success">Ver más</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
