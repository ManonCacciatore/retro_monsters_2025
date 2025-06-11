                <select name="rarete" class="w-full p-2 mb-4 bg-gray-800 rounded">
                    <option value="" disabled selected>Choisir une rareté</option>
                    <?php
                    include_once '../app/models/raretiesModel.php';
                    $rareties = \App\Models\RaretiesModel\findAll($connexion);
                    foreach ($rareties as $rarety): ?>
                        <option value="<?php echo $rarety['name']; ?>">
                            <?php echo ucfirst($rarety['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>