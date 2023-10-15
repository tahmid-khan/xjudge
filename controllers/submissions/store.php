<?php

const LOGIN_PAGE_URL = 'https://codeforces.com/enter';
const SUBMIT_PAGE_URL = 'https://codeforces.com/problemset/submit';
const ACCOUNT_HANDLE = 'xjudge';
const ACCOUNT_PASSWORD = ",ZYk;sz3MM%=','";
const MAX_LOGIN_ATTEMPTS = 3;

use Nesk\Puphpeteer\Puppeteer;
use Nesk\Puphpeteer\Resources\Page;
use Nesk\Rialto\Data\JsFunction;

function goto_submit_page(Page $page): bool
{
    if (is_submit_page($page)) {
        return true;
    }

    $page->goto(SUBMIT_PAGE_URL);
//    $page->waitForNavigation();
    if (is_submit_page($page)) {
        return true;
    }

//    $more_attempts = MAX_LOGIN_ATTEMPTS;
//    while ($more_attempts && !login($page)) {
//        $more_attempts--;
//    }
    if (!login($page)) {
        return false;
    }
    $page->goto(SUBMIT_PAGE_URL);
//    $page->waitForNavigation();
    return is_submit_page($page);
}

function is_submit_page(Page $page): bool
{
    return $page->querySelector('form.submit-form') !== null;
}

function login(Page $page): bool
{
    $page->goto(LOGIN_PAGE_URL);
//    $page->waitForSelector('#handleOrEmail');
    $page->type('#handleOrEmail', ACCOUNT_HANDLE);
    $page->type('#password', ACCOUNT_PASSWORD);
    $page->click('#remember');
    $page->click('input.submit[value=Login]');
    $page->waitForNavigation();
    return str_contains($page->content(), 'Welcome, ' . ACCOUNT_HANDLE . '.');
}

function write_code_and_submit(Page $page, string $problem_id, string $language_id, string $source_code): false|array
{
    $page->type('input[name=submittedProblemCode]', $problem_id);
    $page->select('select[name=programTypeId]', $language_id);
//    $page->type('textarea.ace_text-input', $source_code);
    $page->evaluate(
        JsFunction::createWithBody(/** @lang JavaScript */ "ace.edit('editor').session.setValue(`{$source_code}`);")
    );
    $page->click('#singlePageSubmitButton');

//    $page->waitForNavigation();
    if (!$page->waitForSelector('.submissionVerdictWrapper')) {
        return false;
    }

    $page->waitForFunction(
        JsFunction::createWithBody(
        /** @lang JavaScript */ '
            const verdictText = document
              .querySelector(".submissionVerdictWrapper")
              .innerText.toLowerCase();
            return !(
              verdictText.startsWith("in queue") ||
              verdictText.startsWith("running") ||
              verdictText.startsWith("wait")
            );'
        )
    );
    return $page->evaluate(
        JsFunction::createWithBody(
        /** @lang JavaScript */ '
            const verdictElement = document.querySelector(".submissionVerdictWrapper");
            return {
              "submission_id": verdictElement.getAttribute("submissionId"),
              "verdict_type": verdictElement.getAttribute("submissionVerdict"),
              "verdict": verdictElement.innerText
            };'
        )
    );
}

extract($route_params);
$language_id = $_POST['language-id'];
$source_code = $_POST['source-code'];

$db = connect_db();
$problem_id = $db->query(
    'SELECT problem_id FROM contest_problem WHERE contest_id = ? AND problem_index = ?',
    [$contest_id, $problem_index]
)->result()['problem_id'];

$puppeteer = new Puppeteer;
$browser = $puppeteer->launch(['headless' => false]);
$page = $browser->newPage();
goto_submit_page($page);
$result = write_code_and_submit($page, $problem_id, $language_id, $source_code);
dump($result);

$db->query(
    'INSERT INTO submission (id, submitter_id, contest_id, problem_index, language_id, source_code, verdict_type, verdict)
    VALUES (:id, :submitter_id, :contest_id, :problem_index, :language_id, :source_code, :verdict_type, :verdict)',
    [
        'id' => $result['submission_id'],
        'submitter_id' => $_SESSION['user_id'],
        'contest_id' => $contest_id,
        'problem_index' => $problem_index,
        'language_id' => $language_id,
        'source_code' => $source_code,
        'verdict_type' => $result['verdict_type'],
        'verdict' => $result['verdict']
    ]
);

if (!$db->is_success()) {
    dd($db->error());
}

header("Location: /contests/$contest_id/submissions");
