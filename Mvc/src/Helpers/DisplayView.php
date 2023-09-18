<?php

declare(strict_types=1);

class DisplayView
{

    private const VIEWS_DIRECTORY = './views/';

    public function display(string $view, array $data = []): void
    {
        $file = self::VIEWS_DIRECTORY . '/' . $view . '.php';
        if (!file_exists($file)) {
            throw new Exception('Template doesn\'t exists.');
        }

        $content = file_get_contents($file);

        foreach ($data as $variableName => $variableValue) {
            $content = str_replace('{$' . $variableName . '}', $variableValue, $content);
        }

        echo $content;

    }
}
