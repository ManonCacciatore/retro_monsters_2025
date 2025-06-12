<section class="mb-20">
    <h2 class="text-2xl font-bold mb-4 creepster">
        Derniers monstres ajoutés
    </h2>
    <?php include '../app/views/monsters/_index.php' ?>
</section>
<div class="flex justify-center mt-8">
    <nav class="flex space-x-2">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?monsters=index&page=<?php echo $i; ?>"
                class="px-4 py-2 rounded <?php echo ($i == $page) ? 'bg-red-600 text-white' : 'bg-gray-300 text-gray-700'; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </nav>
</div>