<x-layouts.admin title="Detail Frequently Asked Question">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.frequently-asked-question.index') }}">Frequently Asked Question</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Frequently Asked Question</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Detail Frequently Asked Question</h4>
                </x-slot>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Question</th>
                            <td>{{ $frequentlyAskedQuestion->question }}</td>
                        </tr>
                        <tr>
                            <th>Answer</th>
                            <td>{{ $frequentlyAskedQuestion->answer }}</td>
                        </tr>
                    <x-slot name="footer">
                        <x-ui.base-button color="danger" href="{{ route('admin.frequently-asked-question.index') }}">Kembali</x-ui.base-button>
                    </x-slot>
                </table>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>