<?php

require "AbstractController.php";

class SchedulesController extends AbstractController
{

    public function schedulesAction(): void
    {
        $this->view->render(
            'schedules', []
        );
    }

    public function weatherAction(): void
    {
        $this->view->render(
            'weather', []
        );
    }

    public function pricelistAction(): void
    {
        $this->view->render(
            'pricelist', []
        );
    }

    public function showresultsAction(): void
    {
        $lineNumber = $this->request->getParam('lineNumber');
        $this->view->render(
            'showresults', [
                'line' => $lineNumber
            ]
        );
    }

}