@extends('app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des factures</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Facturation</a></li>
                        <li class="breadcrumb-item active">Liste des factures</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Numéro</th>
                                        <th>Client</th>
                                        <th>Montant</th>
                                        <th>Date de facturation</th>
                                        <th>Date d'échéance</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($factures as $facture)
                                    <tr>
                                        <td>{{$facture->numeroFacture}}</td>
                                        <td>{{$facture->client}}</td>
                                        <td>{{$facture->prixTTC}} DH</td>
                                        <td>{{$facture->dateFacturation}}</td>
                                        <td>{{$facture->dateEcheance}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></button>
                                                <ul class="dropdown-menu" style="min-width:0 !important;width:100px !important">
                                                    <li><a class="dropdown-item" href="factures/{{$facture->id}}/">Afficher</a></li>
                                                    <li><a class="dropdown-item" href="factures/{{$facture->id}}/delete">Supprimer</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    </section>
</div>

@endsection
@section('scripts')
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["pdf", "print"],
            "language": {
                "info": "Affichage de la page _PAGE_ de _PAGES_",
                "search": "Rechercher : "
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection