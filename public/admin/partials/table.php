<div class="card shadow mb-4" data-bs-theme="dark">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo ucfirst($tablename) ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <?php foreach ($columns as $col): ?>
                            <th><?php echo $col ?></th>
                            <?php endforeach ?>
                            <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <?php foreach ($columns as $col): ?>
                            <th><?php echo $col ?></th>
                            <?php endforeach ?>
                            <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data as $d): ?>
                        <tr>
                            <?php foreach ($d as $val): ?>
                                <td><?php echo $val ?></td>
                                <?php endforeach ?>
                                <td>
                                    <form action="<?php echo $url_table?>" class='d-inline' METHOD='POST'>
                                        <input type="hidden" id='edit' name='edit' value='<?php echo $d["id"];?>'>
                                        <input type="submit" class ='btn btn-warning btn-circle btn-sm text-dark' value='M'>
                                    </form>
                                    <form action="<?php echo $url_table?>" class='d-inline' METHOD='POST'>
                                        <input type="hidden" id='del' name='del' value='<?php echo $d["id"];?>'>
                                        <input type="submit" class='btn btn-danger btn-circle btn-sm' value='D'>
                                    </form>
                                </td>

                        </tr>
                    <?php endforeach ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>