<form method="POST" action="/delete">
    <label for="delete">
        <span class="icon has-text-danger">
            <i class="fas fa-trash-alt"></i>
        </span>
        <input id="delete" name='delete' type="submit" value="<?= $skill->id ?>" hidden>
    </label>
</form>