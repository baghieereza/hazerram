@extends("layouts.users.main")



@section('content')

    <div class="main-panel" style="width: 100%">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 col-md-4 col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title">کلاس های امروز</h6>
                                    </div>
                                    <hr>
                                    <div id="dragula-left" class="py-2">
                                        @if (count($course_times))
                                            @foreach($course_times as $course_time)
                                                <div class="card rounded border mb-2">
                                                    <div class="card-body p-3">
                                                        <div class="media text-center">
                                                            <i class="icon-book menu-icon"></i>
                                                            <div class="media-body">
                                                                <h6 class="mb-1 mr-2"> {{$course_time->course_name}} </h6>
                                                                <p class="mb-0 text-muted">
                                                                    پایه ی {{$course_time->level_name}} -
                                                                </p>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-1 mr-2"> ساعت اول </h6>
                                                                <p class="mb-0 text-muted">
                                                                    {{$course_time->end_session}} - {{$course_time->start_session}}
                                                                </p>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-1 mr-2"> تعداد<small> دانش آموز</small></h6>
                                                                <p class="mb-0 text-muted">
                                                                    {{$course_time->student_count}}
                                                                </p>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-1 mr-2"> وضعیت کلاس</h6>
                                                                <p class="mb-0 text-muted">
                                                                @if ($course_time->status == 0)
                                                                    <div class="badge badge-danger badge-fw">گذشته</div>
                                                                @elseif($course_time->status == 5)
                                                                    <div class="badge badge-success badge-fw">برگزار شده</div>
                                                                @else
                                                                    <div class="badge badge-primary badge-fw">در حال برگذاری</div>
                                                                    @endif
                                                                    </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            برای امروز کلاسی وجود ندارد.
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">تعداد حاضرین و غائبین کلاس های این هفته</h6>

                            <hr>
                            <canvas id="morris-dashboard-bar-chart3" style="height:250px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card">
                    <div class="card card bg-linkedin">
                        <div class="card-body">
                            <h4 class="card-title " style="color: white">کلاس های در حال برگزاری</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted"></p>
                                <p class="text-muted" style="color: whitesmoke !important;"> تعداد: 40</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card">
                    <div class="card card bg-google">
                        <div class="card-body">
                            <h4 class="card-title " style="color: white">کلاس های لغو شده</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted"></p>
                                <p class="text-muted" style="color: white !important;"> تعداد: 40</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card">
                    <div class="card card bg-twitter">
                        <div class="card-body">
                            <h4 class="card-title " style="color: white">حاضرین فعلی</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted"></p>
                                <p class="text-muted" style="color: whitesmoke !important;"> تعداد: 40</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card">
                    <div class="card card bg-github">
                        <div class="card-body">
                            <h4 class="card-title " style="color: white">غایبین فعلی</h4>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted"></p>
                                <p class="text-muted" style="color: white"> تعداد: 40</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row grid-margin">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">لیست کلاس های هفته ی جاری</h6>
                            <div class="table-responsive">
                                <table class="table mt-3 border-top">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام درس</th>
                                        <th>ساعت شروع / پایان</th>
                                        <th>نام مدرسه</th>
                                        <th>پایه</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($week_course_times))
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($week_course_times as $item)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$item->course_name}}</td>
                                                <td>{{$item->end_session}} - {{$item->start_session}}</td>
                                                <td>{{$item->school_name}}</td>
                                                <td>{{$item->level_name}}</td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        <div class="badge badge-danger badge-fw">گذشته</div>
                                                    @elseif($item->status == 5)
                                                        <div class="badge badge-success badge-fw">برگزار شده</div>
                                                    @else
                                                        <div class="badge badge-primary badge-fw">در حال برگذاری</div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php
                                                $i += 1;
                                            @endphp
                                        @endforeach
                                    @else
                                        این هفته کلاسی وجود ندارد.
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-title">اعلانات</h6>
                            </div>
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>مدیر </b>لطفا به من پیام بدهید </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="icon icon-clock text-muted mr-1"></i>
                                        </div>
                                        <small class="text-muted ml-auto mr-2">2 hours ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>مدیر </b>لطفا به من پیام بدهید </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="icon icon-clock text-muted mr-1"></i>
                                        </div>
                                        <small class="text-muted ml-auto mr-2">2 hours ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>مدیر </b>لطفا به من پیام بدهید </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="icon icon-clock text-muted mr-1"></i>
                                        </div>
                                        <small class="text-muted ml-auto mr-2">2 hours ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0"><b>مدیر </b>لطفا به من پیام بدهید </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="icon icon-clock text-muted mr-1"></i>
                                        </div>
                                        <small class="text-muted ml-auto mr-2">2 hours ago</small>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a
                                href="#">Bootstrapdash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                            class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>

@endsection()

@section('script')
    <script>
        @if(!$week_course_times_present->isEmpty())
            new Chart(document.getElementById("morris-dashboard-bar-chart3"), {
            type: 'bar',
            data: {
                labels: [

                    @foreach($week_course_times_present as $week_course_time)
                            @if(count($week_course_time->classes))
                            @foreach($week_course_time->classes as $class)
                        "{{$class->code}}",
                    @endforeach
                    @endif
                    @endforeach
                ],

                datasets: [
                    {
                        label: "حاضرین",
                        backgroundColor: "#3e95cd",
                        data: [
                            @foreach($week_course_times_present as $week_course_time)
                            @if(count($week_course_time->classes))
                            @for($i = 0; $i < count($week_course_time->classes); $i++)
                            @php
                                $h = 0;
                            @endphp
                            @if(count($week_course_time->classes[$i]->course))
                            @foreach($week_course_time->classes[$i]->course as $course)
                            @if(count($course->course_time))
                            @foreach($course->course_time as $course_time)
                            @if(count($course_time->present))
                            @foreach($course_time->present as $present)
                            @if($present->is_present == 1)
                            @php
                                $h++;
                            @endphp
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                            {{$h}},
                            @endfor
                            @endif
                            @endforeach
                        ]
                    }, {
                        label: "غایبین",
                        backgroundColor: "#8e5ea2",
                        data: [
                            @foreach($week_course_times_present as $week_course_time)
                            @if(count($week_course_time->classes))
                            @for($i = 0; $i < count($week_course_time->classes); $i++)
                            @php
                                $q = 0;
                            @endphp
                            @if(count($week_course_time->classes[$i]->course))
                            @foreach($week_course_time->classes[$i]->course as $course)
                            @if(count($course->course_time))
                            @foreach($course->course_time as $course_time)
                            @if(count($course_time->present))
                            @foreach($course_time->present as $present)
                            @if($present->is_present == 0)
                            @php
                                $q++;
                            @endphp
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                            {{$q}},
                            @endfor
                            @endif
                            @endforeach
                        ]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                },
                beginAtZero: true,
            }
        });
        @endif
    </script>
@endsection
