<?php
$company = $company[0];
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="card">
                <div class="card-header">
                    Información detallada
                </div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $company['name'] ?> <span
                            class="badge badge-primary badge-pill">Visitas <?php echo $company['visits'] ?></span>
                    </h5>
                    <span>Telefono</span>
                    <h6><?php echo $company['phone'] ?></h6>
                    <span>Dirección</span>
                    <h6><?php echo $company['address'] ?></h6>
                    <span>Descripción</span>
                    <h6><?php echo $company['description'] ?></h6>
                </div>
            </div>
        </div>
    </div>
    <h1></h1>
</div>