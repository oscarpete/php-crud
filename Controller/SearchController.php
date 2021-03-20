
<?php
include_once('loaders/SearchLoader.php');

class SearchController extends Controller
{

    public function render(array $GET, array $POST)
    {
        // TODO: Implement render() method.

//        var_dump($GET);
//        var_dump($POST);
        $searchEngine = new SearchLoader();
        $data = $searchEngine->searchEntries($GET['find']);
        require 'View/SearchResults.php';
    }
}