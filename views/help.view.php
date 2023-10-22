<?php view('partials/head.php', $view_data) ?>
<?php view('partials/nav.php', $view_data) ?>
<?php view('partials/banner.php', $view_data) ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 mb-4">Adding problems</h2>
        <p>
            Use this format for specifying Codeforces problems: ‘〈<span class="italic">contest ID</span>〉<code class="font-mono">/</code>〈<span class="italic">problem index</span>〉’.
            For example, <code class="font-mono">44/A</code>.
        </p>
    </div>
</main>

<?php view('partials/foot.php') ?>
