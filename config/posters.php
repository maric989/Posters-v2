<?php

return [
    'hot' => [
        'likes' => [
            'min' => env('HOT_LIKES_MIN',9)
        ]
    ],

    'trending' => [
        'likes' => [
            'max' => env('TRENDING_LIKES_MIX',8),
            'min' => env('TRENDING_LIKES_MIN',4)
        ]
    ],

    'fresh' => [
        'likes' => [
            'max' => env('FRESH_LIKES_MAX',3),
            'min' => env('FRESH_LIKES_MIN',0)
        ]
    ]
];
