<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">İsmi</th>
        <th scope="col">İşlem</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($slots as $slot): ?>
        <tr>
            <th scope="row"><?php echo $slot['id']; ?></th>
            <td><?php echo $slot['name']; ?></td>
            <td>
                <a href="" class="btn btn-danger">Sil</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
