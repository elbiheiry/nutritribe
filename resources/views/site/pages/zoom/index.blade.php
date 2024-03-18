@extends('site.layouts.master')
@section('content')
<!-- Start Section
            ====================================-->
    <section class="page-head">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3> Zoom </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('site.index')}}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active"> Zoom </li>
                    </ul>
                </div>
            </div><!--End row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="form-group">
                    <input type="text" name="display_name" id="display_name" value="Dr Sherine El Shimi" maxLength="100"
                           placeholder="Name" class="form-control" required style="display: none;">
                </div>
                <div class="form-group">
                    <input type="text" name="meeting_number" id="meeting_number" value="2935036230" maxLength="200"
                           style="width:150px;display: none;" placeholder="Meeting Number" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="meeting_pwd" id="meeting_pwd" value="8xv04e" style="width:150px;display: none;"
                           maxLength="32" placeholder="Meeting Password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="meeting_email" id="meeting_email" value="selshimi@gmail.com" style="width:150px;display: none;"
                           maxLength="32" placeholder="Email option" class="form-control">
                </div>

                <div class="form-group">
                    <select id="meeting_role" class="sdk-select" style="display: none;">
                        <option value=0>Attendee</option>
                        <option value=1 selected>Host</option>
                        <option value=5>Assistant</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="meeting_china" class="sdk-select" style="display: none;">
                        <option value=0 selected>Global</option>
                        <option value=1>China</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="meeting_lang" class="sdk-select" style="display: none;">
                        <option value="en-US" selected>English</option>
                        <option value="de-DE">German Deutsch</option>
                        <option value="es-ES">Spanish Español</option>
                        <option value="fr-FR">French Français</option>
                        <option value="jp-JP">Japanese 日本語</option>
                        <option value="pt-PT">Portuguese Portuguese</option>
                        <option value="ru-RU">Russian Русский</option>
                        <option value="zh-CN">Chinese 简体中文</option>
                        <option value="zh-TW">Chinese 繁体中文</option>
                        <option value="ko-KO">Korean 한국어</option>
                        <option value="vi-VN">Vietnamese Tiếng Việt</option>
                        <option value="it-IT">Italian italiano</option>
                    </select>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <img src="{{asset('public/admin/images/zoom.png')}}" width="500px" >
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group text-center">
                        <button class="custom-btn" id="join_meeting">
                            Start meeting
                        </button>
                    </div><!--End Form Group-->
                </div><!--End Col-md-6-->
            </div>
        </div>
    </section>
    
@endsection
@section('js')
    <script src="{{asset('public/admin/meeting/react.min.js')}}"></script>
    <script src="{{asset('public/admin/meeting/react-dom.min.js')}}"></script>
    <script src="{{asset('public/admin/meeting/redux.min.js')}}"></script>
    <script src="{{asset('public/admin/meeting/redux-thunk.min.js')}}"></script>
    <script src="{{asset('public/admin/meeting/lodash.min.js')}}"></script>
    <script src="{{asset('public/admin/meeting/zoom-meeting-1.7.10.min.js')}}"></script>
    <script src="{{asset('public/admin/meeting/tool.js')}}"></script>
    <script src="{{asset('public/admin/meeting/vconsole.min.js')}}"></script>
    <script src="{{asset('public/admin/meeting/index.js')}}"></script>
@endsection