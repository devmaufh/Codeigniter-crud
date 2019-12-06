<div class="container">
    <h1>Empresas</h1>
    <button id="btn-add" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-modal">
        Nueva empresa
    </button>
    <table id="table-company" class="table ">
        <thead class="thead-dark">
            <th>#</th>
            <th>Empresa</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Descripción</th>
            <th>Visitas</th>
            <th>Operaciones</th>
        </thead>
        <tbody>
            <?php foreach ($companies as $key => $value)  { ?>
            <tr>
                <td><?php echo $value['id']  ?></td>
                <td><?php echo $value['name']  ?></td>
                <td><?php echo $value['address']  ?></td>
                <td><?php echo $value['phone']  ?></td>
                <td><?php echo $value['description']  ?></td>
                <td><?php echo $value['visits']  ?></td>
                <td>
                    <button type="button" class="btn btn-warning edit">Editar</button>
                    <button type="button" class="btn btn-danger delete">Eliminar</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Altas y cambios </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-company">
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label>Empresa</label>
                            <input id="name" type="text" class="form-control" name="name" required maxlength="60">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Dirección</label>
                            <input id="address" type="text" class="form-control" name="address" required maxlength="80">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Teléfono</label>
                            <input id="phone" type="number" class="form-control" name="phone" required maxlength="10"
                                minlength="10">
                        </div>
                        <div class="col-md-12 mb-6">
                            <label>Descripción</label>
                            <textarea id="description" required class="form-control" rows="1"
                                name="description"></textarea>
                        </div>
                        <input id="visits" name="visits" type="number" value="0" hidden>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>js/datatable.js"></script>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/companies.js"></script>