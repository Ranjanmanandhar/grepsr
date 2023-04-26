

<?php
include_once("simple_html_dom.php");


// Load the search results page
$html = file_get_html('https://github.com/search?q=php');

// Find the section containing the search results
$results = $html->find('ul.repo-list');

// Iterate through each listing and extract the repository name
$repositories = array();
foreach ($results[0]->find('h3') as $heading) {
    $repositories[] = $heading->plaintext;
}

// Display the results
print_r($repositories);
