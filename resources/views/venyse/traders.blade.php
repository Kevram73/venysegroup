@extends('venyse/footer')
@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Traders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Traders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des traders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nom(s) et Prenom(s)</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Sexe</th>
                    <th>Status</th>
                    <th>Option(s)</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($traders as $trader)
                        <tr>
                            <td>{{$trader->nom}} {{$trader->prenoms}}</td>
                            <td>{{$trader->email}}</td>
                            <td>{{$trader->telephone_1}} </td>
                            <td>{{$trader->sexe}} </td>
                            <td>
                                <?php
                                    if($trader->profile_status==0){
                                        echo('incomplet');
                                    }else{
                                        echo('complet');
                                    }
                                ?>
                            </td>
                            <td>
                                {{-- <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                <a href=""><button class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                 --}}<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                <a href="edit-traders/{{$trader->id}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                <button class="btn btn-info"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nom(s) et Prenom(s)</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Sexe</th>
                    <th>Adresse</th>
                    <th>Option(s)</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
