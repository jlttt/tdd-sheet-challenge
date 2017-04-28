<?php

class Sheet
{
    private $cells = [];

    public function get($cellCoordinates)
    {
        $value = $this->getLiteral($cellCoordinates);
        if (preg_match('/^\s*\d+\s*$/', $value) == 1) {
            $value = trim($value);
        }
        return $value;
    }

    public function put($cellCoordinates, $value)
    {
        $this->cells[$cellCoordinates] = $value;
    }

    public function getLiteral($cellCoordinates)
    {
        if (!isset($this->cells[$cellCoordinates])) {
            return "";
        }
        return $this->cells[$cellCoordinates];
    }
}
