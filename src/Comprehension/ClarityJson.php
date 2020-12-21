<?php

namespace Comprehension;

class ClarityJson
{
    /**
     * @param int $code
     * @param array $data
     */
    public static function view(int $code, array $data)
    {
        http_response_code($code);
        header('Content-Type: application/json');

        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     * @param int $error_code
     * @param string $error_msg
     * @return array
     */
    public static function prepareFail(int $error_code, string $error_msg): array
    {
        return [
            'error' => [
                'error_code' => $error_code,
                'error_msg' => $error_msg
            ]
        ];
    }

    /**
     * @param array $data
     * @param bool $found
     * @return array
     */
    public static function prepareDone(array $data, bool $found = true): array
    {
        return [
            'find' => $found,
            'response' => $data
        ];
    }
}