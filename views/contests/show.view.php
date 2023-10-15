<?php view('partials/head.php', ['page_title' => "Contest: {$contest['name']} — Xjudge"]) ?>
<?php view('partials/nav.php') ?>
<?php view('partials/banner.php', ['banner_header' => "{$contest['name']}"]) ?>

<main>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900 text-center mt-8"><time>Time Left</time></h1>
<!--                <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>-->
            </div>
<!--            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">-->
<!--                <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add user</button>-->
<!--            </div>-->
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">User</th>
                                <?php foreach ($problems as $problem) : ?>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        <a href="<?= "/contests/{$contest['id']}/problems/{$problem['ordinal_letter']}" ?>"><?= $problem['ordinal_letter'] ?></a>
                                    </th>
                                <?php endforeach; ?>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 bg-white">
                            <?php foreach ($users_solves as $user_id => $user_solves) : ?>
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><?= $users_names[$user_id] ?></td>
                                <?php foreach ($problems as $problem) : ?>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <?= in_array($problem['ordinal_letter'], $user_solves) ? '✅' : '' ?>
                                    </td>
                                <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>

                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php view('partials/foot.php') ?>
