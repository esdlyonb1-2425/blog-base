<?php

namespace Core\Controller;

use Attributes\DefaultEntity;
use Attributes\TargetRepository;
use Core\Response\Response;

class Controller
{
    private Response $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function redirect(array $params = null)
    {
        return $this->response->redirect($params);
    }
    public function render(string $templateName, array $data)
    {
        return $this->response->render($templateName, $data);
    }

    public function getRepository(string $targetEntity = null)
    {
        if(!$targetEntity)
        {
             $targetEntity = $this->resolveDefaultEntity();
        }


        $reflection = new \ReflectionClass($targetEntity);
        $attributes = $reflection->getAttributes(TargetRepository::class);
        $repoName = $attributes[0]->getArguments()["repoName"];
        return new $repoName();
    }

    private function resolveDefaultEntity()
    {
        $reflection = new \ReflectionClass($this);

        $attributes = $reflection->getAttributes(DefaultEntity::class);
        return $attributes[0]->getArguments()["entityName"];
    }


}