@extends('layouts.master')

    @component('partials.breadcrumb',['title' => __('Welcome To Store Rate') , 'nav'=>true])
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-content ">
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">{{ __('Take a moment to answer these questions') }}</h3>
                <div class="c-line-left"></div>
            </div>
            <div id="contentarea">
                {{ Form::open(['route' => ['stores.rate'],'method'=>'POST', 'class' => 'form-horizontal']) }}
                <input type="hidden" value="{{$token}}" name="user_token">
                <div class="form-group">

                    <div class=" questionContent clearfix">
                        <div class="questionColor"><span class="zsf_Seqno">1. </span><span class="textBreakQuest"
                                                                                           name="qmessage">{{ __('Age') }}</span>
                        </div>
                    </div>
                    <div class="clearBoth"></div>
                    <div class="answerContent">
                        <input id="age" type="text" pattern="\d*" value="" name="age" size="30">

                    </div>
                </div>


                <div class="form-group">

                    <span id="fieldmsg" class="mandatoryStar" style="display:none"></span>

                    <div class=" questionContent clearfix">
                        <div class="questionColor"><span class="zsf_Seqno">2. </span><span class="textBreakQuest"
                                                                                           name="qmessage">{{ __('Gender') }}</span>
                        </div>
                    </div>
                    <div class="clearBoth"></div>
                    <div class="answerContent">
                        <ul class="singlecol" style="list-style-type: none;">
                            <li><input id="male" type="radio" name="gender" value="m"><span><label for="male"
                                                                                                   style="padding-left: 5px;">{{ __('Male') }}</label></span>
                            </li>
                            <li><input id="female" type="radio" name="gender" value="f"><span><label for="female"
                                                                                                     style="padding-left: 5px;">{{ __('Female') }}</label></span>
                            </li>
                        </ul>

                    </div>
                </div>

                <div>

                    <span id="fieldmsg" class="mandatoryStar" style="display:none"></span>

                    <div class=" questionContent clearfix">
                        <div class="questionColor"><span class="zsf_Seqno">3. </span><span class="textBreakQuest"
                                                                                           name="qmessage">{{ __('Rate your order') }}:<br>({{ __('very bad') }}) 1 - - 2 - - 3 - - 4 - - 5 ({{ __('Excellent') }})</span>
                        </div>
                    </div>
                    <div class="clearBoth"></div>
                    <div class="answerContent">

                        <div class="likertScale" rowsize="9">
                            <label class="optionQuestion">{{ __('Good selection') }}</label>
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
                                        <input id="3000001639807_3000001639789" type="radio" value="1"
                                               name="good_selection" style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639809_3000001639789" type="radio" value="2"
                                               name="good_selection" style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639811_3000001639789" type="radio" value="3"
                                               name="good_selection" style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639813_3000001639789" type="radio" value="4"
                                               name="good_selection" style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639815_3000001639789" type="radio" value="5"
                                               name="good_selection" style="margin-right: 10px;">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="likertScale" rowsize="9">
                            <label class="optionQuestion">{{ __('Good pricing') }}</label>
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
                                        <input id="3000001639807_3000001639789" type="radio" value="1" name="pricing"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639809_3000001639789" type="radio" value="2" name="pricing"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639811_3000001639789" type="radio" value="3" name="pricing"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639813_3000001639789" type="radio" value="4" name="pricing"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639815_3000001639789" type="radio" value="5" name="pricing"
                                               style="margin-right: 10px;">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="likertScale" rowsize="9">
                            <label class="optionQuestion">{{ __('High quality') }}</label>
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
                                        <input id="3000001639807_3000001639789" type="radio" value="1" name="quality"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639809_3000001639789" type="radio" value="2" name="quality"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639811_3000001639789" type="radio" value="3" name="quality"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639813_3000001639789" type="radio" value="4" name="quality"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639815_3000001639789" type="radio" value="5" name="quality"
                                               style="margin-right: 10px;">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="likertScale" rowsize="9">
                            <label class="optionQuestion">{{ __('Good service') }}</label>
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
                                        <input id="3000001639807_3000001639789" type="radio" value="1" name="service"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639809_3000001639789" type="radio" value="2" name="service"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639811_3000001639789" type="radio" value="3" name="service"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639813_3000001639789" type="radio" value="4" name="service"
                                               style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639815_3000001639789" type="radio" value="5" name="service"
                                               style="margin-right: 10px;">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="likertScale" rowsize="9">
                            <label class="optionQuestion">{{ __('Ease of shopping') }}</label>
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
                                        <input id="3000001639807_3000001639789" type="radio" value="1"
                                               name="ease_shopping" style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639809_3000001639789" type="radio" value="2"
                                               name="ease_shopping" style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639811_3000001639789" type="radio" value="3"
                                               name="ease_shopping" style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639813_3000001639789" type="radio" value="4"
                                               name="ease_shopping" style="margin-right: 10px;">
                                    </td>
                                    <td class="scaleRow">
                                        <input id="3000001639815_3000001639789" type="radio" value="5"
                                               name="ease_shopping" style="margin-right: 10px;">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div id="3000001639865" comtype="1" class="componentBox clearfix questions" mandatory="0" questype="6">

                    <span id="fieldmsg" class="mandatoryStar" style="display:none"></span>

                    <div class=" questionContent clearfix">
                        <div class="questionColor"><span class="zsf_Seqno">4. </span><span class="textBreakQuest"
                                                                                           name="qmessage">{{ __('Is there anything that can improve your shopping experience?') }}</span>
                        </div>
                    </div>
                    <div class="clearBoth"></div>
                    <div class="answerContent">

                        <textarea id="3000001639865" name="comments" rows="5" cols="60" min="0" max="5000"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 col-lg-push-1 pull-right">
                        {{ Form::submit(__('Submit'),['class'=>'btn c-theme-btn c-theme-border c-btn-square c-btn-uppercase c-font-16']) }}
                    </div>
                </div>


                {{Form::close()}}
            </div>
        </div>
    </div>
