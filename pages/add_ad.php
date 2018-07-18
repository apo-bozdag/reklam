<form method="post" action="add_ad_post">
    <div class="form-group">
        <label for="adName">Reklam Adı</label>
        <input type="text" class="form-control" id="adName" name="name" required>
    </div>
    <div class="form-group">
        <label for="slot">Reklam Alanı</label>
        <select class="form-control" id="slot" name="slot">
            <?php foreach($slots as $slot): ?>
                <option value="<?php echo $slot['id']; ?>"><?php echo $slot['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="code">Reklam Kodu</label>
        <textarea class="form-control" id="code" name="code" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Ekle</button>
</form>