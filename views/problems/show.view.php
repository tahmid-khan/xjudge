<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xjudge</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>

        .problem {
            font-family: "STIX Two Text", "XITS", "Noto Serif", Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
        }

        .problem h1, .problem h3, .problem .resource-limits {
            font-family: sans-serif;
        }

        math {
            /* color: red; */
            font-family: "STIX Two Math", "XITS Math", CMSY10, CMEX10, Symbol, Times, math;
            font-style: normal;
        }

        #source-code {
            font-family: "Courier New", Courier, monospace;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="row mt-3">
                <div class="col-5">
                    <ul class="nav nav-underline nav-fill">
                        <li class="nav-item"><a class="nav-link" href="index.php">Xjudge</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="contests.php">Contests</a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    </ul>
                </div>

                <div class="col-4">

                </div>
                <div class="col-2 d-flex flex-row-reverse">
                    <a class="nav-link" aria-current="page" href="login.html">Logout</a>
                </div>
            </div>
            <div class="col-1"></div>
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
                            <button type="button" class="btn btn-primary btn-lg navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </nav>
                </div>
            </div>

        </header>
        <div class="row container-fluid p-3 ">
            <div class="col-3">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-5">
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><a href="overview.html">Overview</a></button>
                                <!-- <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><a href="status.html">Status</a></button> -->
                                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><a href="standings.html">Standings</a></button>
                                <button class="nav-link active" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><a href="problems.html">Problems</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="tab-content col-sm-5 col-md-5 col-lg-6" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">

                            <nav id="navbar-example2" class="navbar navbar-light bg-light" aria-orientation="vertical">

                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#scrollspyHeading1">First</a>
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
        </div>


        <div class="row">

            <div class="col-3">
                <div class="row m-1">
                    <button type="button" class="btn btn-primary btn-lg btn-block mb-1">Submit</button></div>
                <div class="border shadow p-1 mb-1 bg-white rounded">
                   <pre>
                    Time Limit               1000ms
                    Mem Limit                263144kB
                    OS                       Windows
                    Source                   ICPC 2012
                    Spoiler                  Hide
                   </pre>
                </div>
                <div class="border shadow p-1 mb-1 bg-white rounded">
                    <pre>
                     User                     227/236
                                              230/?
                    </pre>
                </div>
            </div>


            <div class="col-9 overflow-auto h-50  Statement">

                <div class="container-fluid border shadow p-3 mb-5 bg-white rounded" id="scrollspyHeading1">	<div class="p-5 text-light problem bg-dark">
                        <?php


//                        // Parse the JSON data
//                        $sampleTestsInput = json_decode($problem['sample_tests_input'], true);
//                        $sampleTestsOutput = json_decode($problem['sample_tests_output'], true);

                        // Generate HTML content based on the parsed data
                        $html = '<div>';
                        $html .= $problem['title'].'<br>';
                        $html.= $problem['time_limit'].'<br>';
//                        $html.= $problem['memory_limit'].'<br>';
                        $html.= $problem['statement'].'<br>';
                        $html.= $problem['input_spec'].'<br>';
                        $html.= $problem['output_spec'].'<br>';
                        $html.= $problem['samples'].'<br>';
                        // Loop through the sample tests and create HTML for each
//                        foreach ($sampleTestsInput as $index => $input) {
//                            $html .= '<div class="sample-test">';
//                            $html .= '<h3>Sample Test ' . ($index + 1) . '</h3>';
//                            $html .= '<h4>Input:</h4>';
//                            $html .=  htmlspecialchars($input) ;
//                            $html .= '<h4>Output:</h4>';
//                            $html .=  htmlspecialchars($sampleTestsOutput[$index]);
//                            $html .= '</div>';
//                        }
                        $html.= $problem['note'].'<br>';
                        $html .= '</div>';

                        // Display the HTML content
                        echo $html;

                        ?>
                        This code assumes that you have a problems table with columns sample_tests_input and sample_tests_output, where JSON data is stored. Make sure to replace 'your_host', 'your_database', 'your_username', and 'your_password' with your actual database connection details. Also, replace :problemId with the specific problem ID you want to retrieve.

                        This code retrieves the JSON data from the database, parses it, and generates HTML content for displaying sample tests. You can customize the HTML structure as needed to match your design.








                    </div>
                </div><br/>

            </div>
            <hr>


            <form method="post">
                <label>
                    <span>Language</span>
                    <select name="language-id">
                        <option value="43">GNU GCC C11 5.1.0</option>
                        <option value="80">Clang++20 Diagnostics</option>
                        <option value="52">Clang++17 Diagnostics</option>
                        <option value="50">GNU G++14 6.4.0</option>
                        <option value="54">GNU G++17 7.3.0</option>
                        <option value="73">GNU G++20 11.2.0 (64 bit, winlibs)</option>
                        <option value="59">Microsoft Visual C++ 2017</option>
                        <option value="61">GNU G++17 9.2.0 (64 bit, msys 2)</option>
                        <option value="65">C# 8, .NET Core 3.1</option>
                        <option value="79">C# 10, .NET SDK 6.0</option>
                        <option value="9">C# Mono 6.8</option>
                        <option value="28">D DMD32 v2.105.0</option>
                        <option value="32">Go 1.19.5</option>
                        <option value="12">Haskell GHC 8.10.1</option>
                        <option value="60">Java 11.0.6</option>
                        <option value="74">Java 17 64bit</option>
                        <option value="87">Java 21 64bit</option>
                        <option value="36">Java 1.8.0_241</option>
                        <option value="77">Kotlin 1.6.10</option>
                        <option value="83">Kotlin 1.7.20</option>
                        <option value="19">OCaml 4.02.1</option>
                        <option value="3">Delphi 7</option>
                        <option value="4">Free Pascal 3.0.2</option>
                        <option value="51">PascalABC.NET 3.8.3</option>
                        <option value="13">Perl 5.20.1</option>
                        <option value="6">PHP 8.1.7</option>
                        <option value="7">Python 2.7.18</option>
                        <option value="31">Python 3.8.10</option>
                        <option value="40">PyPy 2.7.13 (7.3.0)</option>
                        <option value="41">PyPy 3.6.9 (7.3.0)</option>
                        <option value="70">PyPy 3.9.10 (7.3.9, 64bit)</option>
                        <option value="67">Ruby 3.2.2</option>
                        <option value="75">Rust 1.72.0 (2021)</option>
                        <option value="20">Scala 2.12.8</option>
                        <option value="34">JavaScript V8 4.8.0</option>
                        <option value="55">Node.js 12.16.3</option>
                        <option value="14">ActiveTcl 8.5</option>
                        <option value="15">Io-2008-01-07 (Win32)</option>
                        <option value="17">Pike 7.8</option>
                        <option value="18">Befunge</option>
                        <option value="22">OpenCobol 1.0</option>
                        <option value="25">Factor</option>
                        <option value="26">Secret_171</option>
                        <option value="27">Roco</option>
                        <option value="33">Ada GNAT 4</option>
                        <option value="38">Mysterious Language</option>
                        <option value="39">FALSE</option>
                        <option value="44">Picat 0.9</option>
                        <option value="45">GNU C++11 5 ZIP</option>
                        <option value="46">Java 8 ZIP</option>
                        <option value="47">J</option>
                        <option value="56">Microsoft Q#</option>
                        <option value="57">Text</option>
                        <option value="62">UnknownX</option>
                        <option value="68">Secret 2021</option>
                    </select>
                </label>

                <label for="source-code">
                    <span>Source code</span>
                    <textarea name="source-code" id="source-code" cols="30" rows="10"></textarea>
                </label>

                <button type="submit">Submit</button>
            </form>

        </div>
    </div>



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















    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
