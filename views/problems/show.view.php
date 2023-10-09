<!doctype html>

<h1><?= "{$problem_letter}. {$problem['title']}" ?></h1>
<?= $problem['text'] ?>

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
