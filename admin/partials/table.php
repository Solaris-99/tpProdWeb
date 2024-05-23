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
                                <td><a href="<?php echo $url_table ."?edit=".$d['id'] ?>">E</a> <a href="<?php echo $url_table ."?del=".$d['id'] ?>">D</a></td>
                        </tr>
                    <?php endforeach ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>