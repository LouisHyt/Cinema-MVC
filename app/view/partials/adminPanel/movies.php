<?php
use Services\Utils;
if (!empty($data['entity_data'])) : ?>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Director</th>
                <th>Release Date</th>
                <th>Duration</th>
                <th>Note</th>
                <th>Synopsis</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['entity_data'] as $movie) : ?>
                <tr data-name="<?= $movie["title"] ?>">
                    <td><?= $movie["title"] ?></td>
                    <td><?= $movie["director_name"] ?></td>
                    <td><?= $movie["release_date"] ?></td>
                    <td><?= $movie["duration"] ?> min</td>
                    <td><?= $movie["note"] ?>/5</td>
                    <td class="field-truncate"><?= substr($movie["synopsis"], 0, 100) ?>...</td>
                    <td>
                        <a href="index.php?action=editMovie&id=<?= $movie["id_movie"] ?>" class="action edit">Edit</a>
                        <a href="index.php?action=deleteMovie&id=<?= $movie["id_movie"] ?>" class="action delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Nobody found</p>
<?php endif; ?>
