<?php

namespace Controller\Core;

class Pager
{
    protected $numberOfPages = null;
    protected $start = 1;
    protected $end = null;
    protected $previous = null;
    protected $next = null;
    protected $currentPage = null;
    protected $totalRecords = null;
    protected $recordsPerPage = null;


    public function setRecordsPerPage($recordsPerPage)
    {
        $this->recordsPerPage = (int)$recordsPerPage;
        return $recordsPerPage;
    }
    public function getRecordsPerPage()
    {
        return $this->recordsPerPage;
    }

    public function setTotalRecords($totalRecords)
    {
        $this->totalRecords = $totalRecords;
        return $totalRecords;
    }
    public function getTotalRecords()
    {
        return $this->totalRecords;
    }


    protected function setStart($start)
    {
        $this->start = $start;
        return $start;
    }
    public function getStart()
    {
        return $this->start;
    }

    protected function setEnd($end)
    {
        $this->end = $end;
        return $end;
    }
    public function getEnd()
    {
        return $this->end;
    }

    protected function setPrevious($previous)
    {
        $this->previous = $previous;
        return $previous;
    }
    public function getPrevious()
    {
        return $this->previous;
    }

    protected function setNext($next)
    {
        $this->next = $next;
        return $next;
    }
    public function getNext()
    {
        return $this->next;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
        return $currentPage;
    }
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setNumberOfPages($numberOfPages)
    {
        $this->numberOfPages = (int)$numberOfPages;
        return $numberOfPages;
    }
    public function getNumberOfPages()
    {
        return $this->numberOfPages;
    }

    // public function calculate()
    // {
    //     $page = ceil($this->getTotalRecords() / $this->getRecordsPerPage());
    //     $this->setNumberOfPages($page);
    //     $this->setEnd($page);

    //     if ($this->getTotalRecords() <= $this->getRecordsPerPage()) {
    //         // $this->setNumberOfPages(1);
    //         $this->setStart(1);
    //         $this->setEnd(null);
    //         $this->setPrevious(null);
    //         $this->setNext(null);
    //         return $this;
    //     }


    //     /**INVALID CONDITION */
    //     if ($this->getCurrentPage() > $this->getStart() || $this->getCurrentPage() < $this->getEnd()) {
    //         $this->setPrevious(null);
    //         $this->setNext($this->getStart() + 1);
    //         return $this;
    //     }

    //     if ($this->getCurrentPage() <= 1) {
    //         $this->setCurrentPage(1);
    //     }

    //     if ($this->getCurrentPage() > $this->getRecordsPerPage()) {
    //         $this->setCurrentPage($this->getNumberOfPages());
    //     }

    //     if ($this->getCurrentPage() == $this->getNumberOfPages()) {
    //         $this->setStart(1);
    //         $this->setNext(null);
    //         $this->setEnd($this->getNumberOfPages());
    //         $this->setPrevious($this->getCurrentPage());
    //         return $this;
    //     }


    //     if ($this->getCurrentPage() == $this->getStart()) {
    //         $this->setPrevious(null);
    //         $this->setStart(null);
    //         if ($this->getCurrentPage() < $this->getNumberOfPages()) {
    //             $this->setNext($this->getCurrentPage() + 1);
    //         }
    //         return $this;
    //     }

    //     if ($this->getCurrentPage() == $this->getEnd()) {
    //         $this->setNext(null);
    //         $this->setEnd(null);
    //         if ($this->getCurrentPage() >= $this->getNumberOfPages()) {
    //             $this->setPrevious($this->getCurrentPage() - 1);
    //         }
    //         return $this;
    //     }
    // }
    public function calculate()
    {
        $this->setNumberOfPages(@ceil($this->getTotalRecords() / $this->getRecordsPerPage()));

        if ($this->getTotalRecords() <= $this->getRecordsPerPage()) {
            $this->setStart(1);
            $this->setNext(null);
            $this->setPrevious(null);
            $this->setEnd(null);
            return $this;
        }
        if ($this->getCurrentPage() < $this->getStart()) {
            $this->setCurrentPage($this->getStart());
            $this->setNext($this->getCurrentPage() + 1);
            $this->setEnd($this->getNumberOfPages());
            $this->setPrevious(null);
            return $this;
        }
        if ($this->getCurrentPage() > $this->getNumberOfPages()) {
            $this->setCurrentPage($this->getNumberOfPages());
            $this->setPrevious($this->getCurrentPage() - 1);
            $this->setEnd($this->getNumberOfPages());
            $this->setNext(null);
            return $this;
        }

        if ($this->getCurrentPage() == $this->getNumberOfPages()) {
            $this->setEnd($this->getNumberOfPages());
            $this->setNext(null);
            $this->setStart($this->getStart());
            $this->setPrevious($this->getCurrentPage() - 1);
            return $this;
        }
        if ($this->getCurrentPage() == $this->getStart()) {
            $this->setEnd($this->getNumberOfPages());
            $this->setPrevious(null);
            $this->setNext($this->getCurrentPage() + 1);
            return $this;
        }
        if ($this->getcurrentPage() != $this->getNumberOfPages() && $this->getCurrentPage() != $this->getStart()) {
            $this->setPrevious($this->getCurrentPage() - 1);
            $this->setNext($this->getCurrentPage() + 1);
            $this->setEnd($this->getNumberOfPages());
            return $this;
        }
    }
}
