<?php

include_once("simple_html_dom.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// // set output headers to download file
// header("Content-Type: text/csv; charset=utf-8");
// header("Content-Disposition: attachment; filename=links.csv");

// // set file handler to output stream
// $output = fopen("php://output", "w");
// // output the scraped links
// fputcsv($output, $links, "\n");

$pquery = '';
$repositories = array();

for ($i = 1; $i <= 10; $i++) {
    $pquery = '&p=' . $i;
    $html = file_get_html('https://github.com/search?q=php&s=stars&type=Repositories' . $pquery);

    // Get the list of repositories from the page
    $repo_list = $results = $html->find('ul.repo-list');

    print_r($repo_list[0]);die;
    // Loop through the repositories and extract the information
    foreach ($repo_list[0]->getElementsByTagName("li") as $repo) {
        print_r($repo->last_child()->last_child()->getElementsByTagName("a")[0]->plaintext);die;
        $name = trim($repo->getElementsByTagName("h3")[0]->plaintext);
        $description =  trim($repo->getElementsByTagName("p")[0]->plaintext);
        $repositories[] = [
            'name' =>$repo->getElementsByTagName("a")[0]->plaintext,
            'description' => trim($repo->getElementsByTagName("p")[0]->plaintext),
            'is_sponsored' =>  $repo->getElementsByTagName("summary")[0]->plaintext,
            'topics' => trim($repo->getElementsByTagName("h3")[0]->plaintext),
            'stargazers' =>  trim($repo->getElementsByTagName("h3")[0]->plaintext),
            'language' =>  trim($repo->getElementsByTagName("span")[0]->plaintext),
            'licesence' =>  trim($repo->getElementsByTagName("h3")[0]->plaintext),
            'date' =>  trim($repo->getElementsByTagName("h3")[0]->plaintext),
            'commits' =>  trim($repo->getElementsByTagName("h3")[0]->plaintext)
        ];
        print_r($repositories);die;
    }

    print_r($repositories);
}
