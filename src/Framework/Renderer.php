<?php

namespace CustomFramework;

class Renderer
{
    const DEFAULT_NAMESPACE = '__MAIN';
    private $paths = [];

    public function addPath(string $namespace, ?string $path = null): void
    {
        if (is_null($path)) :
            $this->paths[self::DEFAULT_NAMESPACE] = $namespace;
        else :
            $this->paths[$namespace] = $path;
        endif;
    }

    /**
     * Permet de rendre une vue
     * Le chemin peut être précisé avec des namespace rajoutés via addPath()
     * $this->render('@blog/view');
     * $this->render('view');
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view): string
    {
        if ($this->hasNamespace($view)) :
            $path = $this->replaceNamespace($view) . '.php';
        else :
            $path = $this->paths[self::DEFAULT_NAMESPACE] . DIRECTORY_SEPARATOR . $view . ".php";
        endif;

        ob_start();
        require($path);
        return ob_get_clean();
    }

    private function hasNamespace(string $view): bool
    {
        return $view[0] === '@';
    }

    private function getNamespace(string $view): string
    {
        return substr($view, 1, strpos($view, '/') - 1);
    }

    private function replaceNamespace(string $view): string
    {
        $namespace = $this->getNamespace($view);
        return str_replace('@' . $namespace, $this->paths[$namespace], $view);
    }
}
