                <select name="type" class="w-full p-2 mb-4 bg-gray-800 rounded">
                    <option value="" disabled selected>Choisir un type</option>
                    <?php
                    include_once '../app/models/typesModel.php';
                    $types = \App\Models\TypesModel\findAll($connexion);
                    foreach ($types as $type): ?>
                        <option value="<?php echo $type['name']; ?>">
                            <?php echo ucfirst($type['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>