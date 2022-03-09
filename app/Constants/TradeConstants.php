<?php


namespace App\Constants;


interface TradeConstants
{
    public const ORDER_TYPES = [
        'CNC',
        'MIS'
    ];

    public const TRADE_TYPES = [
        'BUY',
        'SELL'
    ];

    public const APPROACHES = [
        'FIFO' => 'fifo',
        'LIFO' => 'lifo',
    ];
}
