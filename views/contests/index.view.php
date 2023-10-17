<?php if (!$headless) : ?>

<?php view('partials/head.php', $view_data) ?>
<?php view('partials/nav.php', $view_data) ?>
<?php view('partials/banner.php', $view_data) ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow sm:rounded-md">
            <div>
                <div class="border-b border-gray-300 focus-within:border-indigo-600">
                    <input aria-label="Filter" title="Filter" type="search" name="filter" id="filter" class="block w-full border-0 border-b border-transparent bg-gray-50 focus:border-indigo-600 focus:ring-0 sm:text-sm" placeholder="Filter by name">
                </div>
            </div>

            <ul role="list" id="contest-list" class="divide-y divide-gray-200">
<?php endif; ?><?php foreach ($contests as $contest) : ?>
                <li class="block hover:bg-gray-50">
                    <a href="/contests/<?= $contest['id'] ?>">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <p class="truncate text-sm font-medium text-indigo-600"><?= $contest['name'] ?></p>
                                <?php
                                    if ($contest['status'] === 'Running') {
                                        $status_color = 'bg-green-100 text-green-800';
                                    } else if ($contest['status'] === 'Upcoming') {
                                        $status_color = 'bg-red-100 text-red-800';
                                    } else {
                                        $status_color = 'border-gray-300 text-gray-600 border';
                                    }
                                ?><div class="ml-2 flex flex-shrink-0">
                                    <span
                                        class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 mr-3 <?= $status_color ?>"
                                    ><?= $contest['status'] ?></span>

                                    <div class="mt-2 flex items-center text-sm sm:mt-0">
                                        <!-- Heroicon name: mini/calendar -->
                                        <svg class="mr-1.5 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                                        </svg>
                                        <p>
                                            <time><?= $contest['start_time'] ?></time> — <time><?= $contest['end_time'] ?></time>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-500">
                                        <!-- Heroicon name: mini/user -->
<!--                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor">-->
<!--                                            <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />-->
<!--                                        </svg>-->
                                        Author: <?= $contest['setter'] ?>
                                    </p>
                                </div>
                                <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                    <!-- Heroicon name: mini/clock -->
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                                    </svg>

                                    <time><?= $contest['duration'] ?></time>
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
<?php endforeach; ?><?php if (!$headless) : ?>
            </ul>

            <script>
                const filter = document.getElementById('filter');
                const list = document.querySelector('#contest-list');
                filter.oninput = () => {
                    // list.innerHTML = '<li class="block"><div class="px-4 py-4 sm:px-6"><p class="text-sm text-gray-500" role="status">Loading ...</p></div></li>';
                    const nameQuery = encodeURIComponent(filter.value);
                    fetch(`/contests?name=${nameQuery}&headless`)
                        .then(response => response.text())
                        .then(html => {
                            list.innerHTML = html;
                        });
                }
            </script>
        </div>

        <a href="/contests/new">
            <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-4">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                <span class="mx-2">Create</span>
            </button>
        </a>
    </div>
</main>

<?php view('partials/foot.php') ?>

<?php endif; ?>
