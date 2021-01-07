@extends('Admin.master')
@section('titlePage','داشبورد')
@section('Styles')

@endsection
@section('Scripts')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3 ">
            <div class="dash-widget dash-widget5" style="border-radius: 50px;box-shadow: 8px  8px 8px #b3c0c3; ">
                <span class="dash-widget-icon bg-success " style="border-radius: 50px;">
                    <i class="fa fa-money" aria-hidden="true"></i></span>
                <div class="dash-widget-info">
                    <h3>ت 98</h3>
                    <span>درآمد</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="dash-widget dash-widget5" style="border-radius: 50px;box-shadow: 8px  8px 8px #b3c0c3; ">
                <span class="dash-widget-icon bg-info" style="border-radius: 50px;"><i class="fa fa-user-o"
                                                                                       aria-hidden="true"></i></span>
                <div class="dash-widget-info">
                    <h3>1072</h3>
                    <span>کاربران</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="dash-widget dash-widget5" style="border-radius: 50px;box-shadow: 8px  8px 8px #b3c0c3; ">
                <span class="dash-widget-icon bg-warning" style="border-radius: 50px;"><i
                        class="fa fa-files-o"></i></span>
                <div class="dash-widget-info">
                    <h3>72</h3>
                    <span>پروژه ها</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="dash-widget dash-widget5" style="border-radius: 50px;box-shadow: 8px  8px 8px #b3c0c3; ">
                <span class="dash-widget-icon bg-danger" style="border-radius: 50px;"><i class="fa fa-tasks"
                                                                                         aria-hidden="true"></i></span>
                <div class="dash-widget-info">
                    <h3>618</h3>
                    <span>کارها</span>
                </div>
            </div>
        </div>
    </div>

@endsection
