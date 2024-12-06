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
                <tr data-name="<?= $category["label"] ?>">
                    <td><?= $category["label"] ?></td>
                    <td><?= $category["movies_in"] ?></td>
                    <td>
                        <a href="" class="action edit">Edit</a>
                        <a href="" class="action delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>No category found</p>
<?php endif; ?>
