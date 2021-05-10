@extends('layouts.layout')

@section('contentHeader')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Perfil de Jugador<small></small></h2>
                            <div class="clearfix"></div>
                        </div>
                    @endsection

                    @section('content')
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                            </p>
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img class="img-responsive avatar-view"
                                            src="https://images.vexels.com/media/users/3/145908/preview2/52eabf633ca6414e60a7677b0b917d92-creador-de-avatar-masculino.jpg"
                                            alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                                <h3>{{ $data['player']->person->name }}</h3>
                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-phone user-profile-icon"></i> {{ $data['player']->person->phone }}
                                    </li>
                                    <li>
                                        <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                    </li>
                                    <li class="m-top-xs">
                                        <i class="fa fa-external-link user-profile-icon"></i>
                                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                    </li>
                                </ul>
                                <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                <br />
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="profile_title">
                                    <div class="col-md-6">
                                        <h2>User Activity Report</h2>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <!-- start skills -->
                                <div class="row">
                                    @foreach ($data['attribute_types'] as $attribute_type)
                                        <div class="col-md-6">
                                            <h4>{{ $attribute_type->name }}</h4>
                                            @foreach ($data['player']->attributes as $attribute)
                                                @if ($attribute->attribute_type_id == $attribute_type->id)
                                                    <ul class="list-unstyled user_data">
                                                        <li>
                                                            <p>{{ $attribute->name }}</p>
                                                            <div class="progress progress_sm">
                                                                <div class="progress-bar bg-blue" role="progressbar"
                                                                    data-transitiongoal="{{ $attribute->pivot->value * 5 }}">
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                                <!-- end of skills -->
                            </div>
                        </div>
                    @endsection


                    @section('contentCerrarDivs')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
