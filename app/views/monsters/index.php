<section class="mb-20">
    <h2 class="text-2xl font-bold mb-4 creepster">
        Derniers monstres ajoutés
    </h2>
    <?php include '../app/views/monsters/_index.php' ?>
</section>
<?php if ($totalPages > 1): ?>
    <div class="flex justify-center gap-2 mt-6">
        <?php
        $queryParams = [];
        if (!empty($_GET['type'])) $queryParams['type'] = $_GET['type'];
        if (!empty($_GET['rarete'])) $queryParams['rarete'] = $_GET['rarete'];

        for ($i = 1; $i <= $totalPages; $i++):
            $queryParams['page'] = $i;
            $url = 'index.php?monsters=index&' . http_build_query($queryParams);
        ?>
            <a href="<?= $url ?>"
                class="px-3 py-1 rounded <?= ($i == $page) ? 'bg-red-500 text-white' : 'bg-gray-300' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>
<?php endif; ?>