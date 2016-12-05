<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'GE5cC4XPU-QIdZJVe6AlRcUpuDMJvya7',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'user' => [
        //     'identityClass' => 'app\models\User',
        //     'enableAutoLogin' => true,
            
        // ],
        'user' => [
            'identityClass' => 'budyaga\users\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/login'],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            // 'clients' => [
            //     'vkontakte' => [
            //         'class' => 'budyaga\users\components\oauth\VKontakte',
            //         'clientId' => 'XXX',
            //         'clientSecret' => 'XXX',
            //         'scope' => 'email'
            //     ],
            //     'google' => [
            //         'class' => 'budyaga\users\components\oauth\Google',
            //         'clientId' => 'XXX',
            //         'clientSecret' => 'XXX',
            //     ],
            //     'facebook' => [
            //         'class' => 'budyaga\users\components\oauth\Facebook',
            //         'clientId' => 'XXX',
            //         'clientSecret' => 'XXX',
            //     ],
            //     'github' => [
            //         'class' => 'budyaga\users\components\oauth\GitHub',
            //         'clientId' => 'XXX',
            //         'clientSecret' => 'XXX',
            //         'scope' => 'user:email, user'
            //     ],
            //     'linkedin' => [
            //         'class' => 'budyaga\users\components\oauth\LinkedIn',
            //         'clientId' => 'XXX',
            //         'clientSecret' => 'XXX',
            //     ],
            //     'live' => [
            //         'class' => 'budyaga\users\components\oauth\Live',
            //         'clientId' => 'XXX',
            //         'clientSecret' => 'XXX',
            //     ],
            //     'yandex' => [
            //         'class' => 'budyaga\users\components\oauth\Yandex',
            //         'clientId' => 'XXX',
            //         'clientSecret' => 'XXX',
            //     ],
            //     'twitter' => [
            //         'class' => 'budyaga\users\components\oauth\Twitter',
            //         'consumerKey' => 'XXX',
            //         'consumerSecret' => 'XXX',
            //     ],
            // ],
        ],
            
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            // 'enablePrettyUrl' => true,
            // 'showScriptName' => false,
            // 'rules' => [
            // ],
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/signup' => '/user/user/signup',
                '/login' => '/user/user/login',
                '/logout' => '/user/user/logout',
                '/requestPasswordReset' => '/user/user/request-password-reset',
                '/resetPassword' => '/user/user/reset-password',
                '/profile' => '/user/user/profile',
                '/retryConfirmEmail' => '/user/user/retry-confirm-email',
                '/confirmEmail' => '/user/user/confirm-email',
                '/unbind/<id:[\w\-]+>' => '/user/auth/unbind',
                '/oauth/<authclient:[\w\-]+>' => '/user/auth/index'
                
            ],
        ],
        
        
    ],
    'modules' => [
        
        'user' => [
            'class' => 'budyaga\users\Module',
            'userPhotoUrl' => 'http://example.com/uploads/user/photo',
            'userPhotoPath' => '/web/uploads/user/photo'
        ],
        
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'filemanager' => [
            'class' => 'dpodium\filemanager\Module',
            'storage' => ['local'],
            // This configuration will be used in 'filemanager/files/upload'
            // To support dynamic multiple upload
            // Default multiple upload is true, max file to upload is 10
            // If multiple set to true and maxFileCount is not set, unlimited multiple upload
            'filesUpload' => [
                'multiple' => true,
                'maxFileCount' => 30
            ],
            // in mime type format
            'acceptedFilesType' => [
                'image/jpeg',
                'image/png',
                'image/gif',
                'application/pdf',
                'application/zip'
            ],
            // MB
            'maxFileSize' => 8,
            // [width, height], suggested thumbnail size is 120X120
            'thumbnailSize' => [120,120] 
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '93.100.112.60', '0.0.0.0'],
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '93.100.112.60'],
    ];
}

return $config;
