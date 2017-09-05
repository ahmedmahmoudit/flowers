<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ __('Vassat') }}</title>
    <style>

        body {
            font-family: Helvetica, Arial, sans-serif;
        }
        /* Let's make sure all tables have defaults */
        table td {
            vertical-align: top;
        }

        p, ul, ol {
            margin-bottom: 10px;
            font-weight: normal;
        }
        p li, ul li, ol li {
            margin-left: 5px;
            list-style-position: inside;
        }

        /* -------------------------------------
            LINKS & BUTTONS
        ------------------------------------- */
        a {
            color: #348eda;
            text-decoration: underline;
        }

        .link {
            color: #cdcdcd; font-size: 14px; line-height: 18px; font-weight: normal; text-decoration:none;
        }

        .center {
            text-align: center;
        }

        .right {
            /*text-align: right;*/
            text-align: {{ app()->getLocale() === 'ar' ? 'left' : 'right' }};
        }

        .left {
            /*text-align: left;*/
            text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};
        }

        .alert a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
        }

        .invoice {
            margin: 40px auto;
            text-align: left;
            width: 90%;
        }

        .invoice td {
            padding: 5px 0;
        }
        .invoice .invoice-items {
            width: 100%;
        }
        .invoice .invoice-items td {
            border-top: #eee 1px solid;
        }
        .invoice .invoice-items .total td {
            border-top: 2px solid #333;
            border-bottom: 2px solid #333;
            font-weight: 700;
        }

        @media only screen and (max-width: 640px) {
            body {
                padding: 0 !important;
            }

            h1, h2, h3, h4 {
                font-weight: 800 !important;
                margin: 20px 0 5px !important;
                font-family: sans-serif;
            }

            h1 {
                font-size: 22px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            h3 {
                font-size: 16px !important;
            }

            .invoice {
                width: 100% !important;
            }
        }

    </style>

    @yield('style')

</head>
<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding-top:25px;">

            <!-- Header Start -->
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
                            <tr>

                                <td class="center">
                                    <h1 style="font-family:helvetica, Arial, sans-serif;">{{ __('Vazzat') }}</h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                <tr>
                    <td>
                        <table bgcolor="#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" width="480" cellspacing="0" style="border-collapse: collapse;">
                                        <tr>
                                            <td>
                                                <table  border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                    @section('content')
                                                    @show
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                <tr>
                    <td>
                        <table bgcolor="#000000" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
                            <tr>
                                <td>
                                    <!-- Space -->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                        <tr><td style="font-size: 0; line-height: 0;" bgcolor="#333333" height="1">&nbsp;</td></tr>
                                        <tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
                                    </table>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="540" style="border-collapse: collapse;">
                                        <tr>
                                            <td align="center" style="color: #999999; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif;">
                                                Copyright © {{date('Y') }} <a href="{{route('home')}}"
                                                                              class="link"
                                                >Vazzat.com</a>. Developed by <a href="http://www.ideasowners.net" class="link">IdeasOwners</a>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Space -->
                                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                        <tr><td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>
</body>

</html>