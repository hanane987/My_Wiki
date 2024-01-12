<?php ob_start(); ?>

<body class="bg-gray-100">
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add wiki</h2>
            <form action="index.php?action=add_wiki" method="post">

                <div class="grid gap-4 mb-4">
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wiki title</label>
                        <input type="text" name="title" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Category name" required>
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wiki content</label>
                        <input type="text" name="content" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Category name" required>
                    </div>
                    <div>
    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wiki category</label>
    <select type="text" name="categoryid" id="categoryid"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Category name" required>
        <?php foreach ($categories as $category) : ?>
            <option value="<?= $category->getCategoryID(); ?>">
                <?= $category->getName(); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>



                    
                </div>
                <div class="flex items-center">
                    <button type="submit"
                        class="bg-yellow-500 text-white hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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
