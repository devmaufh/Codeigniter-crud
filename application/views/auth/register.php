<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?php echo base_url('register/save') ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input name="name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Usuario</label>
                    <input name="username" type="text" class="form-control" required>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input name="password" required type="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <span class="text-danger"><?php if(isset($error)) echo $error  ?></span>
        </div>
    </div>
</div>