@extends('layouts.master')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user-profile.css') }}">
@endpush
@section('content')

<script>
	window.onload = function() {
		
	let chart = new CanvasJS.Chart("chartContainer", {
		theme: "light2",
		animationEnabled: true,
		title: {
			text: "Episode Statistics"
		},
		data: [{
			type: "doughnut",
			indexLabel: "{symbol} - {y}",
			yValueFormatString: "#,##0",
			showInLegend: true,
			legendText: "{label} : {y}",
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}]
    });
    chart.render();
    
    var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        title: {
            text: "Shows Statistics"
        },
        data: [{
            type: "pie",
            yValueFormatString: "#,##0",
            indexLabel: "{label} ({y})",
            dataPoints: <?php echo json_encode($seriesPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart2.render();
		
	}
</script>

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    @if ($user->avatar)    
                        <img src="{{ $user->avatar }}">
                    @else
                        <img src="https://avatarfiles.alphacoders.com/855/85557.png">
                    @endif
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ $user->name }}
                    </h5>
                    <h6>
                        @if ($user->role == 'admin')
                            <span class="badge badge-danger">{{ $user->role }}</span>
                        @endif
                    </h6>
                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Stats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="stats2-tab" data-toggle="tab" href="#stats2" role="tab" aria-controls="stats2" aria-selected="false">Stats 2</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
            </div>
            -->
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>CONTACTS</p>
                    <a href="">Vkontakte Profile</a><br/>
                    <a href="">Facebook Profile</a><br/>
                    <a href="">Twitter Profile</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($user->sex)
                                            @if ($user->sex == 'm')
                                                <p>Male</p>
                                            @elseif ($user->sex == 'f')
                                                <p>Female<p>
                                            @endif
                                        @else
                                            <p>-</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Registered</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ date('d.m.Y', strtotime($user->created_at)) }}</p>
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row" style="padding-bottom:25px;">
                            <div class="col-md-12">
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="stats2" role="tabpanel" aria-labelledby="stats2-tab">
                        <div class="row" style="padding-bottom:25px;">
                            <div class="col-md-12">
                                <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>

@push('scripts')
    <script src="{{ asset('js/user-profile.js') }}"></script>
@endpush
@endsection