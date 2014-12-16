<?php

namespace Mbrevda\Logger;

use Monolog\Logger;

class Log extends Logger
{
     /**
     * Print a string, array or object
     *
     * @param mixed $data
     */
    public function printr()
    {
        $out = '';

        foreach (func_get_args() as $data) {
            $out .= print_r($data, true) . PHP_EOL;
        }

        $this->debug($out);
    }

    /**
     * Export a string, array or object
     *
     * @param mixed $data
     */
    public function export()
    {
        $out = '';

        foreach (func_get_args() as $data) {
            $data .= var_export($data, true) . PHP_EOL;
        }
        $this->debug($out);
    }

    /**
     * Dump a string, array or object
     *
     * @param mixed $data and array or object
     */
    public function dump()
    {
        ob_start();
        foreach (func_get_args() as $data) {
            var_dump($data);
        }

        $out = ob_get_contents();
        ob_end_clean();

        $this->debug($out);
    }
}
