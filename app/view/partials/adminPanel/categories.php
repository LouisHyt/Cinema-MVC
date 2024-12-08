<?php
if (!empty($data['entity_data'])) : ?>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Movie count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['entity_data'] as $category) : ?>
                <tr 
                    data-id="<?= $category["id_category"] ?>" 
                    data-name="<?= $category["label"] ?>"
                    data-entity="<?= $data["entity"] ?>"
                >
                    <td><?= $category["label"] ?></td>
                    <td><?= $category["movies_in"] ?></td>
                    <td>
                        <a href="./?action=form&entity=<?= $data["entity"] ?>&operation=edit&id=<?= $category["id_category"] ?>" type="button" class="action edit">Edit</a>
                        <a href="./?action=form&entity=<?= $data["entity"] ?>&operation=delete&id=<?= $category["id_category"] ?>" type="button" class="action delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>No category found</p>
<?php endif; ?>
