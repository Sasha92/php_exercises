<?php
// Написать код приведения даты формата “01/18/2013 01:02:03”
// к формату “2013-01-18 01:02:03”

function dateFormat($date)
{
    $format = date_create_from_format('m/d/Y H:i:s', $date);
    return date_format($format, 'Y-m-d H:i:s');
}

assert(dateFormat('01/18/2013 01:02:03') === '2013-01-18 01:02:03');