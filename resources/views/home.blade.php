@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List Wishes') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="alert alert-info">
                            {{ Session::get('message') }}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        
                                        <th>Wishes</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            
                                            <td>{{ $item->wishes }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                @if ($item->status == 'false')
                                                    <a href="{{ route('approve', ['id' => $item->id]) }}"
                                                        class="btn btn-sm btn-success">show</a>
                                                @else
                                                    <a href="{{ route('decline', ['id' => $item->id]) }}"
                                                        class="btn btn-sm btn-warning">hide</a>
                                                @endif
                                                <a href="{{ route('hapus', ['id' => $item->id]) }}"
                                                    class="btn btn-sm btn-danger hapus">hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.hapus', function(e) {
            e.preventDefault();
            var ok = confirm('Yakin ingin menghapus data?');

            if (ok) {
                window.location = $(this).attr('href');
            }
        })

    </script>
@endsection
