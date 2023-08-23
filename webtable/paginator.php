<?php
class Paginator
{
    private $totalRecords;
    private $recordsPerPage;
    private $currentPage;
    private $pageName;

    public function __construct($totalRecords, $recordsPerPage, $currentPage, $pageName)
    {
        $this->totalRecords = $totalRecords;
        $this->recordsPerPage = $recordsPerPage;
        $this->currentPage = $currentPage;
        $this->pageName = $pageName;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function getPrevUrl()
    {
        if ($this->currentPage > 1) {
            return $this->pageName . ($this->currentPage - 1);
        }
        return null;
    }

    public function getPages()
    {
        // Calculate the total number of pages
        $totalPages = ceil($this->totalRecords / $this->recordsPerPage);

        // Initialize the pages array
        $pages = [];

        // Create page data for all pages
        for ($i = 1; $i <= $totalPages; $i++) {
            $pageData = [
                'num' => $i,
                'url' => $this->pageName . $i,
                'isCurrent' => $i == $this->currentPage
            ];

            $pages[] = $pageData;
        }

        return $pages;
    }

    public function getNextUrl()
    {
        // Calculate the total number of pages
        $totalPages = ceil($this->totalRecords / $this->recordsPerPage);

        // Check if there is a next page
        if ($this->currentPage < $totalPages) {
            return $this->pageName . ($this->currentPage + 1);
        }
        return null;
    }
}
