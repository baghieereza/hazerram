@extends("layouts.users.main")



@section('content')

    <div class="main-panel" style="width: 100%">
        <div class="content-wrapper">

            <div class="row text-left">
                <div class="col-lg-2 d-flex flex-column ">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row p-3">
                                <div class="col-md-3">
                                    <b>نام درس : </b> <small>{{$course_time->course->name}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">پایه : </b> <small>{{$course_time->course->level->name}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">معلم : </b> <small> {{$course_time->course->teacher->name." ".$course_time->course->teacher->family}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">مدرسه : </b> <small> {{$course_time->course->classes->school->name}}</small>
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col-md-3">
                                    <b>ساعت شروع : </b> <small>{{$course_time->course->start_session}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">ساعت پایان : </b> <small> {{$course_time->course->end_session}}</small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">وضعیت : </b> <small>
                                        @if ($course_time->status == 0)
                                            <div class="badge badge-danger badge-fw">گذشته</div>
                                        @elseif($course_time->status == 5)
                                            <div class="badge badge-success badge-fw">برگزار شده</div>
                                        @else
                                            <div class="badge badge-primary badge-fw">در حال برگذاری</div>
                                        @endif
                                    </small>
                                </div>
                                <div class="col-md-3">
                                    <b class="mr-1">زمان مانده  : </b> <small>  <span id="demo" class="bg-linkedin text-center p-2" style=" color: #ffff"></span> </small>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>   ردیف  </th>
                                    <th> نام و نام خانوادگی </th>
                                    @for ($i = 1; $i <= $course_time->present_student_notification->count(); $i++)
                                       <th>نوتیفیکیشن {{$i}}</th>
                                    @endfor
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $j = 1;
                                    $count = $course_time->present_student_notification->count();
                                @endphp
                                @for ($i = 0; $i < $presents->course->students->count(); $i++)
                                    <tr>
                                        <td class="py-1">
                                            {{$j}}
                                        </td>
                                        <td>
                                            {{$presents->course->students[$i]->name." ".$presents->course->students[$i]->family}}
                                        </td>
                                        @if (count($presents->present->where('course_student.student_id',$presents->course->students[$i]->pivot->student_id)))
                                            @for ($k = 0; $k < $count; $k++)
                                            <td>
                                                    @if ($i >= 1)
                                                        @php
                                                           $value = array_values($presents->present->where('course_student.student_id',$presents->course->students[$i]->pivot->student_id)->toArray());
                                                        @endphp
                                                    @else
                                                        @php
                                                          $value = $presents->present->where('course_student.student_id',$presents->course->students[$i]->pivot->student_id);
                                                        @endphp
                                                    @endif
                                                    @if ($value[$k]['is_present'] == 1)
                                                        <i class="fa fa-check" style="color: green"></i>
                                                    @else
                                                        <i class="fa fa-times" style="color: red"></i>
                                                    @endif
                                                </td>
                                            @endfor
                                        @else
                                            @for ($k = 0; $k < $count; $k++)
                                                <td>
                                                    <i class="fa fa-spinner" style="color: gray"></i>
                                                </td>
                                            @endfor
                                        @endif
                                    </tr>
                                    @php
                                        $j += 1;
                                    @endphp
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection()
