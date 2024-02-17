@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                <a class="btn btn-primary my-5" href="{{ route('vidio.create') }}">
                    <i class="bi bi-plus"></i> Add Video
                </a>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Daftar video -->
            @foreach ($videos as $video)
            <div class="card mb-4">
                <div class="card-body">
                    <video controls class="img-thumbnail" style="width: 100%">
                        <source src="{{ asset('/video/' . $video->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="d-flex mb-3">
                        <form action="{{ route('vidio.destroy',$video->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash3-fill"></i> 
                            </button>
                        </form>
                    </div> 
                    
                    <div class="mt-2">
                        <strong>{{ $video->created_by }}</strong>
                    </div> 
                    <div>{{ $video->caption }}</div>
                    <div>{{ $video->created_at }}</div>
                </div>
            </div>
            @endforeach

            <!-- Tautan pagination -->
            <div class="d-flex justify-content-center">
                {{ $videos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
