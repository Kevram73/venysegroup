@extends('venyse/footer')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mon profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('../../dist/img/user4-128x128.jpg')}}"
                       alt="User profile picture">
                </div>
                {{-- {{$url}} --}}
                <h3 class="profile-username text-center">{{Auth::user()->nom}} {{Auth::user()->prenoms}}</h3>

                <p class="text-muted text-center">Trader chez Venyse Groupe</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Telephone</b> <a class="float-right">{{Auth::user()->telephone_1}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Adresse</b> <a class="float-right">
                        <?php
                            if(isset($trader)){
                                echo($trader->adresse);
                            }else{
                                echo("Neant");
                            }
                        ?>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Pays</b> <a class="float-right">
                        <?php
                            if(isset($trader)){
                                echo($trader->pays);
                            }else{
                                echo("Neant");
                            }
                        ?>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Date de Naissance</b> <a class="float-right">
                        <?php
                            if(isset($trader)){
                                echo($trader->date_naissance);
                            }else{
                                echo("Neant");
                            }
                        ?>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Sexe</b> <a class="float-right">{{Auth::user()->sexe}}</a>
                  </li>
                </ul>
                @if(Auth::user()->profile_status == 0)
                    <a href="{{asset('completer-profile')}}" class="btn btn-danger btn-block"><b>Veuillez completer vos informations.</b></a>
                @else
                    <a href="{{asset('completer-profile')}}" class="btn btn-success btn-block"><b>Mise a jour de vos informations.</b></a>
                @endif
                </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
