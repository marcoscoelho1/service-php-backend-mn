<?php

class ApplicationHelper
{
    public function utf8EncodeDeep(&$input)
    {
        if (is_string($input)) {
            $input = utf8_encode($input);
        } else if (is_array($input)) {
            if ($this->isAssociativeArray($input)) {

                $input = array_filter($input, 'is_string', ARRAY_FILTER_USE_KEY);
            }
            foreach ($input as &$value) {
                $this->utf8EncodeDeep($value);
            }
            unset($value);
        } else if (is_object($input)) {
            $vars = get_object_vars($input);
            foreach ($vars as $key => $value) {
                if (is_object($value) || is_string($value)) {
                    $this->utf8EncodeDeep($input->$key);
                }
            }
        }

        return $input;
    }

    private function isAssociativeArray($array)
    {
        return is_array($array) && array_keys($array) !== range(0, count($array) - 1);
    }
}
