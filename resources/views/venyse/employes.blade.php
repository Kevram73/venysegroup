@extends('venyse/footer')
@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employe(e)s</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employe(e)s</li>
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
                <h3 class="card-title">Liste des employe(e)s</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nom(s) et Prenom(s)</th>
                    <th>poste</th>
                    <th>Emails</th>
                    <th>Numero de telephone</th>
                    {{-- <th>Adresse</th> --}}
                    <th>Option(s)</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($employes as $employe)
                        <tr>
                            <td>{{$employe->first_name}} {{$employe->last_name}}</td>
                            <td>{{$employe->poste}}</td>
                            <td>{{$employe->email}} </td>
                            <td>{{$employe->phone_number}} </td>
                            {{-- <td>{{$employe->address}} </td> --}}
                            <td>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                <a href="edit-employes/{{$employe->id}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                <button class="btn btn-info"><i class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>	
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nom(s) et Prenom(s)</th>
                    <th>poste</th>
                    <th>Emails</th>
                    <th>Numero de telephone</th>
                    {{-- <th>Adresse</th> --}}
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
