<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('widget.exchange_rates_title')}}</span>
        </h1>
    </div>
    <div class="exchange_box module">
        <table class="table">
            <thead>
            <tr>
                <th>Döviz Tipi:</th>
                <th>Kur Tutarı:</th>
                </td>
            </thead>
            <tbody>
            <tr>
                <td><strong>Dolar Alış : </strong></td>
                <td>{{$usdBuying}}</td>
            </tr>
            <tr>
                <td><strong>Dolar Satış :</strong></td>
                <td>{{$usdSelling}}</td>
            </tr>
            <tr>
                <td><strong>Euro Alış :</strong></td>
                <td>{{$euroBuying}}</td>
            </tr>
            <tr>
                <td><strong>Euro Satış :</strong></td>
                <td>{{$euroSelling}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
