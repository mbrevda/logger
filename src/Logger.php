<?php

namespace Mbrevda\Logger;

use Monolog\Logger as mLogger;

class Log extends mLogger
{
     /**
     * Print a string, array or object
     *
     * @param mixed $data
     */
    public function printr()
    {
        $data = '';

        foreach (func_get_args() as $data) {
            $data .= print_r($data, true) . PHP_EOL;
        }

        $this->debug($data);
    }

    /**
     * Export a string, array or object
     *
     * @param mixed $data
     */
    public function export()
    {
        $data = '';

        foreach (func_get_args() as $data) {
            $data .= var_export($data, true) . PHP_EOL;
        }
        $this->debug($data);
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

        $data = ob_get_contents();
        ob_end_clean();

        $this->debug($data);
    }
}
