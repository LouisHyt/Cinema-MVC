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
            <?php foreach ($data['entity_data'] as $movie) : 
               $movie["duration"] = Utils::formatDuration($movie["duration"]); 
            ?>
                <tr 
                    data-name="<?= $movie["title"] ?>"
                    data-entity="<?= $data["entity"] ?>"
                    data-id="<?= $movie["id_movie"] ?>"
                >
                    <td><?= $movie["title"] ?></td>
                    <td><?= $movie["director_name"] !== null ? $movie["director_name"] : "<span class='no-value'>Not specified</span>" ?></td>
                    <td><?= $movie["release_date"] ?></td>
                    <td><?= $movie["duration"] ?>min</td>
                    <td><?= $movie["note"] ?>/5</td>
                    <td class="field-truncate"><?= substr($movie["synopsis"], 0, 100) ?>...</td>
                    <td>
                        <a href="./?action=form&entity=<?= $data["entity"] ?>&operation=edit&id=<?= $movie["id_movie"] ?>" type="button" class="action edit">Edit</a>
                        <a href="./?action=form&entity=<?= $data["entity"] ?>&operation=delete&id=<?= $movie["id_movie"] ?>" type="button" class="action delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>No movie found</p>
<?php endif; ?>
