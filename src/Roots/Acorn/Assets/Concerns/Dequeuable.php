<?php

namespace Roots\Acorn\Assets\Concerns;

trait Dequeuable
{
    /**
     * Get JS files in bundle.
     *
     * Optionally pass a function to execute on each JS file.
     *
     * @param callable $callable
     * @return Collection|$this
     */
    abstract public function js(?callable $callable = null);

    /**
     * Get CSS files in bundle.
     *
     * Optionally pass a function to execute on each CSS file.
     *
     * @param callable $callable
     * @return Collection|$this
     */
    abstract public function css(?callable $callable = null);

    /**
     * Dequeue CSS files from WordPress.
     *
     * @return $this
     */
    public function dequeueCss()
    {
        $this->css(function ($handle) {
            wp_dequeue_style($handle);
        });

        return $this;
    }

    /**
     * Dequeue JS files from WordPress.
     *
     * @return $this
     */
    public function dequeueJs()
    {
        $this->js(function ($handle) {
            wp_dequeue_script($handle);
        });

        return $this;
    }

    /**
     * Dequeue JS and CSS files from WordPress.
     *
     * @return $this
     */
    public function dequeue()
    {
        return $this->dequeueCss()->dequeueJs();
    }
}
