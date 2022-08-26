<?php
class ArgumentScanner {
    private static $instance;
    private $arguments;

    public static function get() {
        if (empty(self::$instance)) {
            self::$instance = new ArgumentScanner();
        }

        return self::$instance;
    }

    public function __construct() {
        $this->arguments = $this->parseArguments($_SERVER['argv']);
    }

    public function __isset($argument) {
        return isset($this->arguments->$argument);
    }

    public function __get($argument) {
        // var_dump($this->arguments);
        return ($this->arguments->$argument ?? null);
    }

    /**
     * Is used to parse the contents of $_SERVER['argv']
     * @param array $argumentsRaw The arguments from $_SERVER['argv']
     * @return stdClass An object of properties in key-value pairs
     */
    private function parseArguments($argumentsRaw) {
        $argumentBuffer = '';
        foreach ($argumentsRaw as $argument) {
            if ($argument[0] == '-') {
                $argumentBuffer = substr($argument, ($argument[1] == '-' ? 2 : 1));
                $equalSign = strpos($argumentBuffer, '=');
                if ($equalSign !== false) {
                    $argumentKey = substr($argumentBuffer, 0, $equalSign);
                    $argumentsParsed[$argumentKey] = substr($argumentBuffer, $equalSign + 1);
                    $argumentBuffer = '';
                } else {
                    $argumentKey = $argumentBuffer;
                    $argumentsParsed[$argumentKey] = '';
                }
            } else {
                if ($argumentBuffer != '') {
                    $argumentKey = $argumentBuffer;
                    $argumentsParsed[$argumentKey] = $argument;
                    $argumentBuffer = '';
                }
            }
        }
        return (object)$argumentsParsed;
    }
}

$argv = ArgumentScanner::get();

switch ($argv) {
  case isset($argv->start):
    exec("php -S localhost:8000");
    break;
  
  default:
    echo "no parameter matching";
    exit;
    break;
}

exit;