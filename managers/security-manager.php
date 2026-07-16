<?php

function escape(string $data): string
{
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function sanitize_input(string $data): string
{
    return trim(strip_tags($data));
}