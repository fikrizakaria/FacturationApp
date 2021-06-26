@extends('app')
@section('title')
Reglements
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Prestation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Paramètrage</a></li>
                        <li class="breadcrumb-item active">Réglement</li>
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
                            <h3 class="card-title">Creer réglemet</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="creerPrestation" onsubmit="envoyer(event)" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputCode">Code</label>
                                    <input name="code" type="text" class="form-control" id="exampleInputCode" placeholder="Entrer Code">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLibelle">Libelle</label>
                                    <input name="libelle" type="text" class="form-control" id="exampleInputLibelle" placeholder="Entrer Libelle">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Valider</button>
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
        var form = document.querySelector("#creerPrestation")
        formData.append('_token', form['_token'].value)
        formData.append('code', form.code.value)
        formData.append('libelle', form.libelle.value)
        fetch("/parametrage/prestation", {
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