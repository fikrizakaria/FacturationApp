@extends('app')
@section('content')
<div class="content-wrapper" style="min-height: 1602px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Facture</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Facture</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card" style="background-color:transparent !important; border:transparent; box-shadow:none">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="timeline">
                                    <div class="timeline timeline-inverse">
                                        <div>
                                            <i class="fa fa-plus bg-primary"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header">Créer une facture</h3>
                                                <div class="timeline-body">
                                                    Statut : Créée le {{$facture[0]->dateFacturation}}
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @if($envoye=='oui')
                                            <i class="fa fa-envelope bg-primary"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header">Envoyer une facture</h3>
                                                <div class="timeline-body">
                                                    Statut : Envoyé
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-danger btn-sm disabled">Envoyer</a>
                                                </div>
                                            </div>
                                            @else
                                            <i class="fa fa-envelope bg-primary"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header">Envoyer une facture</h3>
                                                <div class="timeline-body">
                                                    Statut : Non envoyé
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="envoi" class="btn btn-danger btn-sm">Envoyer</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div>
                                            <i class="fa fa-credit-card bg-purple"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header">Être payé</h3>
                                                <div class="timeline-footer">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                                        Ajouter un paiement
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3 myDivToPrint">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                                    <small class="float-right">Date: {{$facture[0]->dateFacturation}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Client :
                                <address>
                                    <strong>{{$facture[0]->nom}}</strong><br>
                                    {{$facture[0]->adresse}}<br>
                                    Tel: {{$facture[0]->tel}}<br>
                                    Fax: {{$facture[0]->fax}}<br>
                                    Email: {{$facture[0]->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">

                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Facture N° {{$facture[0]->numeroFacture}}</b><br>
                                <br>
                                <b>Commande N°</b> {{$facture[0]->numeroCommande}}<br>
                                <b>Date d'échéance</b> {{$facture[0]->dateEcheance}}<br>
                                <b>Patente :</b> {{$facture[0]->patente}}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Article</th>
                                            <th>Quantité</th>
                                            <th>Prix U.</th>
                                            <th>Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($facture[0]->articles as $article)
                                        <tr>
                                            <td>{{$article[0]}}</td>
                                            <td>{{$article[1]}}</td>
                                            <td>{{$article[2]}}</td>
                                            <td>{{$article[3]}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

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
                                                <td>{{$facture[0]->prixHT}} DH</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>{{$facture[0]->prixTTC}} DH</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="#" rel="noopener" id="btnPrint" class="btn btn-default"><i class="fas fa-print"></i> Imprimer</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<!-- Modal element -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="paiementForm">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un paiement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputNom1">Date</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input type="text" name='date' class="form-control datetimepicker-input" data-target="#reservationdate2">
                                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Montant">Montant</label>
                                    <input name="montant" type="text" class="form-control" id="Montant" placeholder="Entrer le montant">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="compte">Compte</label>
                                    <input name="compte" type="text" class="form-control" id="compte" placeholder="Entrer le montant">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Montant">Devise</label>
                                    <select name='devise' class="form-control select2" id="devise" style="width: 100%;">
                                        <option value="USD">USD</option>
                                        <option value="MAD">MAD</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescription">Description</label>
                            <textarea class="form-control" rows="3" name='description' id="exampleInputDescription" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mede">Mode de paiement</label>
                                    <select name='mode' class="form-control select2" id="mode" style="width: 100%;">
                                        @foreach($reglements as $reglement)
                                        <option value="{{$reglement->libelle}}">{{$reglement->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reference">Référence</label>
                                    <input name="reference" type="text" class="form-control" id="reference" placeholder="Entrer le référence">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button onclick='envoyer(event)' class="btn btn-primary">Ajouter</button>
                </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {
        $("#btnPrint").click(function() {
            var contents = $(".invoice").html();
            var frame1 = $('<iframe />');
            frame1[0].name = "frame1";
            frame1.css({
                "position": "absolute",
                "top": "-1000000px"
            });
            $("body").append(frame1);
            var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
            frameDoc.document.open();
            //Create a new HTML document.
            frameDoc.document.write('<html><head><title>Facture</title>');
            frameDoc.document.write('</head><body>');
            //Append the external CSS file.
            frameDoc.document.write('<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet" type="text/css" />');
            frameDoc.document.write('<link href="{{asset("css/all.css")}}" rel="stylesheet" type="text/css" />');
            //Append the DIV contents.
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function() {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                frame1.remove();
            }, 500);
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
    var form = document.querySelector('#paiementForm')

    function envoyer(e) {
        e.preventDefault()
        const formData = new FormData();
        formData.append('_token', form['_token'].value)
        formData.append('idClient', '{{$facture[0] -> idClient}}')
        formData.append('idFacture', '{{$facture[0] -> id}}')
        formData.append('date', form.date.value)
        formData.append('montant', parseInt('{{$facture[0] -> prixTTC}}'))
        formData.append('credit', form.montant.value)
        formData.append('compte', form.compte.value)
        formData.append('devise', form.devise.value)
        formData.append('description', form.description.value)
        formData.append('mode', form.mode.value)
        formData.append('reference', form.reference.value)
        fetch("/paiement", {
                method: 'POST',
                body: formData
            }).then(response => response.json())
            .then(function(data) {
                Toast.fire({
                    icon: data.type,
                    title: data.message
                })
                $('#modal-default').modal('hide')
            });
    }
</script>
@endsection