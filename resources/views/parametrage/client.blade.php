@extends('app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Paramètrage</a></li>
            <li class="breadcrumb-item active">Profil</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Modifier Utilisateur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="creerClient" onsubmit="envoyer(event)" action="{{route('creerClient')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputNom1">Nom</label>
                      <input type="text" name='nom' class="form-control" id="exampleInputNom1" placeholder="Entrer nom">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Adresse Email</label>
                      <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Entrer email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputTel">Tel</label>
                      <input name="tel" type="text" class="form-control" id="exampleInputTel" placeholder="Entrer Tel">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputFax">Fax</label>
                      <input name="fax" type="text" class="form-control" id="exampleInputFax" placeholder="Entrer Fax">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputAdresse">Adresse</label>
                  <input name="adresse" type="text" class="form-control" id="exampleInputAdresse" placeholder="Entrer l'adresse">
                </div>
                <div class="form-group">
                  <label for="exampleInputPatente">Patente</label>
                  <input name="patente" type="text" class="form-control" id="exampleInputPatente" placeholder="Entrer Patente">
                </div>
                <div class="form-group">
                  <label for="exampleInputRC">RC</label>
                  <input name="rc" type="text" class="form-control" id="exampleInputRC" placeholder="Entrer RC">
                </div>
                <div class="form-group">
                  <label for="exampleInputICE">ICE</label>
                  <input name="ice" type="text" class="form-control" id="exampleInputICE" placeholder="Entrer ICE">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>
            </form>
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
@endsection
@section('scripts')
<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  function envoyer(e) {
    e.preventDefault()
    const formData = new FormData();
    var form = document.querySelector("#creerClient")
    formData.append('_token', form['_token'].value)
    formData.append('nom', form.nom.value)
    formData.append('email', form.email.value)
    formData.append('tel', form.tel.value)
    formData.append('fax', form.fax.value)
    formData.append('adresse', form.adresse.value)
    formData.append('patente', form.patente.value)
    formData.append('rc', form.rc.value)
    formData.append('ice', form.ice.value)
    fetch("/parametrage/client", {
        method: 'POST',
        body: formData
      }).then(response => response.json())
      .then(function(data) {
        Toast.fire({
          icon: data.type,
          title: data.message
        })
      });
  }
</script>
@endsection