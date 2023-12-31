<!doctype html>
<html lang="en" class="h-full bg-gray-200">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In &mdash; Xjudge</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="h-full">
  <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <a href="/"><img class="mx-auto h-12 w-auto" src="images/logo.svg" alt="Xjudge logo"></a>
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign up for an account</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        Or
        <a href="/signup" class="font-medium text-indigo-600 hover:text-indigo-500">log in to your account</a>
      </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-6" method="post">
          <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <div class="mt-1">
              <input id="username" name="username" type="text" autocomplete="username" required class="block w-full appearance-none rounded-md px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm <?= isset($errors['username']) ? 'border-2 border-red-400 focus:border-red-500' : 'border border-gray-300 focus:border-indigo-500' ?>">
            </div>
              <?php if (isset($errors['username'])) : ?>
                <p class="mt-2 text-sm text-red-600"><?= $errors['username'] ?></p>
              <?php endif; ?>
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
            <div class="mt-1">
              <input id="email" name="email" type="text" autocomplete="email" required class="block w-full appearance-none rounded-md px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm <?= isset($errors['email']) ? 'border-2 border-red-400 focus:border-red-500' : 'border border-gray-300 focus:border-indigo-500' ?>">
            </div>
            <?php if (isset($errors['email'])) : ?>
              <p class="mt-2 text-sm text-red-600"><?= $errors['email'] ?></p>
            <?php endif; ?>
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="mt-1">
              <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full appearance-none rounded-md px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm <?= isset($errors['password']) ? 'border-2 border-red-400 focus:border-red-500' : 'border border-gray-300 focus:border-indigo-500' ?>">
            </div>
            <?php if (isset($errors['password'])) : ?>
              <p class="mt-2 text-sm text-red-600"><?= $errors['password'] ?></p>
            <?php endif; ?>
          </div>

          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Retype password</label>
            <div class="mt-1">
              <input id="password_confirmation" name="password_confirmation" type="password" required class="block w-full appearance-none rounded-md px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm <?= isset($errors['password_confirmation']) ? 'border-2 border-red-400 focus:border-red-500' : 'border border-gray-300 focus:border-indigo-500' ?>">
            </div>
            <?php if (isset($errors['password_confirmation'])) : ?>
              <p class="mt-2 text-sm text-red-600"><?= $errors['password_confirmation'] ?></p>
            <?php endif; ?>
          </div>

          <!--          <div class="flex items-center justify-between">-->
          <!--            <div class="flex items-center">-->
          <!--              <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">-->
          <!--              <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>-->
          <!--            </div>-->
          <!---->
          <!--            <div class="text-sm">-->
          <!--              <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>-->
          <!--            </div>-->
          <!--          </div>-->

          <div>
            <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Create account</button>
          </div>
        </form>

        <div class="mt-6">
          <div class="relative">
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
              <span class="bg-white px-2 text-gray-500">Or</span>
            </div>
          </div>

          <div class="mt-6 grid grid-cols-3 gap-3">
            <div class="col-start-1 col-end-4">
              <a href="<?= $loginUrl() ?>" class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-500 shadow-sm hover:bg-gray-50">
                <img class="h-5 w-5 mr-3" src="/images/google.svg" alt="Google logo">
                Continue with Google
              </a>
            </div>

            <!--            <div>-->
            <!--              <a href="#" class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-500 shadow-sm hover:bg-gray-50">-->
            <!--                <span class="sr-only">Log in with Twitter</span>-->
            <!--                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">-->
            <!--                  <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />-->
            <!--                </svg>-->
            <!--              </a>-->
            <!--            </div>-->

            <!--            <div>-->
            <!--              <a href="#" class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-500 shadow-sm hover:bg-gray-50">-->
            <!--                <span class="sr-only">Log in with GitHub</span>-->
            <!--                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">-->
            <!--                  <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd" />-->
            <!--                </svg>-->
            <!--              </a>-->
            <!--            </div>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
