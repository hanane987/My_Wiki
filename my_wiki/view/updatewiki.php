<?php
ob_start();
?>

<body class="bg-gray-100">
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update wiki</h2>
            <form action="index.php?action=update_wiki" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-1 sm:gap-6 sm:mb-5">
                <div class="w-full">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="wikiId"  value="<?= $wiki->  getWikiId() ?>" class="form-input" placeholder="duree" required>
                    </div>
                    <div class="w-full">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title"  value="<?= $wiki->  getTitle() ?>" class="form-input" placeholder="duree" required>
                    </div>
                    <div class="w-full">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                        <input type="text" name="content"  value="<?= $wiki->getContent() ?>" class="form-input" placeholder="duree" required>
                    </div>
                    <div class="w-full">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select type="text" name="categoryid"   class="form-input" placeholder="duree" required>
                        <?php  foreach($categories as $category): ?>
                            <option value ="<?= $category->getCategoryID();?>">
                                <?= $category->getName();?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="bg-yellow-500 text-blue-900 py-2 px-4 rounded-full hover:bg-yellow-600 focus:outline-none focus:ring focus:border-yellow-300">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

<?php
$content = ob_get_clean();
include_once 'layout.php';
?>
