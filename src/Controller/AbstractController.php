<?php

declare(strict_types=1);

require_once "src/View.php";
require_once "src/Request.php";

use App\Exception\NotFoundException;
use App\Exception\StorageException;


abstract class AbstractController
{

    protected const DEFAULT_ACTION = 'schedules';

    protected Request $request;
    protected View $view;

    public function __construct(Request $requestData)
    {
        $this->request = $requestData;
        $this->view = new View();
    }


    final function run(): void
    {
        try {
            $action = $this->action() . 'Action';
            if (!method_exists($this, $action)) {
                $action = self::DEFAULT_ACTION . 'Action';
            }
            $this->$action();
        } catch (StorageException $e) {
            $this->view->render('error', ['message' => $e->getMessage()]);
        } catch (NotFoundException $e) {
            $this->redirect('/', ['error' => 'noteNotFound']);
        }

    }

    private function action(): string
    {
        return $this->request->getParam('action', self::DEFAULT_ACTION);
    }

}