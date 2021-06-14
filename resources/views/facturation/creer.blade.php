@extends('app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Facturation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Facturation</a></li>
                        <li class="breadcrumb-item active">Créer une facture</li>
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
                            <h3 class="card-title">Créer une facture</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="factureForm">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Client</label>
                                            <select class="form-control select2" name="client" style="width: 100%;">
                                                @foreach($clients as $client)
                                                <option value="{{$client->id}}">{{$client->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date de facturation</label>
                                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                <input type="text" name="dateFacturation" class="form-control datetimepicker-input" data-target="#reservationdate1">
                                                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputNFacture">Numéro de facture</label>
                                            <input type="text" name="numeroFacture" class="form-control" id="exampleInputNFacture" placeholder="Entrer N° Facture">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date d'échéance</label>
                                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                <input type="text" name='dateEcheance' class="form-control datetimepicker-input" data-target="#reservationdate2">
                                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputNFacture">Numéro de commande</label>
                                            <input name='numeroCommande' type="text" class="form-control" id="exampleInputNFacture" placeholder="Entrer N° Facture">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <select name='designation' class="form-control select2" id="designation" style="width: 100%;">
                                                @foreach($prestations as $prestation)
                                                <option value="{{$prestation->libelle}}">{{$prestation->libelle}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputQte">Quantité</label>
                                            <input name='quantite' type="text" class="form-control" id="exampleInputQte" placeholder="Entrer Quantité">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleInputPrixHT">Prix HT</label>
                                            <input name="prixHT" type="text" class="form-control" id="exampleInputPrixHT" placeholder="Entrer Prix HT">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>TVA</label>
                                            <select name="tva" id="tva" class="form-control">
                                                <option value="20">20%</option>
                                                <option value="15">15%</option>
                                                <option value="10">10%</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <button type="submit" onclick="ajouter(event)" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                                <!-- /.card-body -->
                        </form>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped" id="example1">
                                        <thead>
                                            <tr>
                                                <th>Prestation</th>
                                                <th>Quantité</th>
                                                <th>Prix</th>
                                                <th>Montant</th>
                                                <th>TVA</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">

                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="width:50%">Total HT : </th>
                                                    <td id="htt">0</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td id="tot">0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button type="submit" onclick="envoyer(event)" class="btn btn-primary float-right">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        $('#example1').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "emptyTable": "La table est vide"
            }
        });
    });
    var designation = document.querySelector("#designation")
    var quantite = document.querySelector("#exampleInputQte")
    var ht = document.querySelector("#exampleInputPrixHT")
    var tva = document.querySelector("#tva")
    var htt = document.querySelector("#htt")
    var tott = document.querySelector("#tot")
    var form = document.querySelector("#factureForm")
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    function envoyer(e) {
        e.preventDefault()
        const formData = new FormData();
        formData.append('_token', form['_token'].value)
        formData.append('idClient', form.client.value)
        formData.append('client', form.client.options[form.client.selectedIndex].text)
        formData.append('dateFacturation', form.dateFacturation.value)
        formData.append('numeroFacture', form.numeroFacture.value)
        formData.append('dateEcheance', form.dateEcheance.value)
        formData.append('numeroCommande', form.numeroCommande.value)
        var articles = $('#example1').DataTable().columns([1, 2]).rows().data().toArray().map(function(val) {
            return [val[0], val[2], val[3], val[4]]
        });
        formData.append('articles', JSON.stringify(articles))
        formData.append('prixHT', htt.innerHTML)
        formData.append('prixTTC', tott.innerHTML)
        fetch("/facturation/creer", {
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

    function ajouter(e) {
        e.preventDefault()
        $('#example1').DataTable().row.add([designation.value, quantite.value, ht.value + " DH", parseInt(quantite.value) * parseInt(ht.value) + " DH", tva.value + "%", "<i style='cursor:pointer' class='fas fa-times'></i>"]).draw()
        var tha = $('#example1').DataTable().column(3).data().toArray().map((e) => parseInt(e.split(' DH')[0]))
        var tvaa = $('#example1').DataTable().column(4).data().toArray().map((e) => parseInt(e.split('%')[0]))
        var thn = tha.reduce((a, b) => a + b, 0)
        var tot = tha.map((e, i) => e * (1 + tvaa[i] * 0.01)).reduce((a, b) => a + b, 0)
        htt.innerHTML = thn + " DH"
        tott.innerHTML = tot + " DH"
    }
    $('#example1').on('click', 'i', function() {
        $('#example1').DataTable().row(this.parentElement.parentElement).remove().draw(false);
        var tha = $('#example1').DataTable().column(3).data().toArray().map((e) => parseInt(e.split(' DH')[0]))
        var tvaa = $('#example1').DataTable().column(4).data().toArray().map((e) => parseInt(e.split('%')[0]))
        var thn = tha.reduce((a, b) => a + b, 0)
        var tot = tha.map((e, i) => e * (1 + tvaa[i] * 0.01)).reduce((a, b) => a + b, 0)
        tot = Math.round(tot * 100) / 100
        htt.innerHTML = thn + " DH"
        tott.innerHTML = tot + " DH"

    });
</script>
@endsection