<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col" width="60%">İsmi</th>
        <th scope="col">Slot</th>
        <th scope="col">İşlem</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($ads as $slot): ?>
        <tr>
            <th scope="row"><?php echo $slot['id']; ?></th>
            <td><?php echo $slot['name']; ?></td>
            <td><?php echo $slot['category']; ?></td>
            <td>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $slot['id']; ?>">Kodu Göster</a>
                <a href="" class="btn btn-success">Düzenle</a>
                <a href="" class="btn btn-danger">Sil</a>
            </td>
        </tr>
        <div class="modal fade" id="modal<?php echo $slot['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reklam Kodu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        kod <?php echo $slot['id']; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </tbody>
</table>
