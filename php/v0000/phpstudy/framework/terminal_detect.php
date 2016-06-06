<?php

class Terminal_Detect
{

    /**
     * HTTP headers that trigger the 'isMobile' detection
     * to be true.
     *
     * @var array
     */
    protected static $mobileHeaders = array(
    
        'HTTP_ACCEPT'                  => array('matches' => array(
            // Opera Mini; @reference: http://dev.opera.com/articles/view/opera-binary-markup-language/
            'application/x-obml2d',
            // BlackBerry devices.
            'application/vnd.rim.html',
            'text/vnd.wap.wml',
            'application/vnd.wap.xhtml+xml'
        )),
        'HTTP_X_WAP_PROFILE'           => null,
        'HTTP_X_WAP_CLIENTID'          => null,
        'HTTP_WAP_CONNECTION'          => null,
        'HTTP_PROFILE'                 => null,
        // Reported by Opera on Nokia devices (eg. C3).
        'HTTP_X_OPERAMINI_PHONE_UA'    => null,
        'HTTP_X_NOKIA_GATEWAY_ID'      => null,
        'HTTP_X_ORANGE_ID'             => null,
        'HTTP_X_VODAFONE_3GPDPCONTEXT' => null,
        'HTTP_X_HUAWEI_USERID'         => null,
        // Reported by Windows Smartphones.
        'HTTP_UA_OS'                   => null,
        // Reported by Verizon, Vodafone proxy system.
        'HTTP_X_MOBILE_GATEWAY'        => null,
        // Seen this on HTC Sensation. SensationXE_Beats_Z715e.
        'HTTP_X_ATT_DEVICEID'          => null,
        // Seen this on a HTC.
        'HTTP_UA_CPU'                  => array('matches' => array('ARM')),
    );
    
}