<x-layouts.admin title="Frequently Asked Question">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item active" aria-current="page">Frequently Asked Question</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.frequently-asked-question.create') }}">
                        Tambah Frequently Asked Question
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($frequentlyAskedQuestions as $frequentlyAskedQuestion)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $frequentlyAskedQuestion->question }}</td>
                            <td>{{ $frequentlyAskedQuestion->answer }}</td>

                            <td>
                                <x-ui.base-button color="primary" type="button" href="{{ route('admin.frequently-asked-question.show', $frequentlyAskedQuestion->id) }}">
                                    Detail
                                </x-ui.base-button>

                                <x-ui.base-button color="warning" type="button" href="{{ route('admin.frequently-asked-question.edit', $frequentlyAskedQuestion->id) }}">
                                    Edit
                                </x-ui.base-button>

                                <form action="{{ route('admin.frequently-asked-question.destroy', $frequentlyAskedQuestion->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-ui.base-button color="danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                        Hapus
                                    </x-ui.base-button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </x-slot>
                </x-ui.datatables>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>                