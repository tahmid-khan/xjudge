<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $contest_name ?> &mdash; Xjudge</title>
  <meta name="description" content="<?= $page_descr
      ?? 'Xjudge is a virtual judge system and contest hosting platform for algorithmic programming contests.' ?>">

  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="/styles.css">
</head>
<body class="h-full sm:grid sm:grid-cols-[20rem_auto]">
  <header class="relative sm:col-span-1 h-16 bg-white sm:bg-inherit flex flex-shrink-0 items-center">
    <!-- Logo area -->
    <div class="sm:hidden absolute inset-y-0 left-0 md:static md:flex-shrink-0">
      <a href="/"
         class="flex h-16 w-16 items-center justify-center focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:w-20">
        <img class="h-8 w-auto" src="/images/logo.svg" alt="Xjudge logo">
      </a>
    </div>

    <!-- Clock area -->
    <div class="sm:hidden mx-auto text-lg clock">
      --:--:--
    </div>

    <!-- Menu button area -->
    <div class="sm:hidden absolute inset-y-0 right-0 flex items-center pr-4 sm:pr-6 md:hidden">
      <!-- Mobile menu button -->
      <button
        id="menu_expander" type="button" aria-expanded="false" aria-controls="menu"
        class="
          -mr-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600
        "
      >
        <span class="sr-only">Open main menu</span>
        <!-- Heroicon name: outline/bars-3 -->
        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>

    <!-- Mobile menu, show/hide this `div` based on menu open/closed state -->
    <div id="menu_container" class="relative hidden sm:block -z-10 sm:z-10" role="dialog" aria-modal="true">
      <div class="fixed inset-0">
        <!--
          Mobile menu, toggle classes based on menu state.

          Entering: "transition ease-out duration-150 sm:ease-in-out sm:duration-300"
            From: "transform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100"
            To: "transform opacity-100 scale-100  sm:translate-x-0 sm:scale-100 sm:opacity-100"
          Leaving: "transition ease-in duration-150 sm:ease-in-out sm:duration-300"
            From: "transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
            To: "transform opacity-0 scale-110  sm:translate-x-full sm:scale-100 sm:opacity-100"
        -->
        <div id="menu" class="h-full w-full top-0 sm:inset-y-0 sm:right-auto sm:left-0 sm:w-full sm:max-w-xs shadow-lg sm:shadow-none hidden sm:block bg-white sm:bg-gray-50" aria-label="Global">
          <div class="flex h-16 items-center justify-between px-4 sm:px-6 sm:hidden">
            <a href="#">
              <img class="block h-8 w-auto" src="/images/logo.svg" alt="Xjudge logo">
            </a>
            <button id="menu_closer" type="button" class="-mr-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600">
              <span class="sr-only">Close main menu</span>
              <!-- Heroicon name: outline/x-mark -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <!--      <div class="max-w-8xl mx-auto mt-2 px-4 sm:px-6">-->
          <!--        <div class="relative text-gray-400 focus-within:text-gray-500">-->
          <!--          <label for="mobile-search" class="sr-only">Search all inboxes</label>-->
          <!--          <input id="mobile-search" type="search" placeholder="Search all inboxes" class="block w-full rounded-md border-gray-300 pl-10 placeholder-gray-500 focus:border-indigo-600 focus:ring-indigo-600">-->
          <!--          <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-3">-->
          <!--            &lt;!&ndash; Heroicon name: mini/magnifying-glass &ndash;&gt;-->
          <!--            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
          <!--              <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />-->
          <!--            </svg>-->
          <!--          </div>-->
          <!--        </div>-->
          <!--      </div>-->
          <div class="max-w-8xl mx-auto py-3 px-2 sm:px-4 text-center sm:pt-8">
            <h1 class="text-2xl mb-5"><?= $contest_name ?></h1>
            <span
              class="
              block rounded-md px-3
              text-xs font-medium text-gray-700 uppercase
              clock-label
            "
            >Time</span>
            <span
              class="
                block py-2 px-3 font-medium text-gray-800
                text-4xl
                clock
              "
            >--:--:--</span>
          </div>
          <div class="border-t border-gray-200 pt-4 pb-3">
            <div class="max-w-8xl mx-auto space-y-1 px-2 sm:px-4">
              <a href="/contests/<?= $contest_id ?>/scoreboard" class="rounded-md py-2 px-3 text-base font-medium text-gray-800 hover:bg-white flex items-center">
                <!-- Heroicon name: outline/chart-bar -->
                <svg class="text-gray-500 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                </svg>
                Scoreboard
              </a>
              <a href="/contests/<?= $contest_id ?>/problems" class="rounded-md py-2 px-3 text-base font-medium text-gray-800 bg-gray-200 flex items-center">
                <svg class="text-gray-500 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 01-.657.643 48.39 48.39 0 01-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 01-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 00-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 01-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 00.657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 005.427-.63 48.05 48.05 0 00.582-4.717.532.532 0 00-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 00.658-.663 48.422 48.422 0 00-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 01-.61-.58v0z" />
                </svg>
                Problems
              </a>
              <a href="/contests/<?= $contest_id ?>/submissions" class="rounded-md py-2 px-3 text-base font-medium text-gray-800 hover:bg-white flex items-center">
                <svg class="text-gray-500 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                </svg>
                Results
              </a>
            </div>
          </div>
          <div class="block border-t border-gray-200 pt-4 pb-3">
            <div class="max-w-8xl mx-auto space-y-1 px-2 sm:px-4">
              <span
                class="
                  block rounded-md py-2 px-3
                  text-xs font-medium text-gray-700 uppercase
                "
              >Problems</span>
                <?php $user_status = $statuses[$_SESSION['user_id']]; ?>
                <?php for ($i = 0; $i < $problem_count; $i++): ?>
                <?php
                $letter = chr(ord('A') + $i);
                $is_attemted = isset($user_status[$i]);
                $is_solved = $is_attemted && $user_status[$i]['is_accepted'];
                ?>
              <a href="/contests/<?= $contest_id ?>/problems/<?= $letter ?>" class="rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-800 hover:bg-gray-100 flex items-center">
                  <?php if ($is_solved) : ?>
                    <span class="text-green-500 mr-4">✓</span
                    ><?php elseif ($is_attemted) : ?>
                    <span class="text-red-500 mr-4">✘</span
                    ><?php else : ?>
                    <span class="mr-4">🞐</span
                    ><?php endif ?><?= $letter ?>
                  <?php endfor; ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="relative w-full h-full sm:z-50">
    <div
      id="problem_text_area"
      class="
        absolute top-0 left-0
        w-full h-full p-4
        lg:flex lg:items-center lg:justify-between
      "
    >
      <div class="min-w-0 flex-1r w-full h-full">
        <nav class="hidden sm:flex" aria-label="Breadcrumb">
          <ol role="list" class="flex items-center space-x-4">
            <li>
              <div class="flex">
                <a href="/"><img src="/images/logo.svg" alt="Xjudge logo" class="inline w-6 h-auto"></a>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                <!-- Heroicon name: mini/chevron-right -->
                <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                <a href="/contests" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Contests</a>
              </div>
            </li>
            <li>
              <div class="flex items-center">
                <!-- Heroicon name: mini/chevron-right -->
                <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                <a href="/contests/<?= $contest_id ?>" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"><?= $contest_name ?></a>
              </div>
            </li>
          </ol>
        </nav>

        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
          <div class="overflow-hidden bg-white shadow sm:rounded-md">
            <ul role="list" class="divide-y divide-gray-200"><?php foreach ($problems as $problem) : ?>
                <li>
                  <a href="<?= "/contests/{$contest['id']}/problems/{$problem['problem_index']}" ?>" class="block hover:bg-gray-50">
                    <div class="px-4 py-4 sm:px-6">
                      <div class="flex items-center justify-between">
                        <p class="truncate text-sm font-medium text-indigo-600"><?= $problem['problem_index'] . '. ' . $problem['title'] ?></p>
                        <!--                                    <div class="ml-2 flex flex-shrink-0">-->
                        <!--                                        <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800 mr-3">Full-time</span>-->
                        <!---->
                        <!--                                        <div class="mt-2 flex items-center text-sm sm:mt-0">-->
                        <!-- Heroicon name: mini/calendar -->
                        <!--                                            <svg class="mr-1.5 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
                        <!--                                                <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />-->
                        <!--                                            </svg>-->
                        <!--                                            <p>-->
                        <!--                                                <time>--><?php //= $problem['start_time'] ?><!--</time> — <time>--><?php //= $problem['end_time'] ?><!--</time>-->
                        <!--                                            </p>-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="mt-2 sm:flex sm:justify-between">-->
                        <!--                                    <div class="sm:flex">-->
                        <!--                                        <p class="flex items-center text-sm text-gray-500">-->
                        <!-- Heroicon name: mini/users -->
                        <!--                                            <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
                        <!--                                                <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />-->
                        <!--                                            </svg>-->
                        <!--                                            --><?php //= $problem['setter'] ?>
                        <!--                                        </p>-->
                        <!--                                    </div>-->
                        <!--                                    <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">-->
                        <!-- Heroicon name: mini/map-pin -->
                        <!--                                    <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
                        <!--                                        <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />-->
                        <!--                                    </svg>-->
                        <!--                                        Duration <time>--><?php //= $problem['duration'] ?><!--</time>-->
                        <!--                                    </p>-->
                      </div>
                    </div>
                  </a>
                </li>
                <?php endforeach; ?></ul>
          </div>
        </div>
      </div>

    </div>
    <!--    <div-->
    <!--      id="editor_toggle"-->
    <!--      aria-expanded="false"-->
    <!--      aria-controls="editor_area"-->
    <!--      class="-->
    <!--        absolute top-1/2 bottom-1/2 left-auto right-0-->
    <!--        transition-all duration-75 w-0 aria-expanded:w-32-->
    <!--        z-20-->
    <!--      "-->
    <!--    >-->
    <!--      <button-->
    <!--        class="-->
    <!--          absolute top-1/2 bottom-1/2 -left-8-->
    <!--          bg-blue-900 h-16 w-16 rounded-full-->
    <!--        "-->
    <!--      >Open editor</button>-->
    <!--    </div>-->
    <!--    <div-->
    <!--      id="editor_area"-->
    <!--      class="-->
    <!--        absolute top-0 right-0-->
    <!--        bg-gray-500 text-white h-full-->
    <!--        transition-all duration-75 w-0-->
    <!--      "-->
    <!--    >-->
    <!--      <div>code editor</div>-->
    <!--    </div>-->
  </main>
  <!--  <nav-->
  <!--    id="problems_nav_mobile"-->
  <!--    class="-->
  <!--        sm:hidden absolute bottom-0-->
  <!--        flex flex-col-->
  <!--        w-full bg-white drop-shadow-[0_-1px_1px_rgb(0,0,0,0.1)]-->
  <!--        z-20-->
  <!--      "-->
  <!--  >-->
  <!--    <ol-->
  <!--      id="problems_menu_mobile"-->
  <!--      role="menu"-->
  <!--      class="-->
  <!--          overflow-auto-->
  <!--          w-full mx-auto max-w-3xl space-y-1 px-2 sm:px-4 bg-inherit-->
  <!--          transition-all duration-75 origin-bottom max-h-0-->
  <!--        "-->
  <!--    >-->
  <!--      <li role="none"><a role="menuitem" href="#" class="bg-indigo-50 text-indigo-600 block rounded-md py-2 px-3 text-base font-medium">A</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--      <li role="none"><a role="menuitem" href="#" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">B</a></li>-->
  <!--    </ol>-->
  <!--    <button-->
  <!--      id="problems_menu_toggle"-->
  <!--      aria-expanded="false"-->
  <!--      aria-controls="problems_menu_mobile"-->
  <!--      class="bg-inherit h-10"-->
  <!--    >Problems</button>-->
  <!--  </nav>-->

  <script>
    const pad = (t) => {
      const s = String(t);
      return s.length < 2 ? "0" + s : s;
    };

    const endTime = new Date("<?= $end_time ?>").getTime();
    const startTime = new Date("<?= $start_time ?>").getTime();
    const clockLabels = document.querySelectorAll(".clock-label");
    const clocks = document.querySelectorAll(".clock");

    setInterval(function () {
      const now = new Date().getTime();

      if (now < startTime) {
        clockLabels.forEach((el) => {
          el.innerHTML = "Starts in";
        });
        clocks.forEach((el) => {
          // Find the distance between now and the count down date
          let distance = startTime - now;

          // Time calculations for days, hours, minutes and seconds
          let days = Math.floor(distance / (1000 * 60 * 60 * 24));
          let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          let seconds = Math.floor((distance % (1000 * 60)) / 1000);

          el.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s `;
        });
      } else {
        // Find the distance between now and the count down date
        let distance = endTime - now;

        // Time calculations for days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        clockLabels.forEach((el) => {
          el.innerHTML = distance < 0 ? "The contest has ended" : "Ends in";
        });
        clocks.forEach((el) => {
          el.innerHTML = distance < 0
            ? "Final results"
            : `<time datetime="PT${hours}H${minutes}M${seconds}S">${hours}:${pad(minutes)}:${pad(seconds)}</time>`;
        });
      }
    }, 1000);

    const menu_container = document.getElementById("menu_container");
    const menu = document.getElementById("menu");
    const menu_expander_button = document.getElementById("menu_expander");
    const menu_closer_button = document.getElementById("menu_closer");
    menu_expander_button.onclick = () => {
      menu_expander_button.setAttribute("aria-expanded", "true");
      menu_container.classList.remove("hidden");
      menu.classList.remove("hidden");
      menu_container.classList.remove("-z-10");
      menu_container.classList.add("z-30");
    };
    menu_closer_button.onclick = () => {
      menu_expander_button.setAttribute("aria-expanded", "false");
      menu_container.classList.add("hidden");
      menu.classList.add("hidden");
      menu_container.classList.add("-z-10");
      menu_container.classList.remove("z-30");
    };
  </script>
</body>
</html>
