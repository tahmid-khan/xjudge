<?php
require BASE_PATH . 'views/partials/head.php';
require BASE_PATH . 'views/partials/nav.php';
require BASE_PATH . 'views/partials/banner.php';
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="space-y-8 divide-y divide-gray-200 shadow sm:rounded-lg bg-white px-4 py-5 sm:p-6">
            <form method="post" class="space-y-8 divide-y divide-gray-200">
                <div>
<!--                    <div>-->
<!--                        <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>-->
<!--                        <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>-->
<!--                    </div>-->

                    <div class="mt-1 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Title</label>
                            <div class="mt-1 shadow-sm w-full">
                                <input type="text" name="name" id="name" class="block w-full min-w-0 flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Start time</label>
                            <div class="mt-1">
                                <input id="start_time" type="datetime-local" name="start_time" class="block w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm <?= isset($errors['start_time']) ? 'border-2 border-red-400 focus:border-red-500' : 'border border-gray-300 focus:border-indigo-500' ?>" required>
                                <?php if (isset($errors['start_time'])) : ?>
                                    <p class="mt-2 text-sm text-red-600"><?= $errors['start_time'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="end_time" class="block text-sm font-medium text-gray-700">End time</label>
                            <div class="mt-1">
                                <input id="end_time" type="datetime-local" name="end_time" class="block w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm <?= isset($errors['end_time']) ? 'border-2 border-red-400 focus:border-red-500' : 'border border-gray-300 focus:border-indigo-500' ?>">
                                <?php if (isset($errors['end_time'])) : ?>
                                  <p class="mt-2 text-sm text-red-600"><?= $errors['end_time'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Problems</h3>
                        <p class="mt-1 text-sm text-gray-500">Read the <a href="/help" class="underline hover:no-underline text-indigo-600">help page</a> to learn how to specify problem IDs.</p>
                        <?php if (isset($errors['problem_codes'])) : ?>
                            <p class="mt-2 text-sm text-red-600"><?= $errors['problem_codes'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mt-6">
                        <ol id="problem-code-inputs">
                            <li class="flex items-center mt-1">
                                <div class="flex items-center sm:col-span-2">
                                    <!-- <label for="alias-input-0" class="mr-2">Alias:</label> -->
                                    <div class="flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">Problem A</span>
                                        <input type="text" name="aliases[]" id="alias-input-0"
                                               class="flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm w-full"
                                               placeholder="Alias">
                                    </div>
                                </div>
                                <div class="flex items-center sm:col-span-2 ">
                                    <label for="problem-code-input-0" class="ml-4 mr-2">Problem ID:</label>
                                    <div class="flex items-center rounded-md shadow-sm">
                                        <input type="text" id="problem-code-input-0" name="problem_codes[]" required
                                               class="flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm w-full font-mono">
                                    </div>
                                </div>
                            </li>
                        </ol>

                        <button id="add-problem" type="button"
                                class="inline-flex items-center rounded-full border border-transparent bg-indigo-600 p-1.5 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-4">
                            <!-- Heroicon name: mini/plus -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                        </button>

                        <template id="input-list-item-template">
                            <li class="flex items-center mt-1">
                                <div class="flex items-center sm:col-span-2">
                                    <!-- <label for="alias-input-new" class="mr-2">Alias:</label> -->
                                    <div class="flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">Problem A</span>
                                        <input type="text" name="aliases[]" id="alias-input-new"
                                               class="flex-1 rounded-none rounded-r-md border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm w-full"
                                               placeholder="Alias">
                                    </div>
                                </div>
                                <div class="flex items-center sm:col-span-2 ">
                                    <label for="problem-code-input-new" class="ml-4 mr-2">Problem ID:</label>
                                    <div class="flex items-center rounded-md shadow-sm">
                                        <input type="text" id="problem-code-input-new" name="problem_codes[]" required
                                               class="flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm w-full font-mono">
                                    </div>
                                </div>
                                <button type="button" class="inline-flex items-center rounded-full border border-transparent bg-gray-600 p-1.5 text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 ml-4">
                                    <!-- Heroicon name: mini/x-mark -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </li>
                        </template>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-4">
                        Create
                    </button
                    >
                </div>
            </form>

            <script>
                const inputList = document.querySelector("#problem-code-inputs");
                const template = document.querySelector("#input-list-item-template");

                function addNewProblem(event) {
                    const node = template.content.cloneNode(true);
                    const id = inputList.childElementCount;

                    const labels = node.querySelectorAll("label");
                    labels[0].setAttribute("for", `problem-code-input-${id}`);
                    // labels[1].setAttribute("for", `alias-input-${id}`);

                    const inputs = node.querySelectorAll("input");
                    inputs[1].setAttribute("id", `problem-code-input-${id}`);
                    inputs[1].setAttribute("name", "problem_codes[]");
                    inputs[0].setAttribute("id", `alias-input-${id}`);
                    inputs[0].setAttribute("name", "aliases[]");

                    const problemIndex = node.querySelector("span");
                    problemIndex.innerText = `Problem ${String.fromCharCode(65 + id)}`;

                    const btnDelete = node.querySelector("button");
                    btnDelete.onclick = removeProblem;

                    inputList.appendChild(node);

                    if (inputList.childElementCount === 2) {
                        const li = inputList.querySelector("li");
                        const btn = btnDelete.cloneNode(true);
                        btn.onclick = removeProblem;
                        li.appendChild(btn);
                    }
                }

                function removeProblem(event) {
                    if (inputList.childElementCount === 1) {
                        return;
                    }

                    let li = event.target.parentNode;
                    while (!(li instanceof HTMLLIElement)) {
                        li = li.parentNode;
                    }
                    inputList.removeChild(li);

                    if (inputList.childElementCount === 1) {
                        const button = inputList.querySelector("button");
                        button.parentNode.removeChild(button);
                    }

                    inputList.querySelectorAll("li").forEach((li, index) => {
                        const label = li.querySelector("label");
                        label.setAttribute("for", `problem-code-input-${index}`);

                        const input = li.querySelector("input");
                        input.setAttribute("id", `problem-code-input-${index}`);
                        input.setAttribute("name", "problem_codes[]");
                    });

                    // reassign correct problem indexes
                    const lis = inputList.querySelectorAll("li");
                    lis.forEach((li, index) => {
                        li.querySelector("span").innerText = `Problem ${String.fromCharCode(65 + index)}`;
                    });
                }

                document.querySelector("#add-problem").onclick = addNewProblem;
            </script>
        </div>
    </div>
</main>

</div>
</body>
</html>
