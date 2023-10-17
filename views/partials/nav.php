<?php

function menu_attrs(bool $is_selected): string
{
    // Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white"
    return $is_selected
        ? 'class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page"'
        : 'class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"';
}

function mobile_menu_attrs(bool $is_selected): string
{
    // Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white"
    return $is_selected
        ? 'class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page"'
        : 'class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"';
}

function if_signed_in_else(string $then_html, string $else_html)
{
    return isset($_SESSION['user_id']) ? $then_html : $else_html;
}

?><nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/"><img class="h-8 w-8" src="/images/logo.svg" alt="Xjudge Logo"></a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" <?= menu_attrs($current_in_nav == 'home') ?>>Home</a>
                        <a href="/contests" <?= menu_attrs($current_in_nav == 'contests') ?>>Contests</a>
                        <a href="/about" <?= menu_attrs($current_in_nav == 'about') ?>>About</a>
                        <a href="/help" <?= menu_attrs($current_in_nav == 'help') ?>>Help</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!--                        <button type="button"-->
                    <!--                                class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">-->
                    <!--                            <span class="absolute -inset-1.5"></span>-->
                    <!--                            <span class="sr-only">View notifications</span>-->
                    <!--                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"-->
                    <!--                                 aria-hidden="true">-->
                    <!--                                <path stroke-linecap="round" stroke-linejoin="round"-->
                    <!--                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />-->
                    <!--                            </svg>-->
                    <!--                        </button>-->

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <?= if_signed_in_else(
                            '
                            <div>
                                <button type="button"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                         src="/images/photo.avif"
                                         alt="Portrait">
                                </button>
                            </div>

                            <!--
                              Dropdown menu, show/hide based on menu state.

                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                   tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                   tabindex="-1" id="user-menu-item-2">Sign out</a>
                            </div>
',
                            '
                            <div>
                                <a href="/login">
                                    <button type="button"
                                            class="
                                                hover:bg-gray-900 hover:text-white hover:rounded-md hover:px-3 hover:py-2 hover:text-sm hover:font-medium
                                                text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium
                                            "
                                            id="sign-in-button"
                                        >Sign in</button
                                    >
                                </a>
                            </div>
'
                        ) ?>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="/" <?= mobile_menu_attrs($current_in_nav == 'home') ?>>Home</a>
            <a href="/contests" <?= mobile_menu_attrs($current_in_nav == 'contests') ?>>Contests</a>
            <a href="/about" <?= mobile_menu_attrs($current_in_nav == 'about') ?>>About</a>
            <a href="/help" <?= mobile_menu_attrs($current_in_nav == 'help') ?>>Help</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <?= if_signed_in_else('
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                         src="/images/photo.avif"
                         alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                    <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                </div>
                <!--                    <button type="button"-->
                <!--                            class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">-->
                <!--                        <span class="absolute -inset-1.5"></span>-->
                <!--                        <span class="sr-only">View notifications</span>-->
                <!--                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"-->
                <!--                             aria-hidden="true">-->
                <!--                            <path stroke-linecap="round" stroke-linejoin="round"-->
                <!--                                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />-->
                <!--                        </svg>-->
                <!--                    </button>-->
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="/profile"
                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                    Profile</a>
                <a href="/logout"
                   class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                    out</a>
            </div>
', '
                            <div>
                                <button type="button"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                    >Sign in</button
                                >
                            </div>
') ?>
        </div>
    </div>
</nav>
