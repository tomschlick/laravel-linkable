<?php

namespace TomSchlick\Linkable;

/**
 * Class Linkable.
 */
trait Linkable
{
    /**
     * Link directly to the resource.
     *
     * @return string
     */
    public function link() : string
    {
        return $this->sublink('show');
    }

    /**
     * Link to a sub-item of the resource.
     *
     * @param string $key
     * @param array $attr
     *
     * @return mixed
     */
    abstract public function sublink(string $key, array $attr = []) : string;

    /**
     * Redirect directly to the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        return redirect($this->link());
    }

    /**
     * Redirect to a sub-item of the resource.
     *
     * @param string $key
     * @param array $attr
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectSublink(string $key, array $attr = [])
    {
        return redirect($this->sublink($key, $attr));
    }
}
