<?php
function SendToGithub(){
    // https://developer.github.com/v3/issues/#create-an-issue

    // test token access:
	//$repos = github_request('https://api.github.com/user/repos?page=1&per_page=100');
	//print_r($repos);
	//$events = github_request('https://api.github.com/users/:username/events?page=1&per_page=5');
	//$events = github_request('https://api.github.com/users/:username/events/public?page=1&per_page=5');
	//print_r($events);
	//$feeds = github_request('https://api.github.com/feeds/:username?page=1&per_page=5');
	//print_r($feeds);

	if(!isset($_POST['title']) && !isset($_POST['issue']))
	{
		die("Error, bad params.");
	}

	//TODO: you can add labels, milestone, assignees
	/*
	{
    "title": "Found a bug",
    "body": "I'm having a problem with this.",
    "assignees": [
    "octocat"
    ],
    "milestone": 1,
    "labels": [
    "bug"
    ]
    }	*/

    $appVersion = "?";

    if(isset($_GET['AppVersion'])) {$appVersion = $_GET['AppVersion'];}

	$named_array = array(
					  "title" => ('New Report '.$_POST['title'].' Ver '.$appVersion)
 					 ,"body" => ($_POST['issue'])

			);

	$data = createJsonBody($named_array);
    if($GLOBALS["DevMode"]) print_r($data);

	$newIssue = github_request(GetGithubIssueURL($GLOBALS['GithubUsername'], $GLOBALS['GithubRepository']), $data);
	if($GLOBALS["DevMode"]) print_r($newIssue);

} // end github

// Github REST API example
function github_request($url, $data){
    Global $GithubUsernameToken;

    $ch = curl_init();

    // Basic Authentication with token
    // https://developer.github.com/v3/auth/
    // https://github.com/blog/1509-personal-api-tokens
    // https://github.com/settings/tokens
    $access = $GithubUsernameToken;
    curl_setopt($ch, CURLOPT_USERPWD, $access);

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		 'Accept: application/vnd.github.v3+json'
		,'Content-Type: application/json')
		);

    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36');
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    curl_close($ch);
    $result = json_decode(trim($output), true);
    return $result;
}

function GetGithubIssueURL($username, $repository){

    return ('https://api.github.com/repos/'.rawurlencode($username).'/'.rawurlencode($repository).'/issues');
}


function createJsonBody(array $parameters)
{
    return (count($parameters) === 0) ? null : json_encode($parameters, empty($parameters) ? JSON_FORCE_OBJECT : 0);
}
?>