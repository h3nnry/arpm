<?php

declare(strict_types=1);

class PageController
{
    public function __construct(
        private DisplayView $displayView = new DisplayView()
    )
    {

    }

    public function index(): void
    {
        $this->displayView->display(
            'template', [
                'pageName' => 'homepage'
            ]
        );
    }

    public function folder1(): void
    {
        $this->displayView->display(
            'template', [
                'pageName' => 'folder1'
            ]
        );
    }

    public function folder2(): void
    {
        $this->displayView->display(
            'template', [
                'pageName' => 'folder2'
            ]
        );
    }

}
