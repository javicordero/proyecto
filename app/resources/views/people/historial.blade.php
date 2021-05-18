{{-- Start historial --}}
<div class="row" style="margin-top: 3px">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Historial <small></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Equipo</th>
                            <th>Comienzo</th>
                            <th>Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['person']->contracts as $contract)
                            <tr>
                                <td>{{ $contract->team->name }}</td>
                                <td>{{ $contract->date_start->format('d-m-Y') }}</td>
                                <td>{{ $contract->date_end ? $contract->date_end->format('d-m-Y') : 'Actual' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- End historial --}}
