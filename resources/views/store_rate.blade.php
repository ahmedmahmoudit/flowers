<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="{{ app()->getLocale() === 'en' ? 'ltr'  : 'rtl' }}" >
<!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8"/>
    <title>Flowers</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    @section('style')
        @include('partials.styles')

        @if(app()->getLocale() == 'ar')
            @include('partials.styles_rtl')
        @else
            @include('partials.styles_ltr')
        @endif

        <link href="/css/custom.css" rel="stylesheet" id="style_theme" type="text/css"/>

        @if(app()->getLocale() == 'ar')
            <link href="/css/custom-rtl.css" rel="stylesheet" type="text/css"/>
        @endif

    @show
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">

@include('partials.header')

<div class="c-layout-page">
    @component('partials.breadcrumb',['title' => __('Welcome To Store Rate ') , 'nav'=>true])
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-content ">
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Take a moment to answer these questions:</h3>
                <div class="c-line-left"></div>
            </div>
            <div id="contentarea">
                {{ Form::open(['route' => ['stores.rate'],'method'=>'POST', 'class' => 'form-horizontal']) }}
                    <div class="form-group">

                        <div class=" questionContent clearfix"> <div class="questionColor"><span class="zsf_Seqno">1. </span><span class="textBreakQuest" name="qmessage">Age</span></div></div>
                        <div class="clearBoth"></div>
                        <div class="answerContent">
                            <input id="3000001639771" type="text" pattern="\d*" value="" name="3000001639771" size="30" min="-9223372036854775808" max="9223372036854775807">

                        </div>
                    </div>


                    <div class="form-group">

                        <span id="fieldmsg" class="mandatoryStar" style="display:none"></span>

                        <div class=" questionContent clearfix"> <div class="questionColor"><span class="zsf_Seqno">2. </span><span class="textBreakQuest" name="qmessage">Gender</span></div></div>
                        <div class="clearBoth"></div>
                        <div class="answerContent">
                            <ul class="singlecol" style="list-style-type: none;">
                                <li><input id="male" type="radio" name="gender" value="m" ><span><label for="male" style="padding-left: 5px;">Male</label></span></li>
                                <li><input id="female" type="radio" name="gender" value="f"><span><label for="female" style="padding-left: 5px;">Female</label></span></li>
                            </ul>

                        </div>
                    </div>


                    <div >

                        <span id="fieldmsg" class="mandatoryStar" style="display:none"></span>

                        <div class=" questionContent clearfix"> <div class="questionColor"><span class="zsf_Seqno">3. </span><span class="textBreakQuest" name="qmessage">Rate your order:<br>(very bad) 1 - - 2 - - 3 - - 4 - - 5 (Excellent)</span></div></div>
                        <div class="clearBoth"></div>
                        <div class="answerContent">

                            <div class="likertScale" rowsize="9">
                                <label class="optionQuestion">Good selection</label>
                                <table cellspacing="0" cellpadding="5" border="0">
                                    <tbody>
                                    <tr>
                                        <td class="scaleNumbers">
                                            <label for="3000001639807_3000001639789">1</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639809_3000001639789">2</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639811_3000001639789">3</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639813_3000001639789">4</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639815_3000001639789">5</label>
                                        </td>
                                    </tr>
                                    <tr class="inputRow">
                                        <td class="scaleRow">
                                            <input id="3000001639807_3000001639789" type="radio" value="1" name="good_selection" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639809_3000001639789" type="radio" value="2" name="good_selection" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639811_3000001639789" type="radio" value="3" name="good_selection" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639813_3000001639789" type="radio" value="4" name="good_selection" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639815_3000001639789" type="radio" value="5" name="good_selection" style="margin-right: 10px;">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="likertScale" rowsize="9">
                                <label class="optionQuestion">Good pricing</label>
                                <table cellspacing="0" cellpadding="5" border="0">
                                    <tbody>
                                    <tr>
                                        <td class="scaleNumbers">
                                            <label for="3000001639807_3000001639789">1</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639809_3000001639789">2</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639811_3000001639789">3</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639813_3000001639789">4</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639815_3000001639789">5</label>
                                        </td>
                                    </tr>
                                    <tr class="inputRow">
                                        <td class="scaleRow">
                                            <input id="3000001639807_3000001639789" type="radio" value="1" name="pricing" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639809_3000001639789" type="radio" value="2" name="pricing" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639811_3000001639789" type="radio" value="3" name="pricing" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639813_3000001639789" type="radio" value="4" name="pricing" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639815_3000001639789" type="radio" value="5" name="pricing" style="margin-right: 10px;">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="likertScale" rowsize="9">
                                <label class="optionQuestion">High quality</label>
                                <table cellspacing="0" cellpadding="5" border="0">
                                    <tbody>
                                    <tr>
                                        <td class="scaleNumbers">
                                            <label for="3000001639807_3000001639789">1</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639809_3000001639789">2</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639811_3000001639789">3</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639813_3000001639789">4</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639815_3000001639789">5</label>
                                        </td>
                                    </tr>
                                    <tr class="inputRow">
                                        <td class="scaleRow">
                                            <input id="3000001639807_3000001639789" type="radio" value="1" name="quality" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639809_3000001639789" type="radio" value="2" name="quality" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639811_3000001639789" type="radio" value="3" name="quality" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639813_3000001639789" type="radio" value="4" name="quality" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639815_3000001639789" type="radio" value="5" name="quality" style="margin-right: 10px;">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="likertScale" rowsize="9">
                                <label class="optionQuestion">Good service</label>
                                <table cellspacing="0" cellpadding="5" border="0">
                                    <tbody>
                                    <tr>
                                        <td class="scaleNumbers">
                                            <label for="3000001639807_3000001639789">1</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639809_3000001639789">2</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639811_3000001639789">3</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639813_3000001639789">4</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639815_3000001639789">5</label>
                                        </td>
                                    </tr>
                                    <tr class="inputRow">
                                        <td class="scaleRow">
                                            <input id="3000001639807_3000001639789" type="radio" value="1" name="service" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639809_3000001639789" type="radio" value="2" name="service" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639811_3000001639789" type="radio" value="3" name="service" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639813_3000001639789" type="radio" value="4" name="service" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639815_3000001639789" type="radio" value="5" name="service" style="margin-right: 10px;">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="likertScale" rowsize="9">
                                <label class="optionQuestion">Ease of shopping</label>
                                <table cellspacing="0" cellpadding="5" border="0">
                                    <tbody>
                                    <tr>
                                        <td class="scaleNumbers">
                                            <label for="3000001639807_3000001639789">1</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639809_3000001639789">2</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639811_3000001639789">3</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639813_3000001639789">4</label>
                                        </td>
                                        <td class="scaleNumbers">
                                            <label for="3000001639815_3000001639789">5</label>
                                        </td>
                                    </tr>
                                    <tr class="inputRow">
                                        <td class="scaleRow">
                                            <input id="3000001639807_3000001639789" type="radio" value="1" name="ease_shopping" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639809_3000001639789" type="radio" value="2" name="ease_shopping" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639811_3000001639789" type="radio" value="3" name="ease_shopping" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639813_3000001639789" type="radio" value="4" name="ease_shopping" style="margin-right: 10px;">
                                        </td>
                                        <td class="scaleRow">
                                            <input id="3000001639815_3000001639789" type="radio" value="5" name="ease_shopping" style="margin-right: 10px;">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div id="3000001639865" comtype="1" class="componentBox clearfix questions" mandatory="0" questype="6">

                        <span id="fieldmsg" class="mandatoryStar" style="display:none"></span>

                        <div class=" questionContent clearfix"> <div class="questionColor"><span class="zsf_Seqno">4. </span><span class="textBreakQuest" name="qmessage">Is there anything that can improve your shopping experience?</span></div></div>
                        <div class="clearBoth"></div>
                        <div class="answerContent">

                            <textarea id="3000001639865" name="comments" rows="5" cols="60" min="0" max="5000"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 col-lg-push-1 pull-right">
                            {{ Form::submit('submit',['class'=>'btn c-theme-btn c-theme-border c-btn-square c-btn-uppercase c-font-16']) }}
                        </div>
                    </div>


                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

@include('partials.footer')

<div class="c-layout-go2top">
    <i class="icon-arrow-up"></i>
</div>

@section('script')
    @include('partials.scripts')
    <script>

        $(document).ready(function() {
            App.init(); // init core
        });

    </script>
@show

</body>
</html>