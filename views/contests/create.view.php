<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xjudge</title>
    <link rel="stylesheet" href="/shoyib-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="row mt-3">
                <div class="col-5">
                    <ul class="nav nav-underline nav-fill">
                        <a class="nav-link " aria-current="page" href="index.html">Xjudge</a>
                        <li class="nav-item"><a class="nav-link active" href="contests.php">Contest</a></li>
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
                             <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul> -->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Group</a></li>
                        <li class="nav-item"><a class="nav-link" href="Problem_List.php">Problem</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-12 bg-dark border rounded d-flex flex-row-reverse m-1">

                        <div class="collapse" id="navbarToggleExternalContent">
                            <div class="bg-dark p-4">
                                <h5 class="text-white h4">Collapsed content</h5>
                                <span class="text-muted">Toggleable via the navbar brand.</span>
                            </div>
                        </div>
                        <nav class="navbar navbar-dark bg-dark">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="row p-3 mt-3">
            <div class="col-2">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-tabs me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="window.location.href='http://localhost/php/Xjudge/profile.php?';">Profile</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Settings</button>

                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Standings</button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">

                            <nav id="navbar-example2" class="navbar navbar-light bg-light px-3" aria-orientation="vertical">

                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#scrollspyHeading1">First</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#scrollspyHeading2">Second</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#scrollspyHeading3">Third</a>
                                    </li>
                                </ul>
                            </nav>


                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">Hey hold on</div>
                        <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">...</div>
                    </div>
                </div>
            </div>
            <div class="col-10" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0"  >
                <h1 id="scrollspyHeading1" class="bg-dark text-white p-5 border rounded">Hi ready for Contest</h1>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="container p-3">

                    </div>
                </div>
                <div class="col-10">
                    <div class="container-fluid border shadow rounded p-4">

                        <div class="row">
                            <div class="col-10">
<!--                                <div class="input-group mb-3">-->
<!--                                    <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="basic-addon2">-->
<!--                                    <div class="input-group-append">-->
<!--                                        <button class="btn btn-outline-secondary bg-dark" type="button">Button</button>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <div class="contest_lsit container-fluid mt-2 p-3 border shadow rounded bg-dark text-light text-center">
                            <h1>Create Contest</h1>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="contestName" class="form-label">Contest Name</label>
                                    <input type="text" class="form-control" id="contestName" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="contestStartTime" class="form-label">Start Time</label>
                                    <input type="datetime-local" class="form-control" id="contestStartTime" name="start-time" required>
                                </div>
                                <div class="mb-3">
                                    <label for="contestDuration" class="form-label">End Time</label>
                                    <input type="datetime-local" class="form-control" id="contestDuration" name="end-time" required>
                                </div>
                                <fieldset id="problem-container" class="mb-3">
                                    <legend>Problems</legend>
                                    <button class="btn btn-primary" onclick="addProblem()">Add problem</button>

                                    <div class="problem my-2">
                                        <label>Enter problem IDs</label>
                                        <input type="text" class="form-control" name="problem-ids[]" required>
                                    </div>
                                </fieldset>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const problemContainer = document.querySelector("#problem-container");
                function addProblem() {
                    problemContainer.innerHTML += `
            <div class="problem">
                <input type="text" class="form-control mt-2" name="problem-ids[]" required>
            </div>
        `;
                }
            </script>

            <div class="container">
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                    <div class="col-md-4 d-flex align-items-center">
                        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#333" class="bi bi-xbox" viewBox="0 0 16 16">
                                <path d="M7.202 15.967a7.987 7.987 0 0 1-3.552-1.26c-.898-.585-1.101-.826-1.101-1.306 0-.965 1.062-2.656 2.879-4.583C6.459 7.723 7.897 6.44 8.052 6.475c.302.068 2.718 2.423 3.622 3.531 1.43 1.753 2.088 3.189 1.754 3.829-.254.486-1.83 1.437-2.987 1.802-.954.301-2.207.429-3.239.33Zm-5.866-3.57C.589 11.253.212 10.127.03 8.497c-.06-.539-.038-.846.137-1.95.218-1.377 1.002-2.97 1.945-3.95.401-.417.437-.427.926-.263.595.2 1.23.638 2.213 1.528l.574.519-.313.385C4.056 6.553 2.52 9.086 1.94 10.653c-.315.852-.442 1.707-.306 2.063.091.24.007.15-.3-.319Zm13.101.195c.074-.36-.019-1.02-.238-1.687-.473-1.443-2.055-4.128-3.508-5.953l-.457-.575.494-.454c.646-.593 1.095-.948 1.58-1.25.381-.237.927-.448 1.161-.448.145 0 .654.528 1.065 1.104a8.372 8.372 0 0 1 1.343 3.102c.153.728.166 2.286.024 3.012a9.495 9.495 0 0 1-.6 1.893c-.179.393-.624 1.156-.82 1.404-.1.128-.1.127-.043-.148ZM7.335 1.952c-.67-.34-1.704-.705-2.276-.803a4.171 4.171 0 0 0-.759-.043c-.471.024-.45 0 .306-.358A7.778 7.778 0 0 1 6.47.128c.8-.169 2.306-.17 3.094-.005.85.18 1.853.552 2.418.9l.168.103-.385-.02c-.766-.038-1.88.27-3.078.853-.361.176-.676.316-.699.312a12.246 12.246 0 0 1-.654-.319Z"/>
                            </svg><inline class="h5 p-2">judge</inline>
                        </a>
                        <span class="mb-3 mb-md-0 text-muted ">© 2022 Company, Inc</span>
                    </div>

                    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                        <li class="ms-3"><a class="text-muted" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg></use></svg></a></li>
                        <li class="ms-3"><a class="text-muted" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                </svg></a></li>
                        <li class="ms-3"><a class="text-muted" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg></a></li>
                    </ul>
                </footer>
            </div>
        </div>
        <script>
            window.onmousedown = function (e) {
                var el = e.target;
                if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
                    e.preventDefault();

                    // toggle selection
                    if (el.hasAttribute('selected')) el.removeAttribute('selected');
                    else el.setAttribute('selected', '');

                    // hack to correct buggy behavior
                    var select = el.parentNode.cloneNode(true);
                    el.parentNode.parentNode.replaceChild(select, el.parentNode);
                }
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>