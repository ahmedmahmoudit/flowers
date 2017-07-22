<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ __('Vasat') }}</title>
    @section('style')
    @show
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
                                <td>
                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="200" style="border-collapse: collapse;">
                                        <!-- logo -->
                                        <tr>
                                            <td align="left">
                                                <h1 style="font-family:helvetica, Arial, sans-serif;">DrWejdan</h1>
                                            </td>
                                        </tr>

                                        <!-- Space -->
                                        <tr><td style="font-size: 0; line-height: 0;" height="15">&nbsp;</td></tr>
                                    </table>
                                    <table align="right" border="0" cellpadding="0" cellspacing="0" width="350" style="border-collapse: collapse;">
                                        <tr>
                                            <td  height="75" style="text-align: right; vertical-align: middle;">
                                                <a href="{{ url('/') }}" style="font-family:helvetica, Arial, sans-serif; color: #666666; font-size: 12px; font-weight: bold; text-decoration: none;">HOME</a> &nbsp;&nbsp;
                                                <a href="{{ route('products.index') }}" style="font-family:helvetica, Arial, sans-serif; color: #666666; font-size: 12px; font-weight: bold; text-decoration: none;">Products</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="{{ route('about') }}" style="font-family:helvetica, Arial, sans-serif; color: #666666; font-size: 12px; font-weight: bold; text-decoration: none;">ABOUT</a> &nbsp;&nbsp;
                                                <a href="{{ route('contact') }}" style="font-family:helvetica, Arial, sans-serif; color: #666666; font-size: 12px; font-weight: bold; text-decoration: none;">CONTACT</a>
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
                        <table bgcolor="#fafafa" align="center" border="0" cellpadding="0" cellspacing="0" width="580" style="border-collapse: collapse;">
                            <tr>
                                <td>
                                    <table align="center" border="0" cellpadding="0" width="100%" cellspacing="0" style="border-collapse: collapse;">
                                        <!-- Border -->
                                        <tr><td bgcolor="#eaeaea" style="font-size: 0; line-height: 0;" height="1">&nbsp;</td></tr>
                                        <!-- Space -->
                                        <tr><td style="font-size: 0; line-height: 0;" height="30">&nbsp;</td></tr>
                                    </table>
                                    <table align="center" border="0" cellpadding="0" width="480" cellspacing="0" style="border-collapse: collapse;">
                                        <tr>
                                            <td>
                                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                    @section('content')

                                                    @show

                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Space -->
                                    <table align="center" border="0" cellpadding="0" width="100%" cellspacing="0" style="border-collapse: collapse;">
                                        <tr><td style="font-size: 0; line-height: 0;" height="40">&nbsp;</td></tr>
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
                                                Copyright © {{date('Y') }} <a href="{{route('home')}}">DrWejdan</a>. Developed by <a href="http://www.ideasowners.net" style="color: #cdcdcd; font-size: 14px; line-height: 18px; font-weight: normal; font-family: helvetica, Arial, sans-serif; text-decoration:none;">IdeasOwners, Kuwait</a>. All Rights Reserved
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