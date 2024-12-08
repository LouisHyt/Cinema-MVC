<?php
use Services\Utils;
if (!empty($data['entity_data'])) : ?>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Jobs</th>
                <th>Birth_date</th>
                <th>Death_date</th>
                <th>Bio</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['entity_data'] as $person) : 
                $person["jobs"] = Utils::getPersonJobs($person);
            ?>
                <tr 
                    data-name="<?= $person["full_name"] ?>"
                    data-entity="<?= $data["entity"] ?>"
                    data-id="<?= $person["id_person"] ?>"
                >
                    <td><?= $person["full_name"] ?></td>
                    <td><?= implode(" & ", $person["jobs"]) ?></td>
                    <td><?= $person["birth_date"] ?></td>
                    <td><?= $person["death_date"] !== null ? $person["death_date"] : "<span class='no-value'>None</span>" ?></td>
                    <td class="field-truncate"><?= $person["bio"] !== null ? substr($person["bio"], 0, 100) : "<span class='no-value'>None</span>" ?></td>
                    <td><?= $person["genre"] ?></td>
                    <td>
                        <a href="./?action=form&entity=<?= $data["entity"] ?>&operation=edit&id=<?= $person["id_person"] ?>" type="button" class="action edit">Edit</a>
                        <a href="./?action=form&entity=<?= $data["entity"] ?>&operation=delete&id=<?= $person["id_person"] ?>" type="button" class="action delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Nobody found.</p>
<?php endif; ?>
